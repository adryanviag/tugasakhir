@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Klasifikasi</h1>
    </div>
    <div class="col-md-4">
        <form name="add-classification" id="add-classification" method="post" action="/klasifikasi">
            @csrf
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('Kode') }}" name="Kode" type="text" class="form-control @error('Kode')
                    is-invalid
                @enderror" id="Kode" placeholder="01">
                <label for="Kode">Kode</label>
                @error('Kode')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="Klas" value="{{ old('Klas') }}" type="text" class="form-control @error('Klas')
                is-invalid
                @enderror" id="Klas" placeholder="name@example.com">
                <label for="Klas">Klasifikasi</label>
                @error('Klas')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="Aktif" value="{{ old('Aktif') }}" type="text" class="form-control @error('Aktif')
                is-invalid
                @enderror" id="Aktif" placeholder="0">
                <label for="Aktif">Aktif</label>
                @error('Aktif')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="InAktif" value="{{ old('InAktif') }}" type="text" class="form-control @error('InAktif')
                is-invalid
                @enderror" id="InAktif" placeholder="0">
                <label for="InAktif">InAktif</label>
                @error('InAktif')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="TindakLanjut" value="{{ old('TindakLanjut') }}" type="text" class="form-control @error('TindakLanjut')
                is-invalid
                @enderror" id="TindakLanjut" placeholder="0">
                <label for="TindakLanjut">Tindak Lanjut</label>
                @error('TindakLanjut')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/klasifikasi" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
