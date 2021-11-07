@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Isi Disposisi</h1>
</div>
<div class="col-md-4">
    <form name="add-classification" id="add-classification" method="post" action="/isidisposisi/{{ $data->Kode }}">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input disabled value="{{ old('Kode', $data->Kode) }}" autofocus name="Kode" type="text" class="form-control @error('Kode') is-invalid @enderror" id="Kode" placeholder="01">
            <label for="Kode">Kode</label>
        </div>
        <div class="form-floating mb-3">
            <input value="{{ old('Isi', $data->Isi) }}" name="Isi" type="text" class="form-control @error('Isi') is-invalid @enderror" id="Isi" placeholder="name@example.com">
            <label for="Isi">Isi</label>
            @error('Isi')
            <div class="invalid-feedback mb-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/isidisposisi" class="btn btn-danger">Batal</a>
    </form>
</div>

@endsection
