@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Unit Kerja</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="col-md-10">
            <a href="/unitkerja/create" type="button" class="btn btn-primary mb-2">Tambah Unit Kerja</a>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Desk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->Kode }}</td>
                            <td>{{ $d->Nama }}</td>
                            <td>{{ $d->Desk }}</td>
                            <td>
                                <a href="/unitkerja/{{ $d->Kode }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                                <a href="/unitkerja/{{ $d->Kode }}/edit"><span class="badge rounded-pill bg-warning"><i
                                            data-feather="edit-2"></i></span></a>
                                <form action="/unitkerja/{{ $d->Kode }}" class="d-inline" method="post">
                                    @method('delete')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="badge rounded-pill bg-danger border"><i data-feather="x"></i></button>
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
