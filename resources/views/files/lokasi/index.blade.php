@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Lokasi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/lokasi/tambah" type="button" class="btn btn-primary mb-2">Tambah Lokasi</a>
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
                            <h3 class="card-title">List Lokasi</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Unit</th>
                                        <th scope="col">Kode Lokasi</th>
                                        <th scope="col">Desk</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->unit->Kode }}</td>
                                            <td>{{ $d->KdLokasi }}</td>
                                            <td>{{ $d->Desk }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="/lokasi/{{ $d->KdLokasi }}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="/lokasi/{{ $d->KdLokasi }}/ubah"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="/lokasi/{{ $d->KdLokasi }}" class="d-inline"
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
    </section>
@endsection
