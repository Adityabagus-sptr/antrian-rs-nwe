<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\Loket;
use Livewire\Component;

class PetugasLoket extends Component
{
    public $lokets = [];
    public $selectedLoket = null;
    public $antrianMenunggu = [];
    public $antrianDipanggil = null;
    public $message = '';
    public $messageType = '';

    public function mount()
    {
        $this->lokets = Loket::all();
        $this->refreshData();
    }

    public function pilihLoket($loketId)
    {
        $this->selectedLoket = $loketId;
        $this->refreshData();
    }

    public function refreshData()
    {
        if ($this->selectedLoket) {
            // Ambil antrian yang menunggu
            $this->antrianMenunggu = Antrian::where('loket_id', $this->selectedLoket)
                ->where('status', 'menunggu')
                ->orderBy('created_at')
                ->get();
                
            // Ambil antrian yang sedang dipanggil
            $this->antrianDipanggil = Antrian::where('loket_id', $this->selectedLoket)
                ->where('status', 'dipanggil')
                ->first();
        }
    }

    public function panggilAntrian($antrianId)
    {
        try {
            $antrian = Antrian::findOrFail($antrianId);
            
            // Set status antrian yang sedang dipanggil menjadi selesai
            if ($this->antrianDipanggil) {
                $this->antrianDipanggil->status = 'selesai';
                $this->antrianDipanggil->save();
            }
            
            // Panggil antrian baru
            $antrian->status = 'dipanggil';
            $antrian->waktu_panggil = now();
            $antrian->save();
            
            $this->message = "Antrian {$antrian->nomor_antrian} berhasil dipanggil!";
            $this->messageType = 'success';
        } catch (\Exception $e) {
            $this->message = 'Terjadi kesalahan: ' . $e->getMessage();
            $this->messageType = 'error';
        }
        
        $this->refreshData();
    }

    public function selesaiAntrian($antrianId)
    {
        try {
            $antrian = Antrian::findOrFail($antrianId);
            $antrian->status = 'selesai';
            $antrian->save();
            
            $this->message = "Antrian {$antrian->nomor_antrian} berhasil diselesaikan!";
            $this->messageType = 'success';
        } catch (\Exception $e) {
            $this->message = 'Terjadi kesalahan: ' . $e->getMessage();
            $this->messageType = 'error';
        }
        
        $this->refreshData();
    }

    public function render()
    {
        return view('livewire.petugas-loket')
            ->layout('layouts.app');
    }
}
