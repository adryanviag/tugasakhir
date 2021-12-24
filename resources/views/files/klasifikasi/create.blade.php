@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah Klasifikasi</h1>
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
                            <h3 class="card-title">Form Tambah Klasifikasi</h3>
                        </div>
                        <form name="add-classification" id="add-classification" method="post" action="/klasifikasi">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="Kode">Kode</label>
                                        <input autofocus value="{{ old('Kode') }}" name="Kode" type="text"
                                            class="form-control @error('Kode') is-invalid @enderror" id="Kode"
                                            placeholder="Masukkan Kode . .">
                                        @error('Kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 mt-md-0 col-md-6">
                                        <label for="Klas">Klasifikasi</label>
                                        <input name="Klas" value="{{ old('Klas') }}" type="text"
                                            class="form-control @error('Klas') is-invalid @enderror" id="Klas"
                                            placeholder="Masukkan Klasifikasi . .">
                                        @error('Klas')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="Aktif">Aktif</label>
                                        <input name="Aktif" value="{{ old('Aktif') }}" type="text"
                                            class="form-control @error('Aktif') is-invalid @enderror" id="Aktif"
                                            placeholder="Masukkan . .">
                                        @error('Aktif')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="InAktif">InAktif</label>
                                        <input name="InAktif" value="{{ old('InAktif') }}" type="text"
                                            class="form-control @error('InAktif') is-invalid @enderror" id="InAktif"
                                            placeholder="Masukkan . .">
                                        @error('InAktif')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="TindakLanjut">Tindak Lanjut</label>
                                        <input name="TindakLanjut" value="{{ old('TindakLanjut') }}" type="text"
                                            class="form-control @error('TindakLanjut') is-invalid @enderror"
                                            id="TindakLanjut" placeholder="Masukkan Tindak Lanjut . .">
                                        @error('TindakLanjut')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/klasifikasi" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>











    <div class="col-md-4">
        <div class="form-floating mb-3">

        </div>
        <div class="form-floating mb-3">

        </div>

        </form>
    </div>
@endsection
