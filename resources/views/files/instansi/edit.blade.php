@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit Instansi</h1>
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
                            <h3 class="card-title">Form Edit Instansi</h3>
                        </div>
                        <form method="post" action="/instansi/{{ $data->kode }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="kode">Kode</label>
                                        <input autofocus disabled value="{{ old('kode', $data->kode) }}" name="kode"
                                            type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                                            placeholder="01">
                                        @error('kode')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="kdunit">Unit</label>
                                        <select disabled class="custom-select form-control-border" name="kdunit"
                                            aria-label="Default select example">
                                            @foreach ($units as $unit)
                                                <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }}
                                                    value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
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
                                        <input name="instansi" value="{{ old('instansi', $data->instansi) }}" type="text"
                                            class="form-control @error('instansi')
                                        is-invalid
                                        @enderror"
                                            id="instansi" placeholder="name@example.com">
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
                                        <input name="kontak" value="{{ old('kontak', $data->kontak) }}" type="text"
                                            class="form-control @error('kontak')
                                        is-invalid
                                        @enderror"
                                            id="kontak" placeholder="0">
                                        @error('kontak')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mt-2 mt-md-0">
                                        <label for="alamat">Alamat</label>
                                        <input name="alamat" value="{{ old('alamat', $data->alamat) }}" type="text"
                                            class="form-control @error('alamat')
                                        is-invalid
                                        @enderror"
                                            id="alamat" placeholder="0">
                                        @error('alamat')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-3 mt-2 mt-md-0">
                                        <label for="kota">Kota</label>
                                        <input name="kota" value="{{ old('kota', $data->kota) }}" type="text"
                                            class="form-control @error('kota')
                                        is-invalid
                                        @enderror"
                                            id="kota" placeholder="0">
                                        @error('kota')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="kodepos">Kode Pos</label>
                                        <input value="{{ old('kode', $data->kodepos) }}" name="kodepos" type="text"
                                            class="form-control @error('kodepos')
                                            is-invalid
                                        @enderror"
                                            id="kodepos" placeholder="01">
                                        @error('kodepos')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="telpon">Telpon</label>
                                        <input name="telpon" value="{{ old('telpon', $data->telpon) }}" type="text"
                                            class="form-control @error('telpon')
                                        is-invalid
                                        @enderror"
                                            id="telpon" placeholder="name@example.com">
                                        @error('telpon')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 col-md-4 mt-2">
                                        <label for="fax">Fax</label>
                                        <div class="form-floating mb-3">
                                            <input name="fax" value="{{ old('fax', $data->fax) }}" type="text"
                                                class="form-control @error('fax')
                                                is-invalid
                                                @enderror"
                                                id="fax" placeholder="0">
                                            @error('fax')
                                                <div class="invalid-feedback mb-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-2">
                                        <label for="email">Email</label>
                                        <input name="email" value="{{ old('email', $data->email) }}" type="text"
                                            class="form-control @error('email')
                                        is-invalid
                                        @enderror"
                                            id="email" placeholder="0">
                                        @error('email')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mt-2">
                                        <label for="web">Web</label>
                                        <input name="web" value="{{ old('web', $data->web) }}" type="text"
                                            class="form-control @error('web')
                                        is-invalid
                                        @enderror"
                                            id="web" placeholder="0">
                                        @error('web')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="/instansi" class="btn btn-danger float-right">Batal</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
