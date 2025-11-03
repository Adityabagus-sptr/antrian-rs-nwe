<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== TEST AUTO-REFRESH DISPLAY ===\n\n";

echo "Simulasi perubahan status antrian...\n\n";

// Ambil antrian menunggu pertama
$antrian = \App\Models\Antrian::where('status', 'menunggu')->first();

if ($antrian) {
    echo "SEBELUM:\n";
    echo "- Dipanggil: " . \App\Models\Antrian::where('status', 'dipanggil')->count() . " antrian\n";
    echo "- Menunggu: " . \App\Models\Antrian::where('status', 'menunggu')->count() . " antrian\n\n";
    
    // Ubah status menjadi dipanggil
    $antrian->status = 'dipanggil';
    $antrian->waktu_panggil = now();
    $antrian->save();
    
    echo "✓ Antrian {$antrian->nomor_antrian} berubah status menjadi DIPANGGIL\n\n";
    
    echo "SESUDAH:\n";
    echo "- Dipanggil: " . \App\Models\Antrian::where('status', 'dipanggil')->count() . " antrian\n";
    echo "- Menunggu: " . \App\Models\Antrian::where('status', 'menunggu')->count() . " antrian\n\n";
    
    echo "✅ Perubahan ini akan muncul di layar display dalam 1 detik!\n";
    echo "   (Sebelumnya: 3 detik, Sekarang: 1 detik)\n";
} else {
    echo "⚠️ Tidak ada antrian menunggu untuk ditest\n";
}
