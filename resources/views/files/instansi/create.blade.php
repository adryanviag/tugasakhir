@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Instansi</h1>
    </div>
    <form method="post" action="/instansi">
        @csrf
        <div class="row">
            <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('kode') }}" name="kode" type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="01">
                        <label for="kode">Kode</label>
                        @error('kode')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="kdunit" aria-label="Default select example">
                            <option disabled selected>== UNIT ==</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                            @endforeach
                        </select>
                        @error('kdunit')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('instansi') }}" name="instansi" type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" placeholder="01">
                        <label for="instansi">Instansi</label>
                        @error('instansi')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('kontak') }}" name="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" placeholder="01">
                        <label for="kontak">kontak</label>
                        @error('kontak')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('alamat') }}" name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="01">
                        <label for="alamat">alamat</label>
                        @error('alamat')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input autofocus value="{{ old('kota') }}" name="kota" type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" placeholder="01">
                        <label for="kota">kota</label>
                        @error('kota')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating mb-3">
                    <input value="{{ old('kodepos') }}" name="kodepos" type="text" class="form-control @error('kodepos') is-invalid @enderror" id="kodepos" placeholder="0">
                    <label for="kodepos">Kode Pos</label>
                    @error('kodepos')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input value="{{ old('telpon') }}" name="telpon" type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon" placeholder="0">
                    <label for="telpon">Telpon</label>
                    @error('telpon')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input value="{{ old('fax') }}" name="fax" type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" placeholder="0">
                    <label for="fax">Fax</label>
                    @error('fax')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input value="{{ old('email') }}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="0">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input value="{{ old('web') }}" name="web" type="text" class="form-control @error('web') is-invalid @enderror" id="web" placeholder="0">
                    <label for="web">Web</label>
                    @error('web')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/instansi" class="btn btn-danger">Batal</a>
    </form>
@endsection
