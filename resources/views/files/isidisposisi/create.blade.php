@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Isi Disposisi</h1>
    </div>
    <form action="/isidisposisi" method="POST">
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
                        <input value="{{ old('Isi') }}" type="text" class="form-control @error('Isi') is-invalid @enderror" name="Isi" id="Isi" placeholder="name">
                        <label for="Isi">Isi</label>
                        @error('Isi')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/isidisposisi" class="btn btn-danger">Batal</a>
    </form>
@endsection
