<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Antrian::with('loket');
        
        // Filter by loket_id if provided
        if ($request->has('loket_id')) {
            $query->where('loket_id', $request->loket_id);
        }
        
        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        $antrians = $query->orderBy('created_at')->get();
        return response()->json($antrians);
    }

    /**
     * Store a newly created resource in storage.
     * Generate nomor antrian baru untuk loket tertentu
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'loket_id' => 'required|exists:lokets,id',
        ]);

        $loket = Loket::findOrFail($validated['loket_id']);
        
        // Generate nomor antrian berdasarkan kode loket dan nomor urut
        $today = Carbon::now()->format('Y-m-d');
        $lastAntrian = Antrian::where('loket_id', $loket->id)
            ->whereDate('created_at', $today)
            ->latest()
            ->first();
            
        $urutan = 1;
        if ($lastAntrian) {
            // Extract nomor urut dari nomor_antrian (format: X999)
            $lastUrutan = (int) substr($lastAntrian->nomor_antrian, 1);
            $urutan = $lastUrutan + 1;
        }
        
        $nomorAntrian = $loket->kode . str_pad($urutan, 3, '0', STR_PAD_LEFT);
        
        $antrian = Antrian::create([
            'loket_id' => $loket->id,
            'nomor_antrian' => $nomorAntrian,
            'status' => 'menunggu',
        ]);
        
        return response()->json($antrian, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $antrian = Antrian::with('loket')->findOrFail($id);
        return response()->json($antrian);
    }

    /**
     * Update the specified resource in storage.
     * Update status antrian (menjadi 'dipanggil' atau 'selesai')
     */
    public function update(Request $request, string $id)
    {
        $antrian = Antrian::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:menunggu,dipanggil,selesai',
        ]);

        // Jika status berubah menjadi 'dipanggil', set waktu_panggil
        if ($validated['status'] === 'dipanggil' && $antrian->status !== 'dipanggil') {
            $antrian->waktu_panggil = Carbon::now();
        }
        
        $antrian->status = $validated['status'];
        $antrian->save();
        
        return response()->json($antrian);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    
    /**
     * Get antrian yang sedang dipanggil untuk semua loket atau loket tertentu
     */
    public function getDipanggil(Request $request)
    {
        $query = Antrian::where('status', 'dipanggil');
        
        if ($request->has('loket_id')) {
            $query->where('loket_id', $request->loket_id);
        }
        
        $antrians = $query->with('loket')->get();
        
        return response()->json(['data' => $antrians]);
    }
}
