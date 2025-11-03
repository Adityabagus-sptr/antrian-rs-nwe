<?php

namespace Database\Seeders;

use App\Models\Antrian;
use App\Models\Loket;
use Illuminate\Database\Seeder;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokets = Loket::all();
        
        if ($lokets->isEmpty()) {
            $this->command->error('Tidak ada loket! Jalankan LoketSeeder terlebih dahulu.');
            return;
        }
        
        // Buat beberapa antrian untuk setiap loket
        foreach ($lokets as $loket) {
            // Antrian menunggu
            for ($i = 1; $i <= 3; $i++) {
                Antrian::create([
                    'loket_id' => $loket->id,
                    'nomor_antrian' => $loket->kode . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'status' => 'menunggu',
                ]);
            }
            
            // 1 antrian sedang dipanggil
            Antrian::create([
                'loket_id' => $loket->id,
                'nomor_antrian' => $loket->kode . '004',
                'status' => 'dipanggil',
                'waktu_panggil' => now(),
            ]);
        }
        
        $this->command->info('Berhasil membuat ' . Antrian::count() . ' antrian dummy!');
    }
}
