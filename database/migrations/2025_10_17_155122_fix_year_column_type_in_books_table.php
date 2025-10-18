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
        Schema::table('books', function (Blueprint $table) {
            // Ubah tipe data kolom year menjadi smallInteger
            // smallInteger memiliki rentang -32768 hingga 32767, cukup untuk tahun 1813
            $table->smallInteger('year')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Kembalikan ke tipe sebelumnya jika rollback (opsional, sesuaikan dengan migrasi awal)
            // Misalnya jika sebelumnya adalah year():
            $table->year('year')->change();
        });
    }
};