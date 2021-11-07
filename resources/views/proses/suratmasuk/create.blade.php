@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Surat Masuk</h1>
</div>

<form method="post" enctype="multipart/form-data" action="/suratmasuk">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('NoAgenda') }}" name="NoAgenda" type="text" class="form-control @error('NoAgenda') is-invalid @enderror" id="NoAgenda" placeholder="01">
                <label for="NoAgenda">Nomor Agenda</label>
                @error('NoAgenda')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 form-control">
                <label class="mb-2" for="TglDiterima">Tanggal Diterima</label>
                <input name="TglDiterima" type="date" class="form-control">
                <p class="text-danger my-2">
                    @error('TglDiterima')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-3 form-control">
                <label for="SifatSurat" class="form-label">Sifat Surat</label>
                <select class="form-select mb-2" name="SifatSurat" aria-label="Default select example">
                    <option value="01">Biasa</option>
                    <option value="02">Tidak Biasa</option>
                </select>
            </div>
            <div class="mb-3 form-control">
                <label for="StatusSurat" class="form-label">Status Surat</label>
                <select class="form-select mb-2" name="StatusSurat" aria-label="Default select example">
                    <option value="01">Disimpan</option>
                    <option value="02">Diproses</option>
                    <option value="03">Diteruskan</option>
                    <option value="04">Dipinjam</option>
                    <option value="05">Hilang</option>
                </select>
            </div>
            <div class="mb-3 form-control">
                <label for="Pengirim" class="form-label">Pengirim</label>
                <select class="form-select mb-2" name="Pengirim" aria-label="Default select example">
                    @foreach ($data_instansi as $data)
                        <option value="{{ $data->instansi }}">{{ $data->instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('NoSurat') }}" name="NoSurat" type="text" class="form-control @error('NoSurat') is-invalid @enderror" id="NoSurat" placeholder="01">
                <label for="NoSurat">Nomor Surat</label>
                @error('NoSurat')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('IsiRingkas') }}" name="IsiRingkas" type="text" class="form-control @error('IsiRingkas') is-invalid @enderror" id="IsiRingkas" placeholder="01">
                <label for="IsiRingkas">Prihal</label>
                @error('IsiRingkas')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 form-control">
                <label class="mb-2" for="TglHrsSelesai">Tanggal Harus Selesai</label>
                <input name="TglHrsSelesai" type="date" class="form-control">
                <p class="text-danger my-2">
                    @error('TglHrsSelesai')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('Catatan') }}" name="Catatan" type="text" class="form-control @error('Catatan') is-invalid @enderror" id="Catatan" placeholder="01">
                <label for="Catatan">Catatan</label>
                @error('Catatan')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3 form-control">
                <label for="LokasiMedia" class="form-label">Dokumen Digital (pdf)</label>
                <input name="LokasiMedia" class="form-control @error('LokasiMedia') is-invalid @enderror" type="file" id="LokasiMedia">
                @error('LokasiMedia')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-3 form-control">
                <label for="Lokasi" class="form-label">Lokasi</label>
                <select class="mb-2 form-select" name="Lokasi" aria-label="Default select example">
                @foreach ($data_lokasi as $data)
                    <option value="{{ $data->KdLokasi }}">{{ $data->Desk }}</option>
                @endforeach
                </select>
                @error('Lokasi')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-control">
                <label for="Klas" class="form-label">Klasifikasi</label>
                <select class="mb-2 form-select" name="Klas" aria-label="Default select example">
                @foreach ($data_klas as $data)
                    <option value="{{ $data->Kode }}">{{ $data->Klas }}</option>
                @endforeach
                </select>
                @error('Klas')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3 form-control">
                <label class="mb-2" for="TglSurat">Tanggal Surat</label>
                <input name="TglSurat" type="date" class="form-control">
                <p class="text-danger my-2">
                    @error('TglSurat')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('Lamp') }}" name="Lamp" type="text" class="form-control @error('Lamp') is-invalid @enderror" id="Lamp" placeholder="01">
                <label for="Lamp">Lampiran</label>
                @error('Lamp')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/suratmasuk" class="btn btn-danger">Batal</a>
</form>

@endsection
