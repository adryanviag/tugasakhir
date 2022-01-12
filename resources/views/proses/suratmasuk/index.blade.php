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
                    <div class="py-3 d-flex">
                        <div class="tambah-filter d-flex justify-content-between col-12">
                            <div class="col-8">
                                <a href="/suratmasuk/tambah" type="button" class="btn btn-primary">Tambah Surat Masuk</a>
                                <div id="hideFilterBtn" class="btn btn-warning">Filter</div>
                                <div style="display: @if (request()->from && request()->to) block @endif none" id="menuFilter" class="border p-2 m-2">
                                    <form action="/suratmasuk" method="GET">
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
                            </div>
                            <div class="form-group col-4">
                                <form action="" method="POST">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Search" id="search"
                                            aria-label="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                            <td>{{ $d->SifatSurat }}</td>
                                            <td>{{ $d->StatusSurat }}</td>
                                            <td>{{ $d->Lokasi }}</td>
                                            <td><a href="/storage/{{ $d->LokasiMedia }}">FILE</a></td>
                                            <td>{{ $d->TglSurat }}</td>
                                            <td>{{ $d->NoSurat }}</td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <a style="color: rgb(54, 110, 54);"
                                                        href="/suratmasuk/{{ $d->NoAgenda }}/disposisi">
                                                        {{ $d->IsiRingkas }}
                                                    </a>
                                                    @if ($d->LokasiFisik)
                                                        <div class="">
                                                            <i class="fas fa-check text-success"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
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
                                                    <button onclick="return confirm('Yakin ingin menghapus?')" type="submit"
                                                        class="btn btn-danger btn-sm">
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
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $('#search').on('keyup', function() {
            search();
        });
        // search();

        $('#search').keypress(
            function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });

        function search() {
            var keyword = $('#search').val();
            $.post('{{ route('suratmasuk.search') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    keyword: keyword
                },
                function(data) {
                    table_post_row(data);
                    console.log(data);
                });
        }
        // table row with ajax
        function table_post_row(res) {
            let htmlView = '';
            if (res.data.length <= 0) {
                htmlView += `
       <tr>
          <td colspan="4">No data.</td>
      </tr>`;
            }
            for (let i = 0; i < res.data.length; i++) {
                htmlView += `
        <tr>
           <td>` + res.data[i].NoAgenda + `</td>
              <td>` + res.data[i].Pengirim + `</td>
               <td>` + res.data[i].TglDiterima + `</td>
               <td>` + res.data[i].SifatSurat + `</td>
               <td>` + res.data[i].StatusSurat + `</td>
               <td>` + res.data[i].Lokasi + `</td>
               <td><a href="/storage/` + res.data[i].LokasiMedia + `">FILE</a></td>
               <td>` + res.data[i].TglSurat + `</td>
               <td>` + res.data[i].NoSurat + `</td>
               <td>
                        <a style="color: rgb(54, 110, 54);" href="/suratmasuk/` + res.data[i].NoAgenda + `/disposisi">
                            ` + res.data[i].IsiRingkas + `
                        </a>
                </td>
               <td>
                    <a href="/suratmasuk/` + res.data[i].NoAgenda + `/ubah" class="btn btn-warning btn-sm">
                        EDIT
                    </a>
                </td>
               <td>
                    <form action="/suratmasuk/` + res.data[i].NoAgenda + `" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                        <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-danger btn-sm">
                            DELETE
                        </button>
                    </form>
                </td>
        </tr>`;
            }
            $('tbody').html(htmlView);
        }


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
