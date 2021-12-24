@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Edit User</h1>
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
                            <h3 class="card-title">Form Edit User</h3>
                        </div>
                        <form method="post" action="/user/{{ $data->username }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="username">Username</label>
                                        <input value="{{ old('username', $data->username) }}" autofocus name="username"
                                            type="text" class="form-control @error('username') is-invalid @enderror"
                                            id="username" placeholder="01">
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
                                            @foreach ($units as $unit)
                                                <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }}
                                                    value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="prev">Privilege</label>
                                        <select class="form-control-border custom-select" name="prev" id="prev">
                                            <option {{ $data->prev === 'admin' ? 'selected' : '' }} value="admin">Admin
                                            </option>
                                            <option {{ $data->prev === 'operator' ? 'selected' : '' }} value="operator">
                                                Operator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="/user" class="btn float-right btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
