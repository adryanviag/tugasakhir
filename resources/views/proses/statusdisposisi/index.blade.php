@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Status Disposisi</h1>
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
                            <h3 class="card-title">List Disposisi Diberikan</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tgl Disposisi</th>
                                        <th scope="col">No Agenda Surat</th>
                                        <th scope="col">Prihal</th>
                                        <th scope="col">Penerima</th>
                                        <th scope="col">Isi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->TglDisposisi->format('D, d M Y') }}</td>
                                            <td>{{ $d->NoAgendaSurat }}</td>
                                            <td>{{ $d->SuratMasuk->IsiRingkas }}</td>
                                            <td>
                                                @if ($d->Penerima === 'UN01') Dekan @endif
                                                @if ($d->Penerima === 'UN02') WD 1 @endif
                                                @if ($d->Penerima === 'UN03') WD 2 @endif
                                            </td>
                                            <td>
                                                @if ($d->Isi === 'KD01') Beri Disposisi @endif
                                                @if ($d->Isi === 'KD02') Terima Disposisi @endif
                                            </td>
                                            <td>
                                                <a href="/status/{{ $d->NoAgendaSurat }}/disposisi"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                    Lacak
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
