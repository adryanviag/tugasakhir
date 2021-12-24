@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Surat Masuk</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/suratmasuk/tambah" type="button" class="btn btn-primary mb-2">Tambah Surat Masuk</a>
                    @if (count($data) < 1)
                        <div class="alert alert-warning">
                            <strong>Tidak ada surat masuk!</strong>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('success') }}
                            </div>
                        @endif
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
                                <h3 class="card-title">List Surat Masuk</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No Agenda</th>
                                            <th scope="col">Pengirim</th>
                                            <th scope="col">Tgl Diterima</th>
                                            <th scope="col">Sifat Surat</th>
                                            <th scope="col">Status Surat</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Kode File</th>
                                            <th scope="col">Tgl Surat</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Prihal</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->NoAgenda }}</td>
                                                <td>{{ $d->Pengirim }}</td>
                                                <td>{{ $d->TglDiterima }}</td>
                                                <td>{{ $d->SifatSurat === '01' ? 'Biasa' : 'Tidak Biasa' }}</td>
                                                <td>
                                                    {{ $d->StatusSurat === '01' ? 'Disimpan' : '' }}
                                                    {{ $d->StatusSurat === '02' ? 'Diproses' : '' }}
                                                    {{ $d->StatusSurat === '03' ? 'Diteruskan' : '' }}
                                                    {{ $d->StatusSurat === '04' ? 'Dipinjam' : '' }}
                                                    {{ $d->StatusSurat === '05' ? 'Hilang' : '' }}
                                                </td>
                                                <td>{{ $d->location->Desk }}</td>
                                                <td><a href="/storage/{{ $d->LokasiMedia }}">FILE</a></td>
                                                <td>{{ $d->TglSurat }}</td>
                                                <td>{{ $d->NoSurat }}</td>
                                                <td><a style="color: rgb(54, 110, 54);"
                                                        href="/suratmasuk/{{ $d->NoAgenda }}/disposisi">
                                                        {{ $d->IsiRingkas }}
                                                    </a></td>
                                                <td>
                                                    <a href="/suratmasuk/{{ $d->NoAgenda }}/ubah"
                                                        class="btn btn-warning btn-sm">
                                                        EDIT
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/suratmasuk/{{ $d->NoAgenda }}" class="d-inline"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm('Yakin ingin menghapus?')"
                                                            type="submit" class="btn btn-danger btn-sm">
                                                            DELETE
                                                        </button>
                                                    </form>
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
