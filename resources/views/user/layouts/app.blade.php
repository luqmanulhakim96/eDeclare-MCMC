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

    <link rel="stylesheet" href="{{ asset('qbadminui/css/vendor/DataTable-1.10.20/datatables.min.css') }}"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"></script>
    <meta name="theme-color" content="#fafafa">

    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> -->
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
                <img src="{{ asset('https://upload.wikimedia.org/wikipedia/commons/f/fc/SKMM-MCMC-2014.png') }}" alt="bran_name" class="brand-img" style="width:100px;height:100px;">
                <a href="{{ route('menu-utama') }}" class="brand-name mt-2 ml-3 font-weight-bold">Asset & Gift System</a>
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
                                  <li class="side-sub-menu-item px-3"><a class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#senaraiperibadi" aria-expanded="false" aria-controls="senaraiperibadi">Senarai Perisytiharan</a></li>
                                  <div id="senaraiperibadi" class="collapse" aria-labelledby="headingOne" data-parent="#senaraiperibadi">
                                      <ul class="side-sub-menu p-0">
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraiharta') }}" class="w-100 py-3 pl-4">Harta Pegawai</a></li>
                                        <li class="side-menu-item px-5"><a href="{{ route('user.senaraihadiah') }}" class="w-100 py-3 pl-4">Hadiah Pegawai</a></li>
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.hadiah.senaraihadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.harta.senaraiharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#form-sub-menu" aria-expanded="false" aria-controls="form-sub-menu">Konfigurasi Sistem</a></li>
                        <!-- Sub menu -->
                        <div id="form-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.systemconfig') }}" class="w-100 pl-4 small">Pengurusan Pengguna</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('user.admin.notification') }}" class="w-100 pl-4 small">Sistem Notifikasi</a></li>
                            </ul>
                        </div>
                          @endif
                          <!--Integrity HOD-->
                          @if(Auth::user()->role == 2)
                          <li class="side-menu-item px-3"><a href="{{ route('user.integrityHOD.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
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
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.integrityHOD.hadiah.senaraihadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.integrityHOD.harta.senaraiharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          @endif
                          <!--HoDIV-->
                          @if(Auth::user()->role == 3)
                          <li class="side-menu-item px-3"><a href="{{ route('user.hodiv.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
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
                                      </ul>
                                  </div>
                              </ul>
                          </div>

                          <!-- Sub menu parent -->
                          <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Senarai Perisytiharan</a></li>

                          <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <ul class="side-sub-menu p-0">
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.hodiv.hadiah.senaraihadiah') }}" class="w-100 pl-4">Penerimaan Hadiah </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.hodiv.harta.senaraiharta') }}" class="w-100 pl-4">Perisytiharan Harta</a></li>
                              </ul>
                          </div>
                          @endif
                          <!--ITadmin-->
                          @if(Auth::user()->role == 4)
                          <li class="side-menu-item px-3"><a href="{{ route('user.it.view') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
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
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.backup') }}" class="w-100 pl-4">Pemulihan dan Sokongan Sistem </a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.errorlog') }}" class="w-100 pl-4">Ralat dan Sistem Log</a></li>
                                  <li class="side-sub-menu-item px-3"><a href="{{ route('user.it.backgroundqueues') }}" class="w-100 pl-4">Memantau Latar Belakang Sistem </a></li>
                              </ul>
                          </div>
                          @endif
            </div>
            @endif

        </div>
        </div>

        <!-- Main section -->
        <main class="bg-light main-full-body">

            <!-- Theme changer -->
            <div class="theme-option p-4">
                <div class="theme-pck">
                    <i class="fas fa-cog fa-lg"></i>
                </div>
                <p>Colour Theme:</p>
                <div class="side-nav-themes d-flex flex-row">
                    <p class="p-3 rounded side-nav-theme-primary side-nav-theme" theme-color="purple"></p>
                    <p class="p-3 rounded ml-2 side-nav-theme-light side-nav-theme" theme-color="light"></p>
                </div>
            </div>



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
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Message -->
                            <!-- <i class="far fa-envelope fa-2x"></i> -->
                            <!-- <span class="badge badge-danger position-absolute notification-badge">3</span> -->
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height p-0">
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img" class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">James <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>James : Hey! Are you busy?</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img" class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">Jhone <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>Jhone : Hey! I need help.</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Dropdown item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <!-- Profile image -->
                                    <div class="notification-icon bg-secondary-c pt-3"><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="img" class="w-75 img-round"></div>
                                    <!-- Message notification -->
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">Mariam <span class="badge badge-pill badge-primary">1</span></p>
                                        <small>Mariam : information</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Notification dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Notification -->
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-primary position-absolute notification-badge">3</span>
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu dropdown-menu-right p-0 dropdown-menu-max-height">
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i class="far fa-envelope text-primary fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="mb-0">New message <span class="badge badge-pill badge-primary">New</span></p>
                                        <small>James : Hey! Are you busy?</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i class="fas fa-clipboard-list text-success fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="m-0">New order received <span class="badge badge-pill badge-success">New</span></p>
                                        <small>3 iPhone x</small>
                                    </div>
                                </div>
                            </a>
                            <!-- Menu item -->
                            <a href="#" class="dropdown-item text-secondary-light p-0 pr-2">
                                <div class="d-flex flex-row border-bottom">
                                    <div class="notification-icon bg-secondary-c pt-3 px-3"><i class="fas fa-box-open text-warning fa-lg"></i></div>
                                    <div class="flex-grow-1 px-3 py-3">
                                        <p class="m-0">Product out of stock <span class="badge badge-pill badge-warning small">1</span></p>
                                        <small>Headphone E63</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Profile action dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcScbyaC694UuDqfOSQEwPZrKBXESLtdOn74Iw&usqp=CAU" alt="profile" class="profile-avatar"></a>
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
                            >Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

    @yield('content')

    <!-- Footer section -->
    <footer class="footer-full-body p-4 d-flex flex-row justify-content-between text-secondary">
        <p>&copy; Copyright. <a href="https://www.forestry.gov.my/my/" target="_Blank"><font color="black">Malaysian Communications and Multimedia Commission</font></a></p>
        <p>Version 1.0.0</p>
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
    <script src="{{ asset('qbadminui/js/vendor/DataTable-1.10.20/datatables.min.js') }}"></script>
    <!-- Data Table script -->
    <script src="{{ asset('qbadminui/js/plugins/dataTable_script.js') }}"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

</body>
</html>
