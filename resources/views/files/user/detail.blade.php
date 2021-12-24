@extends('layouts.main')

@section('container')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Detail User</h1>
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
                                {{ $data->username }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl>
                                <div class="row">
                                    <div class="col-6">
                                        <dt>Nama</dt>
                                        <dd>{{ $data->unit->Nama }}</dd>
                                        <dt>Privilige</dt>
                                        <dd>{{ $data->prev }}</dd>
                                    </div>
                                </div>
                            </dl>
                        </div>
                        <div class="card-footer">
                            <a href="/user" class="btn btn-primary">
                                Kembali
                            </a>
                            <a href="/user/{{ $data->username }}/ubah" class="btn btn-warning text-white">
                                Edit
                            </a>
                            <form action="/user/{{ $data->username }}" class="d-inline" method="post">
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
