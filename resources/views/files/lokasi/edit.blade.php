@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Lokasi</h1>
    </div>
    <div class="col-md-4">
        <form name="add-classification" id="add-classification" method="post" action="/lokasi/{{ $data->KdLokasi }}">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input disabled value="{{ old('KdLokasi', $data->KdLokasi) }}" autofocus name="KdLokasi" type="text" class="form-control @error('KdLokasi') is-invalid @enderror" id="KdLokasi" placeholder="01">
                <label for="KdLokasi">Kode</label>
            </div>
            <div class="mb-3">
                <select class="form-select" name="KdUnit" aria-label="Default select example">
                    @foreach($units as $unit)
                        <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }} value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                    @endforeach
                </select>
                @error('KdUnit')
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
            <a href="/lokasi" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
