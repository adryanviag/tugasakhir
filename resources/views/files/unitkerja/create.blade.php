@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Unit Kerja</h1>
    </div>
    <form action="/unitkerja" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('Kode') }}" type="text" class="form-control @error('Kode') is-invalid @enderror" name="Kode" id="Kode" placeholder="01">
                        <label for="Kode">Kode</label>
                        @error('Kode')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input value="{{ old('Nama') }}" type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" id="Nama" placeholder="name">
                        <label for="Nama">Nama</label>
                        @error('Nama')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input value="{{ old('Desk') }}" name="Desk" type="text" class="form-control @error('Desk') is-invalid @enderror" id="Desk" placeholder="0">
                        <label for="Desk">Deskripsi</label>
                        @error('Desk')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/unitkerja" class="btn btn-danger">Batal</a>
    </form>
@endsection
