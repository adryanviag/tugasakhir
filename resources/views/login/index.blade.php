<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FMIPA | {{ $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">


    <main class="form-signin">
        <form action="/login" method="post">
            @csrf
            <img class="mb-4" src="{{ asset('logo.png') }}" alt="" width="120" height="110">
            <h1 class="h4 mb-3">Sistem Informasi Disposisi Surat FMIPA UR</h1>
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissable fade show">
                    {{ session('loginError') }}
                </div>
            @endif
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" autofocus
                    value="{{ old('username') }}" id="username" placeholder="username">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback my-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password"
                    class="form-control @error('password')
                    is-invalid
                @enderror"
                    id="password" placeholder="password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; Adryan Viag 2021</p>
        </form>
    </main>

@include('layouts.partials.footer')
