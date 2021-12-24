@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah Isi Disposisi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Isi Disposisi</h3>
                        </div>
                        <form method="post" action="/isidisposisi">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="kode">Kode</label>
                                        <input autofocus value="{{ old('Kode') }}" type="text"
                                            class="form-control @error('Kode') is-invalid @enderror" name="Kode" id="Kode"
                                            placeholder="Masukkan Kode . .">
                                        @error('Kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="Isi">Isi</label>
                                        <input value="{{ old('Isi') }}" type="text"
                                            class="form-control @error('Isi') is-invalid @enderror" name="Isi" id="Isi"
                                            placeholder="Masukkan Isi . .">
                                        @error('Isi')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/isidisposisi" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
