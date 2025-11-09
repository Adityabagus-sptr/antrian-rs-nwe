<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('antrians', function (Blueprint $table) {
            // Index untuk performa query antrian menunggu/dipanggil per loket
            $table->index(['loket_id', 'status']);

            // Index untuk query total antrian hari ini per loket
            $table->index(['loket_id', 'created_at']);

            // Index untuk query antrian selesai hari ini per loket
            $table->index(['loket_id', 'status', 'updated_at']);

            // Index untuk query yang menggunakan waktu_panggil
            $table->index('waktu_panggil');

            // Index komposit untuk performa statistik
            $table->index(['loket_id', 'status', 'created_at']);
            $table->index(['loket_id', 'status', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antrians', function (Blueprint $table) {
            $table->dropIndex(['loket_id', 'status']);
            $table->dropIndex(['loket_id', 'created_at']);
            $table->dropIndex(['loket_id', 'status', 'updated_at']);
            $table->dropIndex(['waktu_panggil']);
            $table->dropIndex(['loket_id', 'status', 'created_at']);
            $table->dropIndex(['loket_id', 'status', 'updated_at']);
        });
    }
};
