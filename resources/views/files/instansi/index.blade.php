@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Instansi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/instansi/tambah" type="button" class="btn btn-primary mb-2">Tambah Instansi</a>
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
                            <h3 class="card-title">List Instansi</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Instansi</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Kontak</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Kode Pos</th>
                                        <th scope="col">Telpon</th>
                                        <th scope="col">Fax</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Web</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->kode }}</td>
                                            <td>{{ $d->instansi }}</td>
                                            <td>{{ $d->unit->Nama }}</td>
                                            <td>@if ($d->kontak) {{ $d->kontak }} @else - @endif</td>
                                            <td>@if ($d->alamat) {{ $d->alamat }} @else - @endif</td>
                                            <td>@if ($d->kota) {{ $d->kota }} @else - @endif</td>
                                            <td>@if ($d->kodepos) {{ $d->kodepos }} @else - @endif</td>
                                            <td>@if ($d->telpon) {{ $d->telpon }} @else - @endif</td>
                                            <td>@if ($d->fax) {{ $d->fax }} @else - @endif</td>
                                            <td>@if ($d->email) {{ $d->email }} @else - @endif</td>
                                            <td>@if ($d->web) {{ $d->web }} @else - @endif</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/instansi/{{ $d->kode }}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="/instansi/{{ $d->kode }}/ubah"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="/instansi/{{ $d->kode }}" class="d-inline"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm('Yakin ingin menghapus?')"
                                                            type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-times-circle"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
