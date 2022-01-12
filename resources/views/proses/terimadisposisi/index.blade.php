@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Terima Disposisi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (count($data) < 1)
                        <div class="alert alert-warning">
                            <strong>Tidak ada data!</strong>
                        </div>
                    @else
                        <div class="card">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">List Disposisi Diterima</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl Terima</th>
                                            <th scope="col">Dari</th>
                                            <th scope="col">No Agenda Surat</th>
                                            <th scope="col">Prihal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->TglDiterima->format('D, d M Y') }}</td>
                                                <td>{{ $d->Pengirim }}</td>
                                                <td>{{ $d->NoAgendaSurat }}</td>
                                                <td>{{ $d->SuratMasuk->IsiRingkas }}</td>
                                                <td>{{ $d->Status }}</td>
                                                <td>
                                                    <a href="/terimadisposisi/{{ $d->NoAgendaSurat }}/disposisi"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                        Aksi
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
