<?php

namespace App\Http\Controllers;

use App\Exports\StatusDisposisiExport;
use App\Models\BeriDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class StatusDisposisiController extends Controller
{
    public function index()
    {
        $data = [];
        $unit = auth()->user()->unit->Kode;

        if (request()->from && request()->to) {
            $data = DB::table('tbberidisposisi')
                ->select('tbberidisposisi.NoAgendaSurat', 'tbberidisposisi.TglDisposisi', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                ->where('tbberidisposisi.KdUnit', $unit)
                ->whereBetween('TglDisposisi', [request()->from, request()->to])
                ->get();
        } else {
            $data = DB::table('tbberidisposisi')
                ->select('tbberidisposisi.*', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                ->where('tbberidisposisi.KdUnit', $unit)
                ->get();
        }

        // return dd(date($data[0]->TglDisposisi));

        return view('proses.statusdisposisi.index', [
            'title' => 'Status Disposisi',
            'data' => $data,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function status($nosurat)
    {
        // ! Validasi
        if (SuratMasuk::find($nosurat) == null) {
            return Redirect::back();
        }

        // ! ambil data surat yang terkait.
        $data_suratmasuk = BeriDisposisi::find($nosurat)->SuratMasuk;
        $data_disposisi = SuratMasuk::find($nosurat)->BeriDisposisi;
        $data_tdisposisi = SuratMasuk::find($nosurat)->TerimaDisposisi;

        $final_data = [
            [
                'TglDisposisi' => $data_disposisi[0]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[0]->KdUnit,
                'Isi' => $data_disposisi[0]->Isi,
                'Kepada' => $data_disposisi[0]->Penerima,
                'Status' => $data_tdisposisi[0]->Status,
                'TglStatus' => '-'
            ]
        ];

        if (count($data_disposisi) == 2) {
            $final_data[0]['TglStatus'] = $data_disposisi[1]->TglDisposisi->format('d M Y');
            $final_data[1] = [
                'TglDisposisi' => $data_disposisi[1]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[1]->KdUnit,
                'Isi' => $data_disposisi[1]->Isi,
                'Kepada' => $data_disposisi[1]->Penerima,
                'Status' => $data_tdisposisi[1]->Status,
                'TglStatus' => '-'
            ];
        }

        if (count($data_disposisi) == 3) {
            $final_data[0]['TglStatus'] = $data_disposisi[1]->TglDisposisi->format('d M Y');
            $final_data[1] = [
                'TglDisposisi' => $data_disposisi[1]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[1]->KdUnit,
                'Isi' => $data_disposisi[1]->Isi,
                'Kepada' => $data_disposisi[1]->Penerima,
                'Status' => $data_tdisposisi[1]->Status,
                'TglStatus' => $data_disposisi[2]->TglDisposisi->format('d M Y')
            ];

            $final_data[2] = [
                'TglDisposisi' => $data_disposisi[2]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[2]->KdUnit,
                'Isi' => $data_disposisi[2]->Isi,
                'Kepada' => $data_disposisi[2]->Penerima,
                'Status' => $data_tdisposisi[2]->Status,
                'TglStatus' => '-'
            ];
        }

        if (count($data_disposisi) == 4) {
            $final_data[0]['TglStatus'] = $data_disposisi[1]->TglDisposisi->format('d M Y');
            $final_data[1] = [
                'TglDisposisi' => $data_disposisi[1]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[1]->KdUnit,
                'Isi' => $data_disposisi[1]->Isi,
                'Kepada' => $data_disposisi[1]->Penerima,
                'Status' => $data_tdisposisi[1]->Status,
                'TglStatus' => $data_disposisi[2]->TglDisposisi->format('d M Y')
            ];

            $final_data[2] = [
                'TglDisposisi' => $data_disposisi[2]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[2]->KdUnit,
                'Isi' => $data_disposisi[2]->Isi,
                'Kepada' => $data_disposisi[2]->Penerima,
                'Status' => $data_tdisposisi[2]->Status,
                'TglStatus' => $data_disposisi[3]->TglDisposisi->format('d M Y')
            ];

            $final_data[3] = [
                'TglDisposisi' => $data_disposisi[3]->TglDisposisi->format('d M Y'),
                'Dari' => $data_disposisi[3]->KdUnit,
                'Isi' => $data_disposisi[3]->Isi,
                'Kepada' => $data_disposisi[3]->Penerima,
                'Status' => $data_tdisposisi[3]->Status,
                'TglStatus' => '-'
            ];
        }

        // ! converting dates
        setlocale(LC_ALL, 'IND');
        $time = strtotime($data_suratmasuk->TglDiterima);
        $time_surat = strtotime($data_suratmasuk->TglSurat);
        $time_selesai = strtotime($data_suratmasuk->TglHrsSelesai);
        $formatted_tglditerima = strftime("%A, %d %B %Y", $time);
        $formatted_tglsurat = strftime("%A, %d %B %Y", $time_surat);
        $formatted_tglselesai = strftime("%A, %d %B %Y", $time_selesai);

        return view('proses.statusdisposisi.status', [
            'title' => 'Status Disposisi',
            'data_sm' => $data_suratmasuk,
            'data_disposisi' => $final_data,
            'tgl_diterima' => $formatted_tglditerima,
            'tgl_surat' => $formatted_tglsurat,
            'tgl_selesai' => $formatted_tglselesai
        ]);
    }

    public function export()
    {
        return Excel::download(new StatusDisposisiExport, 'status_disposisi.csv');
    }
}
