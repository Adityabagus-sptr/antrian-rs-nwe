<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loket;

class LoketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokets = [
            [
                'nama_loket' => 'PENDAFTARAN UMUM',
                'deskripsi' => 'Loket untuk pendaftaran pasien umum',
                'kode' => 'A',
            ],
            [
                'nama_loket' => 'POLI GIGI',
                'deskripsi' => 'Loket untuk layanan poli gigi',
                'kode' => 'B',
            ],
            [
                'nama_loket' => 'FARMASI',
                'deskripsi' => 'Loket untuk pengambilan obat',
                'kode' => 'C',
            ],
        ];

        foreach ($lokets as $loket) {
            Loket::create($loket);
        }

        \App\Models\Loket::create(['nama_loket' => 'Pendaftaran Umum', 'deskripsi' => 'Loket untuk pendaftaran pasien umum', 'kode' => 'D']);
        \App\Models\Loket::create(['nama_loket' => 'Poli Gigi', 'deskripsi' => 'Loket untuk layanan gigi', 'kode' => 'E']);
    }
}
