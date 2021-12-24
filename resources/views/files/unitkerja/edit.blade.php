@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit Unit Kerja</h1>
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
                            <h3 class="card-title">Form Edit Unit Kerja</h3>
                        </div>
                        <form name="add-classification" id="add-classification" method="post"
                            action="/unitkerja/{{ $data->Kode }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="Kode">Kode</label>
                                        <input disabled value="{{ old('Kode', $data->Kode) }}" autofocus name="Kode"
                                            type="text" class="form-control @error('Kode') is-invalid @enderror" id="Kode"
                                            placeholder="Masukkan Kode . .">
                                        @error('Kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="Nama">Nama</label>
                                        <input value="{{ old('Nama', $data->Nama) }}" name="Nama" type="text"
                                            class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                                            placeholder="name@example.com">
                                        @error('Nama')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="Desk">Deskripsi</label>
                                        <input value="{{ old('Desk', $data->Desk) }}" name="Desk" type="text"
                                            class="form-control @error('Desk') is-invalid @enderror" id="Desk"
                                            placeholder="name@example.com">
                                        @error('Desk')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/unitkerja" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
