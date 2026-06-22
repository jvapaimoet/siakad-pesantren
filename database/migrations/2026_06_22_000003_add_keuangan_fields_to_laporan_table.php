<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('jenis_laporan');
            $table->enum('tipe_transaksi', ['pemasukan', 'pengeluaran'])->nullable()->after('kategori');
            $table->decimal('nominal', 15, 2)->nullable()->after('tipe_transaksi');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'tipe_transaksi', 'nominal']);
        });
    }
};
