<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Data Loket ===\n";
$lokets = \App\Models\Loket::all();
echo "Total Loket: " . $lokets->count() . "\n";
foreach ($lokets as $loket) {
    echo "- [{$loket->kode}] {$loket->nama_loket}\n";
}

echo "\n=== Data Antrian ===\n";
$antrians = \App\Models\Antrian::with('loket')->get();
echo "Total Antrian: " . $antrians->count() . "\n";
foreach ($antrians as $antrian) {
    echo "- {$antrian->nomor_antrian} | {$antrian->loket->nama_loket} | Status: {$antrian->status}\n";
}

if ($antrians->count() === 0) {
    echo "\n⚠️ TIDAK ADA DATA ANTRIAN!\n";
    echo "Untuk membuat antrian, klik tombol di halaman /pasien-antrian\n";
}
