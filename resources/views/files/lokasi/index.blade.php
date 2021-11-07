@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Lokasi</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="col-md-10">
            <a href="/lokasi/create" type="button" class="btn btn-primary mb-2">Tambah Lokasi</a>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-hover">
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
                                <a href="/lokasi/{{ $d->KdLokasi }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                                <a href="/lokasi/{{ $d->KdLokasi }}/edit"><span class="badge rounded-pill bg-warning"><i
                                            data-feather="edit-2"></i></span></a>
                                <form action="/lokasi/{{ $d->KdLokasi }}" class="d-inline" method="post">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="badge rounded-pill bg-danger border"><i data-feather="x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
