@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissable fade show">
            {{ session('success') }} Welcome, {{ auth()->user()->username }}
        </div>
        @else
        <h1 class="h2">Dashboard</h1>
        @endif
    </div>
@endsection
