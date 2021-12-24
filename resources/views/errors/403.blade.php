<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Unauthorized</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{ url('logo.png') }}" alt="logo" height="100" width="100">
            <p class="h5 mt-4">Sistem Informasi Disposisi Surat FMIPA</p>
            <h1><i class="fas fa-ban text-danger"></i></h1>
            <h3 class="">Unauthorized.</h3>

            <p>
                You don't have the right to access this site.
                We will redirect you in <span id="countdowntimer">3</span> seconds or <a href="{{ url('/') }}">click here</a> to redirect immediately.
            </p>
        </div>
        <!-- Main content -->
</body>

<script>
    var timeLeft = 3;
    var timer = setInterval(function() {
        timeLeft--;
        document.getElementById("countdowntimer").textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timer);
        }
    }, 1000);

    setTimeout(() => {
        window.location.href = '/';
    }, 3000);
</script>

</html>
