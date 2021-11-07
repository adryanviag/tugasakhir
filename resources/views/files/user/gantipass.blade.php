@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Ganti Password</h1>
    </div>
    @if(session()->has('error'))
        <p class="text-danger">{{ session()->get('error') }}</p>
    @endif
    @if(session()->has('success'))
        <p class="text-success">{{ session()->get('success') }}</p>
    @endif
    <div class="col-md-4">

        <form method="post" action="/ganti-pass/{{ auth()->user()->username }}">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input name="old_pass" type="password" class="form-control @error('old_pass') is-invalid @enderror" id="old_pass" placeholder="name@example.com">
                <label for="old_pass">Password Lama</label>
                @error('old_pass')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="pass" type="password" class="form-control @error('pass') is-invalid @enderror" id="pass" placeholder="name@example.com">
                <label for="pass">Password Baru</label>
                @error('pass')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="confirmed_pass" type="password" class="form-control @error('confirmed_pass') is-invalid @enderror" id="confirmed_pass" placeholder="name@example.com">
                <label for="confirmed_pass">Konfirmasi Password Baru</label>
                @error('confirmed_pass')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ganti</button>
        </form>
    </div>
@endsection
