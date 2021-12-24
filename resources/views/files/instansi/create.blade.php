@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah Instansi</h1>
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
                            <h3 class="card-title">Form Tambah Instansi</h3>
                        </div>
                        <form method="post" action="/instansi">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="kode">Kode</label>
                                        <input autofocus value="{{ old('kode') }}" name="kode" type="text"
                                            class="form-control @error('kode') is-invalid @enderror" id="kode"
                                            placeholder="Masukkan Kode">
                                        @error('kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="kdunit">Unit</label>
                                        <select class="custom-select form-control-border" name="kdunit"
                                            aria-label="Default select example">
                                            <option disabled selected>== UNIT ==</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('kdunit')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-2">
                                        <label for="instansi">Instansi</label>
                                        <input autofocus value="{{ old('instansi') }}" name="instansi" type="text"
                                            class="form-control @error('instansi') is-invalid @enderror" id="instansi"
                                            placeholder="Masukkan Instansi . .">
                                        @error('instansi')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3 ">
                                        <label for="kontak">Kontak</label>
                                        <input autofocus value="{{ old('kontak') }}" name="kontak" type="text"
                                            class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                                            placeholder="Masukkan Kontak . .">
                                        @error('kontak')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mt-2 mt-md-0">
                                        <label for="alamat">Alamat</label>
                                        <input autofocus value="{{ old('alamat') }}" name="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                            placeholder="Masukkan Alamat . .">
                                        @error('alamat')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3 mt-2 mt-md-0">
                                        <label for="kota">Kota</label>
                                        <input autofocus value="{{ old('kota') }}" name="kota" type="text"
                                            class="form-control @error('kota') is-invalid @enderror" id="kota"
                                            placeholder="Masukkan Kota . .">
                                        @error('kota')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="kodepos">Kode Pos</label>
                                        <input value="{{ old('kodepos') }}" name="kodepos" type="text"
                                            class="form-control @error('kodepos') is-invalid @enderror" id="kodepos"
                                            placeholder="Masukkan Kode Pos . .">
                                        @error('kodepos')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="telpon">Telpon</label>
                                        <input value="{{ old('telpon') }}" name="telpon" type="text"
                                            class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                                            placeholder="Masukkan Telpon . .">
                                        @error('telpon')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="fax">Fax</label>
                                        <input value="{{ old('fax') }}" name="fax" type="text"
                                            class="form-control @error('fax') is-invalid @enderror" id="fax"
                                            placeholder="Masukkan Fax . .">
                                        @error('fax')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mt-2">
                                        <label for="email">Email</label>
                                        <input value="{{ old('email') }}" name="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Masukkan Email . .">
                                        @error('email')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mt-2">
                                        <label for="web">Web</label>
                                        <input value="{{ old('web') }}" name="web" type="text"
                                            class="form-control @error('web') is-invalid @enderror" id="web"
                                            placeholder="Masukkan Web . .">
                                        @error('web')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/instansi" class="btn btn-danger float-right">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
