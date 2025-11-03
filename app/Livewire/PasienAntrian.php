<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\Loket;
use Livewire\Component;

class PasienAntrian extends Component
{
    public $lokets = [];
    public $selectedLoket = null;
    public $nomorAntrian = null;
    public $message = '';
    public $messageType = '';

    public function mount()
    {
        $this->lokets = Loket::all();
    }

    public function ambilNomor($loketId)
    {
        $this->selectedLoket = $loketId;
        
        try {
            $loket = Loket::findOrFail($loketId);
            
            // Generate nomor antrian berdasarkan kode loket dan nomor urut
            $today = now()->format('Y-m-d');
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
            
            $this->nomorAntrian = $antrian->nomor_antrian;
            $this->message = "Nomor antrian {$this->nomorAntrian} untuk {$loket->nama_loket} berhasil dibuat!";
            $this->messageType = 'success';
        } catch (\Exception $e) {
            $this->message = 'Terjadi kesalahan: ' . $e->getMessage();
            $this->messageType = 'error';
        }
    }

    public function resetAntrian()
    {
        $this->nomorAntrian = null;
        $this->selectedLoket = null;
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.pasien-antrian')
            ->layout('layouts.app');
    }
}
