@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Ubah Surat Masuk</h1>
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
                            <h3 class="card-title">Form Ubah Surat Masuk</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="/suratmasuk/{{ $data->NoAgenda }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="NoAgenda">Nomor Agenda</label>
                                        <input autofocus value="{{ old('NoAgenda') ? old('NoAgenda') : $data->NoAgenda }}"
                                            name="NoAgenda" type="text"
                                            class="form-control @error('NoAgenda') is-invalid @enderror" id="NoAgenda"
                                            placeholder="Masukkan Nomor Agenda">
                                        @error('NoAgenda')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-2" for="TglDiterima">Tanggal Diterima</label>
                                        <input value="{{ old('TglDiterima') ? old('TglDiterima') : $data->TglDiterima }}"
                                            name="TglDiterima" type="date" class="form-control">
                                        <p class="text-danger my-2">
                                            @error('TglDiterima')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <label for="SifatSurat" class="form-label">Sifat Surat</label>
                                        <select class="custom-select form-control-border" name="SifatSurat"
                                            aria-label="Default select example">
                                            <option value="01">Biasa</option>
                                            <option value="02">Tidak Biasa</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="StatusSurat" class="form-label">Status Surat</label>
                                        <select class="form-control-border custom-select" name="StatusSurat"
                                            aria-label="Default select example">
                                            <option value="01">Disimpan</option>
                                            <option value="02">Diproses</option>
                                            <option value="03">Diteruskan</option>
                                            <option value="04">Dipinjam</option>
                                            <option value="05">Hilang</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="Pengirim" class="form-label">Pengirim</label>
                                        <select class="custom-select form-control-border" name="Pengirim"
                                            aria-label="Default select example">
                                            @foreach ($data_instansi as $i)
                                                <option value="{{ $i->instansi }}">{{ $i->instansi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="NoSurat">Nomor Surat</label>
                                        <input value="{{ old('NoSurat') ? old('NoSurat') : $data->NoSurat }}"
                                            name="NoSurat" type="text"
                                            class="form-control @error('NoSurat') is-invalid @enderror" id="NoSurat"
                                            placeholder="Masukkan Nomor Surat">
                                        @error('NoSurat')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2 col-md-6">
                                        <label for="IsiRingkas">Prihal</label>
                                        <input autofocus
                                            value="{{ old('IsiRingkas') ? old('IsiRingkas') : $data->IsiRingkas }}"
                                            name="IsiRingkas" type="text"
                                            class="form-control @error('IsiRingkas') is-invalid @enderror" id="IsiRingkas"
                                            placeholder="Masukkan Perihal">
                                        @error('IsiRingkas')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label class="mb-2" for="TglHrsSelesai">Tanggal Harus Selesai</label>
                                        <input
                                            value="{{ old('TglHrsSelesai') ? old('TglHrsSelesai') : $data->TglHrsSelesai }}"
                                            name="TglHrsSelesai" type="date" class="form-control">
                                        <p class="text-danger my-2">
                                            @error('TglHrsSelesai')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-6 mt-md-0 mt-2">
                                        <label for="Catatan">Catatan</label>
                                        <input autofocus value="{{ old('Catatan') ? old('Catatan') : $data->Catatan }}"
                                            name="Catatan" type="text"
                                            class="form-control @error('Catatan') is-invalid @enderror" id="Catatan"
                                            placeholder="Masukkan Catatan">
                                        @error('Catatan')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="LokasiMedi">Lokasi Media</label>
                                        <div class="custom-file">
                                            <label for="LokasiMedia" class="custom-file-label">Dokumen Digital (pdf)</label>
                                            <input name="LokasiMedia"
                                                value="{{ old('LokasiMedia') ? old('LokasiMedia') : $data->LokasiMedia }}"
                                                class="custom-file-input @error('LokasiMedia') is-invalid @enderror"
                                                type="file" id="LokasiMedia">
                                        </div>
                                        @error('LokasiMedia')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label for="Lokasi" class="form-label">Lokasi</label>
                                        <select class="mb-2 form-control-border custom-select" name="Lokasi"
                                            aria-label="Default select example">
                                            @foreach ($data_lokasi as $l)
                                                <option value="{{ $l->KdLokasi }}">{{ $l->Desk }}</option>
                                            @endforeach
                                        </select>
                                        @error('Lokasi')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label for="Klas" class="form-label">Klasifikasi</label>
                                        <select class="mb-2 form-control-border custom-select" name="Klas"
                                            aria-label="Default select example">
                                            @foreach ($data_klas as $k)
                                                <option value="{{ $k->Kode }}">{{ $k->Klas }}</option>
                                            @endforeach
                                        </select>
                                        @error('Klas')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="mb-2" for="TglSurat">Tanggal Surat</label>
                                        <input value="{{ old('TglSurat') ? old('TglSurat') : $data->TglSurat }}"
                                            name="TglSurat" type="date" class="form-control">
                                        <p class="text-danger my-2">
                                            @error('TglSurat')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <label for="Lamp">Lampiran</label>
                                        <input autofocus value="{{ old('Lamp') ? old('Lamp') : $data->Lamp }}"
                                            name="Lamp" type="text" class="form-control @error('Lamp') is-invalid @enderror"
                                            id="Lamp" placeholder="Masukkan Lampiran">
                                        @error('Lamp')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/suratmasuk" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection