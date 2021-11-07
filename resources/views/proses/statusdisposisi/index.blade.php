@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3    pb-2 mb-3 border-bottom">
    <h1 class="h2">Status Disposisi</h1>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <div class="col-md-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissable fade show">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-hover">
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
                {{-- @foreach ($data as $d) --}}
                    <tr>
                        <td>1</td>
                        <td>21 Agustus 2020</td>
                        <td>A213161</td>
                        <td>Penyampaian Surat Publikasi Kegiatan Kompetisi Inklusi Keuangan (KOINKU) Tahun 2021</td>
                        <td>WD 3</td>
                        <td>Supaya Diproses</td>
                        <td>
                            <a href="/terimadisposisi"><span class="badge rounded-pill bg-success"><i data-feather="eye"></i></span></a>
                            <a href="/terimadisposisi"><span class="badge rounded-pill bg-warning"><i
                                        data-feather="edit-2"></i></span></a>
                            <form action="/terimadisposisi" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="badge rounded-pill bg-danger border"><i data-feather="x"></i></button>
                            </form>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
