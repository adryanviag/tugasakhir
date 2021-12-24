@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit Klasifikasi</h1>
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
                            <h3 class="card-title">Form Edit Klasifikasi</h3>
                        </div>
                        <form name="add-classification" id="add-classification" method="post"
                            action="/klasifikasi/{{ $data->Kode }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="Kode">Kode</label>
                                        <input autofocus disabled value="{{ old('Kode', $data->Kode) }}" name="Kode"
                                            type="text" class="form-control @error('Kode') is-invalid @enderror" id="Kode"
                                            placeholder="01">
                                        @error('Kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 mt-md-0 col-md-6">
                                        <label for="Klas">Klasifikasi</label>
                                        <input name="Klas" value="{{ old('Klas', $data->Klas) }}" type="text"
                                            class="form-control @error('Klas') is-invalid @enderror" id="Klas"
                                            placeholder="name@example.com">
                                        @error('Klas')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="Aktif">Aktif</label>
                                        <input name="Aktif" value="{{ old('Aktif', $data->Aktif) }}" type="text"
                                            class="form-control @error('Aktif') is-invalid @enderror" id="Aktif"
                                            placeholder="0">
                                        @error('Aktif')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="InAktif">InAktif</label>
                                        <input name="InAktif" value="{{ old('InAktif', $data->InAktif) }}" type="text"
                                            class="form-control @error('InAktif') is-invalid @enderror" id="InAktif"
                                            placeholder="0">
                                        @error('InAktif')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="TindakLanjut">Tindak Lanjut</label>
                                        <input name="TindakLanjut" value="{{ old('TindakLanjut', $data->TindakLanjut) }}"
                                            type="text" class="form-control @error('TindakLanjut') is-invalid @enderror"
                                            id="TindakLanjut" placeholder="0">
                                        @error('TindakLanjut')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/klasifikasi" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
