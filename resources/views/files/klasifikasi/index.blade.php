@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Klasifikasi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/klasifikasi/tambah" class="btn btn-primary mb-2">Tambah Klasifikasi</a>
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
                            <h3 class="card-title">List Klasifikasi</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Klasifikasi</th>
                                        <th scope="col">Aktif</th>
                                        <th scope="col">InAktif</th>
                                        <th scope="col">Tindak Lanjut</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->Kode }}</td>
                                            <td>{{ $d->Klas }}</td>
                                            <td>{{ $d->Aktif }}</td>
                                            <td>{{ $d->InAktif }}</td>
                                            <td>{{ $d->TindakLanjut }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/klasifikasi/{{ $d->Kode }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="/klasifikasi/{{ $d->Kode }}/ubah"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="/klasifikasi/{{ $d->Kode }}" class="d-inline"
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
