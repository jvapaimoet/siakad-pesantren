<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ustadz user
        User::updateOrCreate(
            ['email' => 'ustadz@gmail.com'],
            [
                'name' => 'Ustadz Abdulloh',
                'password' => Hash::make('password123'),
                'role' => 'ustadz',
            ]
        );

        // Santri user
        User::updateOrCreate(
            ['email' => 'santri@gmail.com'],
            [
                'name' => 'Santri Muhammad',
                'password' => Hash::make('password123'),
                'role' => 'santri',
            ]
        );

        $laporanKeuangan = [
            [
                'kategori' => 'SPP Santri',
                'tipe_transaksi' => 'pemasukan',
                'nominal' => 12500000,
                'deskripsi' => 'Pembayaran SPP santri bulan Juni 2026',
                'tanggal' => '2026-06-01',
            ],
            [
                'kategori' => 'Donasi Wali Santri',
                'tipe_transaksi' => 'pemasukan',
                'nominal' => 7500000,
                'deskripsi' => 'Donasi pengembangan fasilitas pesantren',
                'tanggal' => '2026-06-05',
            ],
            [
                'kategori' => 'Konsumsi',
                'tipe_transaksi' => 'pengeluaran',
                'nominal' => 8200000,
                'deskripsi' => 'Belanja kebutuhan dapur dan konsumsi santri',
                'tanggal' => '2026-06-08',
            ],
            [
                'kategori' => 'Listrik dan Air',
                'tipe_transaksi' => 'pengeluaran',
                'nominal' => 2100000,
                'deskripsi' => 'Pembayaran listrik dan air asrama',
                'tanggal' => '2026-06-12',
            ],
            [
                'kategori' => 'Buku dan Alat Tulis',
                'tipe_transaksi' => 'pengeluaran',
                'nominal' => 1350000,
                'deskripsi' => 'Pembelian buku belajar dan alat tulis kelas',
                'tanggal' => '2026-06-15',
            ],
        ];

        foreach ($laporanKeuangan as $laporan) {
            Laporan::updateOrCreate(
                [
                    'jenis_laporan' => 'keuangan',
                    'kategori' => $laporan['kategori'],
                    'tanggal' => $laporan['tanggal'],
                ],
                $laporan + ['jenis_laporan' => 'keuangan']
            );
        }
    }
}
