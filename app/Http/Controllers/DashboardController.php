<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $table_suratmasuk = Unit::find(auth()->user()->unit->Kode)->SuratMasuk;
        $table_beridisposisi = Unit::find(auth()->user()->unit->Kode)->BeriDisposisi;
        $table_terimadisposisi = Unit::find(auth()->user()->unit->Kode)->TerimaDisposisi;

        return view('dashboard', [
            'title' => 'Dashboard',
            'jml_suratmasuk' => $table_suratmasuk->where('TglDiterima', '>', Carbon::now()->startOfMonth())->where('TglDiterima', '<', Carbon::now()->endOfMonth())->count(),
            'jml_beridisposisi' => $table_beridisposisi->where('TglDisposisi', '>', Carbon::now()->startOfMonth())->where('TglDisposisi', '<', Carbon::now()->endOfMonth())->count(),
            'jml_terimadisposisi' => $table_terimadisposisi->where('TglDiterima', '>', Carbon::now()->startOfMonth())->where('TglDiterima', '<', Carbon::now()->endOfMonth())->count(),
        ]);
    }
}
