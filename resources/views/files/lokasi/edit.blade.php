@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit Lokasi</h1>
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
                            <h3 class="card-title">Form Edit Lokasi</h3>
                        </div>
                        <form name="add-classification" id="add-classification" method="post"
                            action="/lokasi/{{ $data->KdLokasi }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="KdLokasi">Kode</label>
                                        <input disabled value="{{ old('KdLokasi', $data->KdLokasi) }}" autofocus
                                            name="KdLokasi" type="text"
                                            class="form-control @error('KdLokasi') is-invalid @enderror" id="KdLokasi"
                                            placeholder="01">
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="KdUnit">Unit</label>
                                        <select class="custom-select form-control-border" name="KdUnit"
                                            aria-label="Default select example">
                                            @foreach ($units as $unit)
                                                <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }}
                                                    value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('KdUnit')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3">
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
                                <a href="/lokasi" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
