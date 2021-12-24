@extends('layouts.main')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{ session('success') }} Welcome, {{ auth()->user()->username }}</h5>
                          </div>
                    @endif
                    <h1 class="h2">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @can('admin')
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-inbox"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Surat Masuk</span>
                            <span class="info-box-number">
                                {{ $jml_suratmasuk }}
                            </span>
                        </div>
                    </div>
                </div>
                @endcan
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-paper-plane"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Disposisi Diberikan</span>
                            <span class="info-box-number">{{ $jml_beridisposisi }}</span>
                        </div>
                    </div>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Disposisi Diterima</span>
                            <span class="info-box-number">{{ $jml_terimadisposisi }}</span>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
