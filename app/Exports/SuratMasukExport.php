<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratMasukExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $kodeunit = request()->user()->unit->Kode;
        $from = request()->from;
        $to = request()->to;

        if ($from && $to) {
            return SuratMasuk::select('NoAgenda', 'IsiRingkas', 'Pengirim')->where('KdUnit', $kodeunit)->whereBetween('TglDiterima', [$from, $to])->get();
        } else {
            return SuratMasuk::select('NoAgenda', 'IsiRingkas', 'Pengirim')->where('KdUnit', $kodeunit)->get();
        }
    }
}
