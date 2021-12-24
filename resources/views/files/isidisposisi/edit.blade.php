@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit Isi Disposisi</h1>
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
                        <form name="add-classification" id="add-classification" method="post"
                            action="/isidisposisi/{{ $data->Kode }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <label for="kode">Kode</label>
                                        <input disabled value="{{ old('Kode', $data->Kode) }}" autofocus name="Kode"
                                            type="text" class="form-control @error('Kode') is-invalid @enderror" id="Kode"
                                            placeholder="01">
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label for="Isi">Isi</label>
                                        <input value="{{ old('Isi', $data->Isi) }}" name="Isi" type="text"
                                            class="form-control @error('Isi') is-invalid @enderror" id="Isi"
                                            placeholder="name@example.com">
                                        @error('Isi')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/isidisposisi" class="float-right btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
