@extends('layouts.main')

@section('container')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Detail Lokasi</h1>
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
                                {{ $data->KdLokasi }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl>
                                <div class="row">
                                    <div class="col-6">
                                        <dt>Deskripsi</dt>
                                        <dd>{{ $data->Desk }}</dd>
                                    </div>
                                </div>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="/lokasi" class="btn float-right btn-primary">
                                Kembali
                            </a>
                            <a href="/lokasi/{{ $data->KdLokasi }}/ubah" class="btn btn-warning text-white">
                                Edit
                            </a>
                            <form action="/lokasi/{{ $data->KdLokasi }}" class="d-inline" method="post">
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
