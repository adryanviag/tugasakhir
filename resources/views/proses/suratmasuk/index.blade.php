@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Surat Masuk</h1>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="">
                <a href="/suratmasuk/create" type="button" class="btn btn-primary mb-2">Tambah Surat Masuk</a>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissable fade show">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-hover table-smaller">
            <thead>
                <tr>
                    <th scope="col">No Agenda</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Sifat Surat</th>
                    <th scope="col">Status Surat</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Klasifikasi</th>
                    <th scope="col">Tgl Surat</th>
                    <th scope="col">Tgl Diterima</th>
                    <th scope="col">Tgl Harus Selesai</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Lampiran</th>
                    <th scope="col">Isi Ringkas</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data) < 1)
                <div class="alert alert-warning">
                    <strong>Tidak ada surat masuk!</strong>
                </div>
                @endif
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->NoAgenda }}</td>
                        <td>{{ $d->Pengirim }}</td>
                        <td>{{ $d->SifatSurat === '01' ? 'Biasa' : 'Tidak Biasa' }}</td>
                        <td>
                            {{ $d->StatusSurat === '01' ? 'Disimpan' : '' }}
                            {{ $d->StatusSurat === '02' ? 'Diproses' : '' }}
                            {{ $d->StatusSurat === '03' ? 'Diteruskan' : '' }}
                            {{ $d->StatusSurat === '04' ? 'Dipinjam' : '' }}
                            {{ $d->StatusSurat === '05' ? 'Hilang' : '' }}
                        </td>
                        <td>{{ $d->location->Desk }}</td>
                        <td>{{ $d->classification->Klas }}</td>
                        <td>{{ $d->TglSurat }}</td>
                        <td>{{ $d->TglDiterima }}</td>
                        <td>{{ $d->TglHrsSelesai }}</td>
                        <td>{{ $d->NoSurat }}</td>
                        <td>{{ $d->Lamp }}</td>
                        <td>{{ $d->IsiRingkas }}</td>
                        <td>{{ $d->Catatan }}</td>
                        <td>
                            <a href="/storage/{{ $d->LokasiMedia }}"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                            {{-- <a href="/suratmasuk/{{ $d->kode }}/edit"><span class="badge rounded-pill bg-warning"><i
                                        data-feather="edit-2"></i></span></a> --}}
                            <form action="/suratmasuk/{{ $d->NoAgenda }}" class="d-inline" method="post">
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
