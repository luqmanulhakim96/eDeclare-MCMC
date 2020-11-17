<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" type="text/css" href="{{ asset('qbadminui/js/vendor/Datatables/datatables.css') }}"/>

    <!-- tinymce -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.0/tinymce.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="theme-color" content="#fafafa">

    <style>
    .required:after {
    content:" *";
    color: red;
    }
    </style>
</head>
<body class="position-relative">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <div class="container-fluid px-0">
        <!-- The side bar -->
        <div class="side-bar side-bar-lg-active" data-theme="purple">
            <!-- Brand details -->
            <div class="side-menu-brand d-flex flex-column justify-content-center align-items-center clear mt-3">
                <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="bran_name" class="brand-img" style="width:150px;height:150px;">
                <a href="{{ route('menu-utama') }}" class="brand-name mt-2 ml-3 font-weight-bold">Sistem Perisytiharan Harta & Hadiah (e-Declare)</a>
            </div>

            @if(Auth::user())

            <!-- Side bar menu -->

            <div class="the_menu mt-5">
                <!-- Heading -->
                <div class="side-menu-heading d-flex">
                    <h6 class=" font-weight-bold pb-2 mx-3"> {{Auth::user()->name }} </h6>
                    <a  class="font-weight-bold ml-auto px-3"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>



                <!-- Menu item -->
                <div id="accordion">
                    <ul class="side-menu p-0 m-0 mt-3">
                      @if(Auth::user()->role == 5)

                      <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Perisytiharan Peribadi </a></li>
                      <!-- Sub menu -->
                      <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <ul class="side-sub-menu p-0">

                              <li class="side-sub-menu-item px-3"><a href="{{ route('user.form') }}" class="w-100 py-3 pl-4">Perisytiharan Harta Pegawai</a></li>

                              <!-- Sub menu parent -->
                              <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah') }}" class="w-100 py-3 pl-4">Perisytiharan Hadiah Pegawai</a></li>

                          </ul>
                      </div>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu2" aria-expanded="false" aria-controls="table-sub-menu">Senarai Penerimaan Hadiah</a></li>
                        <div id="table-sub-menu2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <!-- <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.senaraiharta') }}" class="w-100 pl-4">Senarai Perisytiharan Harta </a></li> -->
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah.senaraihadiah') }}" class="w-100 pl-4">Senarai Penerimaan Hadiah Atas RM 100</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah.senaraihadiahB') }}" class="w-100 pl-4">Senarai Penerimaan Hadiah RM 100 dan Kebawah</a></li>
                                <li class="side-menu-item px-5"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                <li class="side-menu-item px-5"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>
                            </ul>
                        </div>
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu3" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan </a></li>
                        <div id="table-sub-menu3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.FormB.senaraihartaB') }}" class="w-100 pl-4">Senarai Perisytiharan Harta </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.FormC.senaraihartaC') }}" class="w-100 pl-4">Senarai Pelupusan Harta </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.FormD.senaraihartaD') }}" class="w-100 pl-4">Senarai Perisytiharan Syarikat dan Perniagaan Sendiri </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.FormG.senaraihartaG') }}" class="w-100 pl-4">Senarai Perisytiharan Memohon dan Memiliki Saham </a></li>
                                <!-- <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah.senaraihadiah') }}" class="w-100 pl-4">Senarai Penerimaan Hadiah Atas RM 100</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah.senaraihadiahB') }}" class="w-100 pl-4">Senarai Penerimaan Hadiah RM 100 dan Kebawah</a></li> -->
                            </ul>
                        </div>
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table" aria-expanded="false" aria-controls="table">Draf</a></li>
                        <div id="table" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>
                            </ul>
                        </div>
                        @endif
                        <!--admin-->
                        @if(Auth::user()->role == 1)
                          <li class="side-menu-item px-3"><a href="{{ route('user.admin.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Peribadi </a></li>
                          <!-- <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Perisytiharan Peribadi </a></li> -->
                          <!-- Sub menu -->
                          <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">

                                  <li class="side-sub-menu-item px-3" ><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#peribadi" aria-expanded="false" aria-controls="peribadi">Perisytiharan</a></li>
                                  <div id="peribadi" class="collapse" aria-labelledby="headingOne" data-parent="#peribadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.form') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                      </ul>
                                  </div>
                                  <li class="side-sub-menu-item px-3"><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#senaraiperibadi" aria-expanded="false" aria-controls="senaraiperibadi">Senarai Perisytiharan Peribadi</a></li>
                                  <div id="senaraiperibadi" class="collapse" aria-labelledby="headingOne" data-parent="#senaraiperibadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraiharta') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraihadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>

                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.senaraiallhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senaraiallharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.senarai_user_declaration') }}" class="w-100 pl-4">Perisytiharan Mengikut Pengguna</a></li>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu">Senarai Tugasan</a></li>

                          <div id="menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.senaraitugasanhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senaraitugasanharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>

                        <!-- Sub Menu from Route -->
                        @if(Auth::user()->layouts == '1')
                        @foreach(json_decode(Auth::user()->layouts->layout) as $route)
                          @if($route == "1")
                            <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#form-sub-menu" aria-expanded="false" aria-controls="form-sub-menu">Tetapan Sistem</a></li>
                            <!-- Sub menu -->
                            <div id="form-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <ul class="side-sub-menu p-0">
                                    <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.systemconfig') }}" class="w-100 pl-4 small">Tetapan Sistem</a></li>
                                    <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.notification') }}" class="w-100 pl-4 small">Sistem Notifikasi</a></li>
                                </ul>
                            </div>
                          @endif
                        @endforeach
                        @endif

                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#laporan" aria-expanded="false" aria-controls="table-sub-menu">Laporan</a></li>

                        <div id="laporan" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.report') }}" class="w-100 pl-4">Hadiah </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senarailaporanharta') }}" class="w-100 pl-4">Harta</a></li>
                            </ul>
                        </div>
                          @endif
                          <!--Integrity HOD-->
                          @if(Auth::user()->role == 2)
                          <li class="side-menu-item px-3"><a href="{{ route('user.admin.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Peribadi </a></li>
                          <!-- <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Perisytiharan Peribadi </a></li> -->
                          <!-- Sub menu -->
                          <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">

                                  <li class="side-sub-menu-item px-3" ><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#peribadi" aria-expanded="false" aria-controls="peribadi">Perisytiharan</a></li>
                                  <div id="peribadi" class="collapse" aria-labelledby="headingOne" data-parent="#peribadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.form') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                      </ul>
                                  </div>
                                  <li class="side-sub-menu-item px-3"><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#senaraiperibadi" aria-expanded="false" aria-controls="senaraiperibadi">Senarai Perisytiharan</a></li>
                                  <div id="senaraiperibadi" class="collapse" aria-labelledby="headingOne" data-parent="#senaraiperibadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraiharta') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraihadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.senaraiallhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senaraiallharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu">Senarai Tugasan</a></li>
                          <div id="menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.integrityHOD.hadiah.senaraitugasanhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.integrityHOD.harta.senaraitugasanharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          @endif
                          <!--HoDIV-->
                          @if(Auth::user()->role == 3)
                          <li class="side-menu-item px-3"><a href="{{ route('user.admin.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Peribadi </a></li>
                          <!-- <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Perisytiharan Peribadi </a></li> -->
                          <!-- Sub menu -->
                          <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">

                                  <li class="side-sub-menu-item px-3" ><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#peribadi" aria-expanded="false" aria-controls="peribadi">Perisytiharan</a></li>
                                  <div id="peribadi" class="collapse" aria-labelledby="headingOne" data-parent="#peribadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.form') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                      </ul>
                                  </div>
                                  <li class="side-sub-menu-item px-3"><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#senaraiperibadi" aria-expanded="false" aria-controls="senaraiperibadi">Senarai Perisytiharan</a></li>
                                  <div id="senaraiperibadi" class="collapse" aria-labelledby="headingOne" data-parent="#senaraiperibadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraiharta') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraihadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.senaraiallhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senaraiallharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu">Senarai Tugasan</a></li>

                          <div id="menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.hodiv.hadiah.senaraitugasanhadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.hodiv.harta.senaraitugasanharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          @endif
                          <!--ITadmin-->
                          @if(Auth::user()->role == 4)

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Peribadi </a></li>
                          <!-- <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="false" aria-controls="sub_menu_1">Perisytiharan Peribadi </a></li> -->
                          <!-- Sub menu -->
                          <div id="sub_menu_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">

                                  <li class="side-sub-menu-item px-3" ><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#peribadi" aria-expanded="false" aria-controls="peribadi">Perisytiharan</a></li>
                                  <div id="peribadi" class="collapse" aria-labelledby="headingOne" data-parent="#peribadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.form') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                      </ul>
                                  </div>
                                  <li class="side-sub-menu-item px-3"><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#senaraiperibadi" aria-expanded="false" aria-controls="senaraiperibadi">Senarai Perisytiharan</a></li>
                                  <div id="senaraiperibadi" class="collapse" aria-labelledby="headingOne" data-parent="#senaraiperibadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraiharta') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraihadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.harta.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Harta</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.hadiah.senaraidraft') }}" class="w-100 py-3 pl-4">Draf Hadiah</a></li>
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <li class="side-menu-item px-3"><a href="{{ route('user.it.audit') }}" class="w-100 py-3 pl-4">Audit Trail</a></li>
                          <li class="side-menu-item px-3"><a href="{{ route('user.it.users') }}" class="w-100 py-3 pl-4">Pengurusan Pengguna</a></li>
                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Kawalan Sistem</a></li>
                          <!-- Sub menu -->
                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.konfigurasi') }}" class="w-100 pl-4">Konfigurasi Sistem</a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.backup') }}" class="w-100 pl-4">Pemulihan dan Sokongan Sistem </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.errorlog') }}" class="w-100 pl-4">Ralat dan Sistem Log</a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.backgroundqueues') }}" class="w-100 pl-4">Memantau Latar Belakang Sistem </a></li>
                              </ul>
                          </div>
                          <li class="side-menu-item px-3"><a href="{{ route('user.it.sistemkonfigurasi') }}" class="w-100 py-3 pl-4">Sistem Konfigurasi</a></li>
                          @endif
            </div>
            @endif

        </div>
        </div>

        <!-- Main section -->
        <main class="bg-light main-full-body">

            <!-- Theme changer -->
            <!-- <div class="theme-option p-4">
                <div class="theme-pck">
                    <i class="fas fa-cog fa-lg"></i>
                </div>
                <p>Colour Theme:</p>
                <div class="side-nav-themes d-flex flex-row">
                    <p class="p-3 rounded side-nav-theme-primary side-nav-theme" theme-color="purple"></p>
                    <p class="p-3 rounded ml-2 side-nav-theme-light side-nav-theme" theme-color="light"></p>
                </div>
            </div> -->

            @if ($message = Session::get('success'))
            <script type="text/javascript">
                 $(document).ready(function() {
                     $('#modal').modal();
                 });
             </script>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content alert alert-card  alert-success">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Operasi Berjaya!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>{{$message}}</p>
                    </div>
                </div>
                </div>
            </div>
            @elseif ($message = Session::get('error'))
            <script type="text/javascript">
                 $(document).ready(function() {
                     $('#error_modal').modal();
                 });
             </script>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content alert alert-card  warning-danger">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Operasi Gagal!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>{{$message}}</p>
                    </div>
                </div>
                </div>
            </div>
            @endif


            <!-- The navbar -->
            <nav class="navbar navbar-expand navbar-light bg-light py-3">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
                <!-- Navbar search section -->
                <!-- <div class="navb-search ml-5 d-none d-md-block">
                    <form action="#" method="POST">
                        <div class="input-group search-round">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn border" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div> -->
                <!-- Navbar right menu section -->
                <div class="navb-menu ml-auto d-flex flex-row">
                    <!-- Message dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- Icon -->

                    </div>

                    <!-- Notification dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Notification -->
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-primary position-absolute notification-badge">{{$count_notification}}</span>
                        </a>
                        @if($count_notification != 0)
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-right p-0 dropdown-menu-max-height">
                            <!-- Menu item -->
                            @foreach($permohonan_admin as $permohonan)
                              @foreach($permohonan->unreadNotifications->sortByDesc('created_at') as $notification)
                                @if($notification->data['kepada_id'] == Auth::user()->id)
                                <a href="{{route('notification.mark-as-read', $notification->id)}}" class="dropdown-item text-secondary-light p-0">
                                      <div class="d-flex flex-row border-bottom">
                                          <div class="notification-icon bg-secondary-c pt-3 px-3 pb-3"><i class="far fa-envelope text-primary fa-lg pt-3"></i></div>
                                          <div class="flex-grow-1 px-3 py-3">
                                              <p class="mb-0"> {{date('H:i:s d-m-Y', strtotime($permohonan->created_at))}} &ensp;<span class="badge badge-pill badge-primary">Baru</span></p>
                                              <small>{{$notification->data['tajuk'] }}</small>
                                          </div>
                                      </div>
                                  </a>
                                  @endif
                                @endforeach
                              @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Profile action dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown">
                          <img src="{{ asset('https://icon-library.com/images/default-profile-icon/default-profile-icon-24.jpg') }}" alt="profile" class="profile-avatar" style="height:40px; width:40px;">
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height">
                            <!-- Menu items -->
                            <a href="#" class="dropdown-item disabled small"><i class="far fa-user mr-1"></i> {{Auth::user()->name}} </a>
                            <!-- <a href="{{ route('user.profile') }}" class="dropdown-item text-secondary-light">Edit Profil</a> -->
                            <!-- <a href="#" class="dropdown-item text-secondary-light">Billing history</a> -->
                            <a  class="dropdown-item text-secondary-light"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >Log Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

    @yield('content')

    <!-- Footer section -->
    <footer>
      <br>
      <div class="row">
        <div class="col-md-10">&copy; Copyright. <a href="https://www.forestry.gov.my/my/" target="_Blank"><font color="black">Malaysian Communications and Multimedia Commission</font></a></div>
        <div class="col-md-2">Version 1.0.0</div>
      </div>
    </footer>
  </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> -->

    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/jquery-3.3.1/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('qbadminui/js/vendor/popper-js/popper1.14.7.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/bootstrap.min.js') }}"></script>
    <!-- eChart -->
    <script src="{{ asset('qbadminui/js/vendor/eChart/echarts.min.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/eChart/echarts.option.min.js') }}"></script>
    <!-- eChart script -->
    <script src="{{ asset('qbadminui/js/plugins/echart_drw.js') }}"></script>
    <script src="{{ asset('qbadminui/js/plugins.js') }}"></script>
    <script src="{{ asset('qbadminui/js/main.js') }}"></script>
    <!-- Data Table -->
    <!-- Data Table script -->
    <script type="text/javascript" src="{{ asset('qbadminui/js/vendor/DataTables/datatables.js') }}"></script>

</body>
</html>
<script type="text/javascript">
  $("document").ready(function(){
    setTimeout(function(){
       $('#modal').modal('hide');
    }, 2500 ); // 2.5 secs

  });
</script>
