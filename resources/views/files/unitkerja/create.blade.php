@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah Unit Kerja</h1>
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
                            <h3 class="card-title">Form Tambah Unit Kerja</h3>
                        </div>
                        <form action="/unitkerja" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="Kode">Kode</label>
                                        <input autofocus value="{{ old('Kode') }}" type="text"
                                            class="form-control @error('Kode') is-invalid @enderror" name="Kode" id="Kode"
                                            placeholder="Masukkan Kode . .">
                                        @error('Kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="Nama">Nama</label>
                                        <input value="{{ old('Nama') }}" type="text"
                                            class="form-control @error('Nama') is-invalid @enderror" name="Nama" id="Nama"
                                            placeholder="Masukkan Nama . .">
                                        @error('Nama')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="Desk">Deskripsi</label>
                                        <input value="{{ old('Desk') }}" name="Desk" type="text"
                                            class="form-control @error('Desk') is-invalid @enderror" id="Desk"
                                            placeholder="Masukkan Deskripsi . .">
                                        @error('Desk')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/unitkerja" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
