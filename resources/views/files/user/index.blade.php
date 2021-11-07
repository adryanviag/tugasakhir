@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="col-md-10">
            <a href="/user/create" class="btn btn-primary mb-2">Tambah User</a>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show">
                {{ session('success') }}
            </div>
            @endif
            @if(session()->has('errorDel'))
            <div class="alert alert-danger alert-dismissable fade show">
                {{ session('errorDel') }}
            </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Privilege</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->unit->Nama }}</td>
                            <td>{{ $d->prev }}</td>
                            <td>
                                <a href="/user/{{ $d->username }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                                <a href="/user/{{ $d->username }}/edit"><span class="badge rounded-pill bg-warning"><i
                                            data-feather="edit-2"></i></span></a>
                                <form action="/user/{{ $d->username }}" class="d-inline" method="post">
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
