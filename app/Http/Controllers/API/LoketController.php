<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokets = Loket::all();
        return response()->json($lokets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_loket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kode' => 'required|string|size:1|unique:lokets,kode',
        ]);

        $loket = Loket::create($validated);
        return response()->json($loket, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loket = Loket::findOrFail($id);
        return response()->json($loket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loket = Loket::findOrFail($id);
        
        $validated = $request->validate([
            'nama_loket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kode' => 'required|string|size:1|unique:lokets,kode,' . $id,
        ]);

        $loket->update($validated);
        return response()->json($loket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loket = Loket::findOrFail($id);
        $loket->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
