@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Detail Klasifikasi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $data->Kode }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl>
                                <div class="row">
                                    <div class="col-6">
                                        <dt>Nama Klasifikasi</dt>
                                        <dd>{{ $data->Klas }}</dd>
                                        <dt>Masa Aktif</dt>
                                        <dd>{{ $data->Aktif }}</dd>
                                        <dt>Masa InAktif</dt>
                                        <dd>{{ $data->InAktif }}</dd>
                                    </div>
                                </div>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="/klasifikasi" class="btn float-right btn-primary">
                                Kembali
                            </a>
                            <a href="/klasifikasi/{{ $data->Kode }}/ubah" class="btn btn-warning text-white">
                                Edit
                            </a>
                            <form action="/klasifikasi/{{ $data->Kode }}" class="d-inline" method="post">
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
