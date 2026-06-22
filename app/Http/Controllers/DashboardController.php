<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Santri;
use App\Models\Ustadz;
use App\Models\Jadwal;
use App\Models\Laporan;

class DashboardController extends Controller
{
    /**
     * Menampilkan Halaman Utama Dashboard SIPES
     */
    public function index()
    {
        $user = Auth::user();
        
        // Statistik Utama
        $totalSantri = Santri::count();
        $totalUstadz = Ustadz::count();
        $jumlahUstadz = $totalUstadz;
        $totalJadwal = Jadwal::count();
        $totalLaporan = Laporan::count();
        $totalAbsen = 0;
        $persentaseAbsen = 0;

        // Data Terbaru
        $santriTerbaru = Santri::latest()->take(5)->get();
        $ustadzPiket = Ustadz::latest()->take(5)->get();
        $jadwalTerdekat = Jadwal::orderBy('hari')->orderBy('jam')->take(5)->get();

        return view('dashboard', compact(
            'user',
            'totalSantri', 
            'totalUstadz', 
            'jumlahUstadz', 
            'totalJadwal', 
            'totalLaporan', 
            'totalAbsen', 
            'persentaseAbsen', 
            'santriTerbaru', 
            'ustadzPiket',
            'jadwalTerdekat'
        ));
    }
}
