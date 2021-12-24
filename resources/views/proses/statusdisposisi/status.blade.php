@extends('layouts.main')

@section('container')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Penelusuran Disposisi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="accordion">
                        <div class="card card-success">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                        Info Surat
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nomor Agenda</dt>
                                        <dd class="col-sm-8">{{ $data_sm->NoAgenda }}</dd>
                                        <dt class="col-sm-4">Tanggal Diterima</dt>
                                        <dd class="col-sm-8">{{ $tgl_diterima }}</dd>
                                        <dt class="col-sm-4">Tanggal Surat</dt>
                                        <dd class="col-sm-8">{{ $tgl_surat }}</dd>
                                        <dt class="col-sm-4">No Surat</dt>
                                        <dd class="col-sm-8">{{ $data_sm->NoSurat }}</dd>
                                        <dt class="col-sm-4">Pengirim</dt>
                                        <dd class="col-sm-8">{{ $data_sm->Pengirim }}</dd>
                                        <dt class="col-sm-4">Perihal</dt>
                                        <dd class="col-sm-8">{{ $data_sm->IsiRingkas }}</dd>
                                        <dt class="col-sm-4">File Digital</dt>
                                        <dd class="col-sm-8"><a href="/storage/{{ $data_sm->LokasiMedia }}"><span
                                                    class="badge rounded-pill bg-success">See File</span></a></dd>
                                        <dt class="col-sm-4">Sifat Surat</dt>
                                        <dd class="col-sm-8">@if ($data_sm->SifatSurat === '01') Biasa
                                            @else Tidak Biasa
                                            @endif
                                        </dd>
                                        <dt class="col-sm-4">Tanggal Harus Selesai</dt>
                                        <dd class="col-sm-8">{{ $tgl_selesai }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                        Tracking Disposisi Surat
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body table-responsive">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Dari</th>
                                                <th scope="col">Isi Disposisi</th>
                                                <th scope="col">Kepada</th>
                                                <th scope="col">Status Pelaksanaan</th>
                                                <th scope="col">Tgl Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_disposisi as $data)
                                                <tr>
                                                    <td>{{ $data['TglDisposisi'] }}</td>
                                                    <td>
                                                        @if ($data['Dari'] === 'UN01') Dekan @endif
                                                        @if ($data['Dari'] === 'UN02') WD 1 @endif
                                                        @if ($data['Dari'] === 'UN03') WD 2 @endif
                                                    </td>
                                                    <td>
                                                        @if ($data['Isi'] === 'KD01') Beri Disposisi @endif
                                                        @if ($data['Isi'] === 'KD02') Terima Disposisi @endif
                                                    </td>
                                                    <td>
                                                        @if ($data['Kepada'] === 'UN01') Dekan @endif
                                                        @if ($data['Kepada'] === 'UN02') WD 1 @endif
                                                        @if ($data['Kepada'] === 'UN03') WD 2 @endif
                                                    </td>
                                                    <td>{{ $data['Status'] }}</td>
                                                    <td>@if ($data['TglStatus'] == null) - @else {{ $data['TglStatus'] }} @endif</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
