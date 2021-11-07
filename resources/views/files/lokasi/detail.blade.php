@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Lokasi</h1>
</div>
<div class="card col-md-4 text-center">
    <h5 class="card-header">{{ $data->KdLokasi }}</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $data->Desk }}</h5>
        <p class="card-text">Unit : {{ $data->unit->Nama }}</p>
        <a href="/lokasi" class="btn btn-primary">
            Kembali
        </a>
        <a href="/lokasi/{{ $data->KdLokasi }}/edit" class="btn btn-warning text-white">
            Edit
        </a>
        <form action="/lokasi/{{ $data->KdLokasi }}" class="d-inline" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>

@endsection
