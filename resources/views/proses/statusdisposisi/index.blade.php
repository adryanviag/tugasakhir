@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="h2">Status Disposisi</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (count($data) < 1)
                        <div class="alert alert-warning">
                            <strong>Tidak ada data!</strong>
                        </div>
                    @else
                        <div id="hideFilterBtn" class="btn btn-warning mb-2">REKAP DATA</div>
                        <div style="display: @if (request()->from && request()->to) block @endif none" id="menuFilter" class="border p-2 m-2">
                            <form action="/statusdisposisi" method="GET">
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
                                <a href="/statusdisposisi" class="btn btn-secondary mt-2">CLEAR</a>
                            </form>
                            @if (request()->from || request()->to)
                                <form action="/export/status" method="GET">
                                    <input hidden type="date" name="from" id="from" value="{{ request()->from }}">
                                    <input hidden type="date" name="to" id="to" value="{{ request()->to }}">
                                    <input type="submit" value="  EXPORT TO CSV  " class="btn btn-success mt-2">
                                </form>
                            @else
                                <form action="/export/status" method="GET">
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
                                <h3 class="card-title">List Disposisi Diberikan</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl Disposisi</th>
                                            <th scope="col">No Agenda Surat</th>
                                            <th scope="col">Prihal</th>
                                            <th scope="col">Penerima</th>
                                            <th scope="col">Isi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->TglDisposisi }}</td>
                                                <td>{{ $d->NoAgendaSurat }}</td>
                                                <td>{{ $d->Prihal }}</td>
                                                <td>{{ $d->Penerima }}</td>
                                                <td>{{ $d->Isi }}</td>
                                                <td>
                                                    <a href="/status/{{ $d->NoAgendaSurat }}/disposisi"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                        Lacak
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                @endif
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
