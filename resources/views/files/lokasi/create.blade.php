@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah Lokasi</h1>
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
                            <h3 class="card-title">Form Tambah Lokasi</h3>
                        </div>
                        <form method="post" action="/lokasi">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="KdLokasi">Kode</label>
                                        <input autofocus value="{{ old('KdLokasi') }}" name="KdLokasi" type="text"
                                            class="form-control @error('KdLokasi') is-invalid @enderror" id="KdLokasi"
                                            placeholder="Masukkan Kode . .">
                                        @error('KdLokasi')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="KdUnit">Unit</label>
                                        <select class="custom-select form-control-border" name="KdUnit" aria-label="Default select example">
                                            <option disabled selected>== UNIT ==</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="Desk">Deskripsi</label>
                                        <input value="{{ old('Desk') }}" name="Desk" type="text"
                                        class="form-control @error('Desk') is-invalid @enderror" id="Desk" placeholder="Masukkan Deskripsi . .">
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
                                <a href="/lokasi" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
