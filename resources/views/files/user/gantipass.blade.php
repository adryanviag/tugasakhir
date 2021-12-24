@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Ganti Password</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Form Ganti Password</h3>
                        </div>
                        <form method="post" action="/ganti-pass/{{ auth()->user()->username }}">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="old_pass">Password Lama</label>
                                        <input name="old_pass" type="password"
                                            class="form-control @error('old_pass') is-invalid @enderror" id="old_pass"
                                            placeholder="Masukkan Password Lama . .">
                                        @error('old_pass')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="pass">Password Baru</label>
                                        <input name="pass" type="password"
                                            class="form-control @error('pass') is-invalid @enderror" id="pass"
                                            placeholder="Masukkan Password Baru . .">
                                        @error('pass')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="confirmed_pass">Konfirmasi Password Baru</label>
                                        <input name="confirmed_pass" type="password"
                                            class="form-control @error('confirmed_pass') is-invalid @enderror"
                                            id="confirmed_pass" placeholder="Konfirmasi Password Baru . .">
                                        @error('confirmed_pass')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Ganti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
