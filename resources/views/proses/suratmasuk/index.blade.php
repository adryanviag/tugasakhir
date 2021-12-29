@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Surat Masuk</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="/suratmasuk/tambah" type="button" class="btn btn-primary mb-2">Tambah Surat Masuk</a>
                    @if (count($data) < 1)
                        <div class="alert alert-warning">
                            <strong>Tidak ada surat masuk!</strong>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('success') }}
                            </div>
                        @endif
                    @else
                        <div id="hideFilterBtn" class="btn btn-warning mb-2">Filter</div>
                        <div style="display: @if (request()->from && request()->to) block @endif none" id="menuFilter" class="border p-2 m-2">
                            <form action="/suratmasuk" method="GET">
                                {{-- <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="filterInstansi">Instansi</label>
                                        <select class="form-control" name="filterInstansi" id="instansi">
                                            <option selected disabled>SELECT</option>
                                            @foreach ($data_instansi as $instansi)
                                                <option @if (request()->filterInstansi == $instansi->instansi) selected @endif value="{{ $instansi->instansi }}">
                                                    {{ $instansi->instansi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="filterNoAgenda">NoAgenda</label>
                                        <input @if (request()->filterNoAgenda) value="{{ request()->filterNoAgenda }}" @endif name="filterNoAgenda" type="text"
                                            class="form-control">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="from">Dari</label>
                                        <input required class="form-control" type="date" name="from" id="from">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="to">Ke</label>
                                        <input required class="form-control" type="date" name="to" id="to">
                                    </div>
                                </div>
                                <input class="btn btn-primary mt-2" type="submit" value="FILTER">
                                <a href="/suratmasuk" class="btn btn-secondary mt-2">CLEAR</a>
                            </form>
                            @if (request()->from || request()->to)
                                <form action="/export/suratmasuk" method="GET">
                                    <input hidden type="date" name="from" id="from" value="{{ request()->from }}">
                                    <input hidden type="date" name="to" id="to" value="{{ request()->to }}">
                                    <input type="submit" value="  EXPORT TO CSV  " class="btn btn-success mt-2">
                                </form>
                            @else
                                <form action="/export/suratmasuk" method="GET">
                                    <input type="submit" value="  EXPORT TO CSV  " class="btn btn-success mt-2">
                                </form>
                            @endif
                        </div>
                        <div class="card">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">List Surat Masuk</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No Agenda</th>
                                            <th scope="col">Pengirim</th>
                                            <th scope="col">Tgl Diterima</th>
                                            <th scope="col">Sifat Surat</th>
                                            <th scope="col">Status Surat</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Kode File</th>
                                            <th scope="col">Tgl Surat</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Prihal</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->NoAgenda }}</td>
                                                <td>{{ $d->Pengirim }}</td>
                                                <td>{{ $d->TglDiterima }}</td>
                                                <td>{{ $d->SifatSurat === '01' ? 'Biasa' : 'Tidak Biasa' }}</td>
                                                <td>
                                                    {{ $d->StatusSurat === '01' ? 'Disimpan' : '' }}
                                                    {{ $d->StatusSurat === '02' ? 'Diproses' : '' }}
                                                    {{ $d->StatusSurat === '03' ? 'Diteruskan' : '' }}
                                                    {{ $d->StatusSurat === '04' ? 'Dipinjam' : '' }}
                                                    {{ $d->StatusSurat === '05' ? 'Hilang' : '' }}
                                                </td>
                                                <td>{{ $d->Desk }}</td>
                                                <td><a href="/storage/{{ $d->LokasiMedia }}">FILE</a></td>
                                                <td>{{ $d->TglSurat }}</td>
                                                <td>{{ $d->NoSurat }}</td>
                                                <td><a style="color: rgb(54, 110, 54);"
                                                        href="/suratmasuk/{{ $d->NoAgenda }}/disposisi">
                                                        {{ $d->IsiRingkas }}
                                                    </a></td>
                                                <td>
                                                    <a href="/suratmasuk/{{ $d->NoAgenda }}/ubah"
                                                        class="btn btn-warning btn-sm">
                                                        EDIT
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="/suratmasuk/{{ $d->NoAgenda }}" class="d-inline"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm('Yakin ingin menghapus?')"
                                                            type="submit" class="btn btn-danger btn-sm">
                                                            DELETE
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        var hideFilterBtn = document.getElementById('hideFilterBtn');

        hideFilterBtn.onclick = function() {
            var menuFilter = document.getElementById('menuFilter');
            if (menuFilter.style.display !== 'none') {
                menuFilter.style.display = 'none';
            } else {
                menuFilter.style.display = 'block';
            }
        }
    </script>
@endsection
