@include('layouts.partials.header')

@include('layouts.partials.navbar')

<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('container')
        </main>
    </div>
</div>

@include('layouts.partials.footer')
