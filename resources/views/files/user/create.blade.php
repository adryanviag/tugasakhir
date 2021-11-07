@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah User</h1>
    </div>
    <div class="col-md-4">
        <form method="post" action="/user">
            @csrf
            <div class="form-floating mb-3">
                <input autofocus value="{{ old('username') }}" name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="01">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="pass" type="password" class="form-control @error('pass') is-invalid @enderror" id="pass" placeholder="name@example.com">
                <label for="pass">Password</label>
                @error('pass')
                <div class="invalid-feedback mb-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <select class="form-control" name="unit_id" id="unit_id">
                    <option selected disabled>== UNIT ==</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="prev">Privilege</label>
                    <select class="form-control" name="prev" id="prev">
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/user" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
