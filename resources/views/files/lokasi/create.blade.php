@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Lokasi</h1>
    </div>
    <div class="col-md-4">
        <form method="post" action="/lokasi">
            @csrf
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('KdLokasi') }}" name="KdLokasi" type="text" class="form-control @error('KdLokasi') is-invalid @enderror" id="KdLokasi" placeholder="01">
                <label for="KdLokasi">Kode</label>
                @error('KdLokasi')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" name="KdUnit" aria-label="Default select example">
                    <option disabled selected>== UNIT ==</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input value="{{ old('Desk') }}" name="Desk" type="text" class="form-control @error('Desk') is-invalid @enderror" id="Desk" placeholder="name@example.com">
                <label for="Desk">Deskripsi</label>
                @error('Desk')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/lokasi" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
