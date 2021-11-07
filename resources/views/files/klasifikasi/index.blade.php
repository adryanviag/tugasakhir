@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Klasifikasi</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between">
                <div class="">
                    <a href="/klasifikasi/create" class="btn btn-primary mb-2">Tambah Klasifikasi</a>
                </div>
                <div class="">
                    {{ $data->links() }}
                </div>
            </div>

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-hover">
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
                                <a href="/klasifikasi/{{ $d->Kode }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                                <a href="/klasifikasi/{{ $d->Kode }}/edit"><span class="badge rounded-pill bg-warning"><i
                                            data-feather="edit-2"></i></span></a>
                                <form action="/klasifikasi/{{ $d->Kode }}" class="d-inline" method="post">
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
