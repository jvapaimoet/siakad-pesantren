<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('jenis_laporan')->after('id');
            $table->text('deskripsi')->nullable()->after('jenis_laporan');
            $table->date('tanggal')->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn(['jenis_laporan', 'deskripsi', 'tanggal']);
        });
    }
};
