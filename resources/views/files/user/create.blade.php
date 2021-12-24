@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Tambah User</h1>
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
                            <h3 class="card-title">Form Tambah User</h3>
                        </div>
                        <form method="post" action="/user">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="username">Username</label>
                                        <input autofocus value="{{ old('username') }}" name="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            placeholder="Masukkan Username . .">
                                        @error('username')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="pass">Password</label>
                                        <input name="pass" type="password"
                                            class="form-control @error('pass') is-invalid @enderror" id="pass"
                                            placeholder="Masukkan Password . .">
                                        @error('pass')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="unit_id">Unit</label>
                                        <select class="custom-select form-control-border" name="unit_id" id="unit_id">
                                            <option selected disabled>== UNIT ==</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="prev">Privilege</label>
                                        <select class="custom-select form-control-border" name="prev" id="prev">
                                            <option value="admin">Admin</option>
                                            <option value="operator">Operator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="/user" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="col-md-4">
        <form method="post" action="/user">
            @csrf
            <div class="form-floating mb-3">

            </div>
            <div class="form-floating mb-3">

            </div>
            <div class="form-group mb-3">

            </div>
            <div class="form-group mb-3">

            </div>

        </form>
    </div>
@endsection
