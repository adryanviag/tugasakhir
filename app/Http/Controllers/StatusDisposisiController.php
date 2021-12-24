<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\BeriDisposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StatusDisposisiController extends Controller
{
    public function index()
    {
        return view('proses.statusdisposisi.index', [
            'title' => 'Status Disposisi',
            'data' => Unit::find(auth()->user()->unit->Kode)->BeriDisposisi,
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
}
