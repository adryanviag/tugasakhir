@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Disposisi</h1>
                </div>
            </div>
            @if ($errors->any())
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Lembaran Disposisi</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="/terimadisposisi/disposisi">
                            @csrf
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Surat Masuk</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="NoAgendaSurat">Nomor Agenda</label>
                                            <input autofocus value="{{ $data->NoAgenda }}" name="NoAgendaSurat"
                                                readonly="readonly" type="text" class="form-control" id="NoAgendaSurat"
                                                placeholder="01">
                                        </div>
                                        <div class="col-6">
                                            <label class="mb-2" for="TglDiterima">Tanggal Diterima</label>
                                            <input name="TglDiterima" readonly="readonly" value="{{ $data->TglDiterima }}"
                                                type="text" class="form-control">
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="mb-2" for="TglSurat">Tanggal Surat</label>
                                            <input value="{{ $data->TglSurat }}" readonly="readonly" name="TglSurat"
                                                type="text" class="form-control">
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label for="NoSurat">Nomor Surat</label>
                                            <input readonly="readonly" value="{{ $data->NoSurat }}" name="NoSurat"
                                                type="text" class="form-control @error('NoSurat') is-invalid @enderror"
                                                id="NoSurat" placeholder="01">
                                        </div>
                                        <div class="col-12 mt-2 col-md-6">
                                            <label for="Pengirim" class="form-label">Pengirim</label>
                                            <select readonly="readonly" class="custom-select form-control-border mb-2"
                                                name="Pengirim" aria-label="Default select example">
                                                <option value="{{ $data->Pengirim }}">{{ $data->Pengirim }}</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <label for="IsiRingkas">Prihal</label>
                                            <input readonly="readonly" value="{{ $data->IsiRingkas }}" name="IsiRingkas"
                                                type="text" class="form-control" id="IsiRingkas" placeholder="01">
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <label>File Digital</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <a href="/storage/{{ $data->LokasiMedia }}"
                                                        class="btn btn-success">File</a>
                                                </div>
                                                <input type="text" disabled value="<- Open File" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label for="SifatSurat" class="form-label">Sifat Surat</label>
                                            <select class="form-control-border custom-select mb-2" readonly="readonly"
                                                name="SifatSurat" aria-label="Default select example">
                                                @if ($data->SifatSurat == '01') <option value="01">Biasa</option> @endif
                                                @if ($data->SifatSurat == '02') <option value="01">Tidak Biasa</option> @endif
                                            </select>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label class="mb-2" for="TglHrsSelesai">Tanggal Harus Selesai</label>
                                            <input value="{{ $data->TglHrsSelesai }}" readonly="readonly"
                                                name="TglHrsSelesai" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Didisposisikan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="Pengirim" class="-label">Oleh</label>
                                            <select " class="      form-control-border custom-select mb-2" name="Pengirim"
                                                aria-label="Default select example">
                                                <option readonly="readonly" value="{{ auth()->user()->unit->Kode }}">
                                                    {{ auth()->user()->unit->Desk }}</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="Isi">Isi Disposisi</label>
                                            <input value="Supaya Diproses" name="Isi" readonly="readonly" type="text"
                                                class="form-control" id="Isi" placeholder="Isi Catatan">
                                        </div>
                                        <div class="col-12 mt-2 col-md-6">
                                            <label for="Catatan2">Catatan</label>
                                            <input value="" readonly name="Catatan2" type="text" class="form-control"
                                                id="Catatan2" placeholder="Isi Catatan">
                                        </div>
                                        <div class="col-12 mt-2 col-md-6">
                                            <label class="mb-2" for="TglDisposisi">Tanggal</label>
                                            <input value="<?php echo date('Y-m-d'); ?>" name="TglDisposisi" readonly="readonly"
                                                type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Tindakan Yang Dilakukan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label for="Status" class="form-label">Jenis Tindakan</label>
                                            <select id="sm_select" class="form-control-border custom-select mb-2"
                                                name="Status" aria-label="Default select example">
                                                <option value="Belum Dikerjakan">Belum Dikerjakan</option>
                                                <option value="Berlangsung">Berlangsung</option>
                                                <option value="Didisposisikan">Didisposisikan</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="Penerima" class="form-label">Kepada</label>
                                            <select id="Penerima" class="form-control-border custom-select mb-2"
                                                name="Penerima" aria-label="Default select example">
                                                @foreach ($data_unit as $data)
                                                    <option value="{{ $data->Kode }}">{{ $data->Desk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="Isi" class="form-label">Isi Disposisi</label>
                                            <select id="IsiDisposisi" class="form-control-border custom-select mb-2"
                                                name="Isi" aria-label="Default select example">
                                                @foreach ($data_isi as $data)
                                                    <option value="{{ $data->Kode }}">{{ $data->Isi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="Catatan">Catatan</label>
                                            <input id="Catatan" name="Catatan" type="text" class="form-control mb-2"
                                                id="Catatan" placeholder="Catatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
