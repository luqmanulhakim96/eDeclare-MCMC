<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MCMC - Asset & Gift System') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('qbadminui/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('qbadminui/css/vendor/bootstrap-4.3.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('qbadminui/css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>

    </style>
</head>
<body class="position-relative">
  <div class="container-fluid px-0">
      <div class="row" style="padding-left:3%;padding-top:1%;">
        <div class="col-md-1">
          <img style="width:100%;" src="{{ asset('qbadminui/img/MCMC.png') }}" alt="bran_name" class="brand-img" >
        </div>
        <div class="col-md-10"  style="padding-top:2%;">
          <a href="{{ route('menu-utama') }}" class="font-weight-bold" style="font-size: 1.75rem;  color: #000000 !important;">Sistem Perisytiharan Harta & Hadiah</a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12"  style="background:black;">
          <span> -</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"  style="background:#ebd702;text-align:left;">
          <h4 style="color:#ffff;padding-left:2%;">SELAMAT DATANG</h4>
        </div>
      </div>


    @yield('content')

    <footer style="bottom:0 !important; position:fixed !important;">
      <div class="row">
        <div class="col-md-12" style="text-align:center;"><a href="" target="_Blank" ><font color="white">MALAYSIAN COMMUNICATIONS AND MULTIMEDIA COMMISION</font></a></div>
        <!-- <div class="col-md-2"><font color="white">Version 1.0.0</font></div> -->
      </div>
    </footer>

    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/jquery-3.3.1/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('qbadminui/js/vendor/popper-js/popper1.14.7.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/bootstrap.min.js') }}"></script>
</div>
</body>
</html>
