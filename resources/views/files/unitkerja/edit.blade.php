@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Unit Kerja</h1>
</div>
<div class="col-md-4">
    <form name="add-classification" id="add-classification" method="post" action="/unitkerja/{{ $data->Kode }}">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input disabled value="{{ old('Kode', $data->Kode) }}" autofocus name="Kode" type="text" class="form-control @error('Kode') is-invalid @enderror" id="Kode" placeholder="01">
            <label for="Kode">Kode</label>
        </div>
        <div class="form-floating mb-3">
            <input value="{{ old('Nama', $data->Nama) }}" name="Nama" type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" placeholder="name@example.com">
            <label for="Nama">Nama</label>
            @error('Nama')
            <div class="invalid-feedback mb-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{ old('Desk', $data->Desk) }}" name="Desk" type="text" class="form-control @error('Desk') is-invalid @enderror" id="Desk" placeholder="name@example.com">
            <label for="Desk">Deskripsi</label>
            @error('Desk')
            <div class="invalid-feedback mb-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/unitkerja" class="btn btn-danger">Batal</a>
    </form>
</div>

@endsection
