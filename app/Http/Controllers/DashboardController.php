<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Ustadz;
use App\Models\Jadwal;
use App\Models\Laporan;
use App\Models\Absen;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $totalSantri = Santri::count();
        $totalUstadz = Ustadz::count();
        $totalJadwal = Jadwal::count();
        $totalLaporan = Laporan::count();
        $totalAbsen = Absen::count();

        // Persentase Kehadiran (sementara)
        $persentaseAbsen = 0;

        // Data Santri Terbaru
        $santriTerbaru = Santri::latest()->take(5)->get();

        // Data Ustadz Terbaru
        $ustadzPiket = Ustadz::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalSantri',
            'totalUstadz',
            'totalJadwal',
            'totalLaporan',
            'totalAbsen',
            'persentaseAbsen',
            'santriTerbaru',
            'ustadzPiket'
        ));
    }
}