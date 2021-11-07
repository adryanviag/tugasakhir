@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Instansi</h1>
</div>
<div class="card col-md-4 ">
    <h5 class="card-header">{{ $data->kode }} : {{ $data->instansi }}</h5>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Unit : <strong>{{ $data->unit->Nama }}</strong></li>
            <li class="list-group-item">Alamat : <strong>{{ $data->alamat }}</strong></li>
            <li class="list-group-item">Kota : <strong>{{ $data->kota }}</strong></li>
            <li class="list-group-item">Kode Pos : <strong>{{ $data->kodepos }}</strong></li>
            <li class="list-group-item">Telpon : <strong>{{ $data->telpon }}</strong></li>
            <li class="list-group-item">Fax : <strong>{{ $data->fax }}</strong></li>
            <li class="list-group-item">Kontak : <strong>{{ $data->kontak }}</strong></li>
            <li class="list-group-item">Email : <strong>{{ $data->email }}</strong></li>
            <li class="list-group-item">Web : <strong>{{ $data->web }}</strong></li>
          </ul>
        <a href="/instansi" class="btn btn-primary">
            Kembali
        </a>
        <a href="/instansi/{{ $data->kode }}/edit" class="btn btn-warning text-white">
            Edit
        </a>
        <form action="/instansi/{{ $data->kode }}" class="d-inline" method="post">
            @method('delete')
            @csrf
            <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
  </div>

@endsection
