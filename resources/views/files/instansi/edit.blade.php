@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Instansi</h1>
    </div>
        <form method="post" action="/instansi/{{ $data->kode }}">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input autofocus disabled value="{{ old('kode', $data->kode) }}" name="kode" type="text" class="form-control @error('kode')
                            is-invalid
                        @enderror" id="kode" placeholder="01">
                        <label for="kode">Kode</label>
                        @error('kode')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="instansi" value="{{ old('instansi', $data->instansi) }}" type="text" class="form-control @error('instansi')
                        is-invalid
                        @enderror" id="instansi" placeholder="name@example.com">
                        <label for="instansi">Instansi</label>
                        @error('instansi')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="kdunit" aria-label="Default select example">
                            @foreach($units as $unit)
                                <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }} value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                            @endforeach
                        </select>
                        @error('kdunit')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kontak" value="{{ old('kontak', $data->kontak) }}" type="text" class="form-control @error('kontak')
                        is-invalid
                        @enderror" id="kontak" placeholder="0">
                        <label for="kontak">Kontak</label>
                        @error('kontak')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="alamat" value="{{ old('alamat', $data->alamat) }}" type="text" class="form-control @error('alamat')
                        is-invalid
                        @enderror" id="alamat" placeholder="0">
                        <label for="alamat">Alamat</label>
                        @error('alamat')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="kota" value="{{ old('kota', $data->kota) }}" type="text" class="form-control @error('kota')
                        is-invalid
                        @enderror" id="kota" placeholder="0">
                        <label for="kota">Kota</label>
                        @error('kota')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <input value="{{ old('kode', $data->kodepos) }}" name="kodepos" type="text" class="form-control @error('kodepos')
                            is-invalid
                        @enderror" id="kodepos" placeholder="01">
                        <label for="kodepos">Kode Pos</label>
                        @error('kodepos')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="telpon" value="{{ old('telpon', $data->telpon) }}" type="text" class="form-control @error('telpon')
                        is-invalid
                        @enderror" id="telpon" placeholder="name@example.com">
                        <label for="telpon">Telpon</label>
                        @error('telpon')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="fax" value="{{ old('fax', $data->fax) }}" type="text" class="form-control @error('fax')
                        is-invalid
                        @enderror" id="fax" placeholder="0">
                        <label for="fax">Fax</label>
                        @error('fax')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" value="{{ old('email', $data->email) }}" type="text" class="form-control @error('email')
                        is-invalid
                        @enderror" id="email" placeholder="0">
                        <label for="email">email</label>
                        @error('email')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input name="web" value="{{ old('web', $data->web) }}" type="text" class="form-control @error('web')
                        is-invalid
                        @enderror" id="web" placeholder="0">
                        <label for="web">web</label>
                        @error('web')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/instansi" class="btn btn-danger">Batal</a>
        </form>
@endsection
