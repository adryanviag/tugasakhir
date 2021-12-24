@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Detail Instansi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-10">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $data->instansi }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl>
                                <div class="row">
                                    <div class="col-md-4 col-6">
                                        <dt>Unit</dt>
                                        <dd>{{ $data->unit->Nama }}</dd>
                                        <dt>Alamat</dt>
                                        <dd>{{ $data->alamat }}</dd>
                                        <dt>Kota</dt>
                                        <dd>{{ $data->kota ? $data->kota : '-' }}</dd>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <dt>Kode Pos</dt>
                                        <dd>{{ $data->kodepos ? $data->kodepos : '-' }}</dd>
                                        <dt>Telpon</dt>
                                        <dd>{{ $data->telpon ? $data->telpon : '-' }}</dd>
                                        <dt>Fax</dt>
                                        <dd>{{ $data->fax ? $data->fax : '-' }}</dd>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <dt>Kontak</dt>
                                        <dd>{{ $data->kontak ? $data->kontak : '-' }}</dd>
                                        <dt>Email</dt>
                                        <dd>{{ $data->email ? $data->email : '-' }}</dd>
                                        <dt>Web</dt>
                                        <dd>{{ $data->web ? $data->web : '-' }}</dd>
                                    </div>
                                </div>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="/instansi" class="btn float-right btn-primary">
                                Kembali
                            </a>
                            <a href="/instansi/{{ $data->kode }}/ubah" class="btn btn-warning text-white">
                                Edit
                            </a>
                            <form action="/instansi/{{ $data->kode }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin ingin menghapus?')" type="submit"
                                    class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
