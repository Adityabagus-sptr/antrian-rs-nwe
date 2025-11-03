<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== TEST SISTEM ANTRIAN ===\n\n";

// Test 1: Panggil antrian
echo "1. Test Panggil Antrian\n";
$antrian = \App\Models\Antrian::where('status', 'menunggu')->first();
if ($antrian) {
    echo "   Sebelum: {$antrian->nomor_antrian} - Status: {$antrian->status}\n";
    $antrian->status = 'dipanggil';
    $antrian->waktu_panggil = now();
    $antrian->save();
    echo "   Sesudah: {$antrian->nomor_antrian} - Status: {$antrian->status}\n";
    echo "   ✓ Berhasil!\n\n";
} else {
    echo "   ✗ Tidak ada antrian menunggu\n\n";
}

// Test 2: Selesaikan antrian
echo "2. Test Selesai Melayani\n";
$antrian = \App\Models\Antrian::where('status', 'dipanggil')->first();
if ($antrian) {
    echo "   Sebelum: {$antrian->nomor_antrian} - Status: {$antrian->status}\n";
    $antrian->status = 'selesai';
    $antrian->save();
    echo "   Sesudah: {$antrian->nomor_antrian} - Status: {$antrian->status}\n";
    echo "   ✓ Berhasil!\n\n";
} else {
    echo "   ✗ Tidak ada antrian dipanggil\n\n";
}

// Test 3: Buat antrian baru
echo "3. Test Buat Antrian Baru\n";
$loket = \App\Models\Loket::first();
$today = now()->format('Y-m-d');
$lastAntrian = \App\Models\Antrian::where('loket_id', $loket->id)
    ->whereDate('created_at', $today)
    ->latest()
    ->first();
    
$urutan = 1;
if ($lastAntrian) {
    $lastUrutan = (int) substr($lastAntrian->nomor_antrian, 1);
    $urutan = $lastUrutan + 1;
}

$nomorAntrian = $loket->kode . str_pad($urutan, 3, '0', STR_PAD_LEFT);
$newAntrian = \App\Models\Antrian::create([
    'loket_id' => $loket->id,
    'nomor_antrian' => $nomorAntrian,
    'status' => 'menunggu',
]);

echo "   Nomor: {$newAntrian->nomor_antrian}\n";
echo "   Loket: {$loket->nama_loket}\n";
echo "   Status: {$newAntrian->status}\n";
echo "   ✓ Berhasil!\n\n";

echo "=== SEMUA TEST SELESAI ===\n";
