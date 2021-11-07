@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail User</h1>
</div>
<div class="card col-md-4 text-center">
    <h5 class="card-header">{{ $data->username }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $data->unit->Nama }}</h5>
        <p class="card-title">Privilege : {{ $data->prev }}</p>
        <a href="/user" class="btn btn-primary">
            Kembali
        </a>
        <a href="/user/{{ $data->username }}/edit" class="btn btn-warning text-white">
            Edit
        </a>
        <form action="/user/{{ $data->username }}" class="d-inline" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>

@endsection
