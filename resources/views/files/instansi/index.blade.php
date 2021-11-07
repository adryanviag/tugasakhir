@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
        <h1 class="h2">Instansi</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="col-md-12">
            <a href="/instansi/create" type="button" class="btn btn-primary mb-2">Tambah Instansi</a>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable fade show">
                {{ session('success') }}
            </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Kode Pos</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Email</th>
                        <th scope="col">Web</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->kode }}</td>
                            <td>{{ $d->instansi }}</td>
                            <td>{{ $d->unit->Nama }}</td>
                            <td>@if($d->kontak) {{ $d->kontak }} @else - @endif</td>
                            <td>@if($d->alamat) {{ $d->alamat }} @else - @endif</td>
                            <td>@if($d->kota) {{ $d->kota }} @else - @endif</td>
                            <td>@if($d->kodepos) {{ $d->kodepos }} @else - @endif</td>
                            <td>@if($d->telpon) {{ $d->telpon }} @else - @endif</td>
                            <td>@if($d->fax) {{ $d->fax }} @else - @endif</td>
                            <td>@if($d->email) {{ $d->email }} @else - @endif</td>
                            <td>@if($d->web) {{ $d->web }} @else - @endif</td>
                            <td>
                                <a href="/instansi/{{ $d->kode }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                                <a href="/instansi/{{ $d->kode }}/edit"><span class="badge rounded-pill bg-warning"><i
                                            data-feather="edit-2"></i></span></a>
                                <form action="/instansi/{{ $d->kode }}" class="d-inline" method="post">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="badge rounded-pill bg-danger border"><i data-feather="x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
