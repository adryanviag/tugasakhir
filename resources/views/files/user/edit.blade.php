@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
    <div class="col-md-4">
        <form method="post" action="/user/{{ $data->username }}">
            @method('put')
            @csrf
            <div class="form-floating mb-3">
                <input value="{{ old('username', $data->username) }}" autofocus name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="01">
                <label for="username">Username</label>
            </div>
            <div class="form-group mb-3">
                <label for="unit">Unit</label>
                    <select class="form-control" name="unit_id" id="unit_id">
                        @foreach ($units as $unit)
                            <option {{ $data->unit->Kode === $unit->Kode ? 'selected' : '' }} value="{{ $unit->Kode }}">{{ $unit->Nama }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group mb-3">
                <label for="prev">Privilege</label>
                    <select class="form-control" name="prev" id="prev">
                        <option {{ $data->prev === 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                        <option {{ $data->prev === 'operator' ? 'selected' : '' }} value="operator">Operator</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/user" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
