<?php

namespace App\Livewire;

use App\Models\Antrian;
use Livewire\Component;

class DisplayAntrian extends Component
{
    public function render()
    {
        // Ambil antrian yang sedang dipanggil dari semua loket
        $antrianDipanggil = Antrian::where('status', 'dipanggil')
            ->with('loket')
            ->orderBy('waktu_panggil', 'desc')
            ->get()
            ->toArray();
        
        // Ambil antrian yang menunggu dari semua loket (6 teratas)
        $antrianMenunggu = Antrian::where('status', 'menunggu')
            ->with('loket')
            ->orderBy('created_at', 'asc')
            ->limit(6)
            ->get()
            ->toArray();
        
        return view('livewire.display-antrian', [
            'antrianDipanggil' => $antrianDipanggil,
            'antrianMenunggu' => $antrianMenunggu,
        ])->layout('layouts.app');
    }
}
