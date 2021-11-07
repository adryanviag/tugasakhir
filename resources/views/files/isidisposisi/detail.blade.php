@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Isi Disposisi</h1>
</div>
<div class="card col-md-4 text-center">
    <h5 class="card-header">{{ $data->Kode }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $data->Isi }}</h5>
        <a href="/isidisposisi" class="btn btn-primary">
            Kembali
        </a>
        <a href="/isidisposisi/{{ $data->Kode }}/edit" class="btn btn-warning text-white">
            Edit
        </a>
        <form action="/isidisposisi/{{ $data->Kode }}" class="d-inline" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>

@endsection
