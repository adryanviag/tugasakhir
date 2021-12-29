<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Support\Facades\DB;

class StatusDisposisiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $unit = auth()->user()->unit->Kode;
        $from = request()->from;
        $to = request()->to;

        if ($from && $to) {
            $data = DB::table('tbberidisposisi')
                ->select('tbberidisposisi.NoAgendaSurat', 'tbberidisposisi.TglDisposisi', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                ->where('tbberidisposisi.KdUnit', $unit)
                ->whereBetween('TglDisposisi', [$from, $to])
                ->get();
        } else {
            $data = DB::table('tbberidisposisi')
                ->select('tbberidisposisi.NoAgendaSurat', 'tbberidisposisi.TglDisposisi', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                ->where('tbberidisposisi.KdUnit', $unit)
                ->get();
        }
        return dd($data);
    }
}
