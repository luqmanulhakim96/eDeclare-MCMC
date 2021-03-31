<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
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
    <link rel="stylesheet" href="{{ asset('qbadminui/css/mainlayout.css') }}">
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

    /* ul:hover {background: yellow;} */
    li:hover a {background:#f5d94c; color: black !important;}
    ul li ul li :hover a{background:#fee35e;color: black !important;}
    ul li ul li ul li:hover a{background:#f1d31d;color: black !important;}

    li:hover {background:#f5d94c;}
    ul li ul li :hover {background:#fee35e;}
    ul li ul li ul li:hover {background:#f1d31d;}

    ul li ul li{
      background: #000;
      display: block;
    }

    /* a {
    color: white;
    text-decoration: none !important;
  } */
    /* .active-sidebar {
      background-color: yellow;
      color: black !important;

    } */

    </style>


</head>
<body class="position-relative">

    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <div class="container-fluid px-0" style="padding:6%;">
        <!-- The side bar -->
        <!-- <div class="side-bar side-bar-lg" data-theme="purple"> -->
        <div class="side-bar side-bar-lg">
          <div class="nav-left-sidebar sidebar-dark">
          <div class="menu-list">
              <nav class="navbar navbar-expand-lg navbar-light">

                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav flex-column" style="width: 100%; padding-top: 5%;">

                        @if(Auth::user()->role == 5)
                          <li class="nav-item" >
                              <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-dot-circle"></i> Perisytiharan Peribadi</a>
                              <div id="submenu-10" class="collapse submenu" style="">
                                  <ul class="nav flex-column">
                                          <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-dot-circle"></i> Perisytiharan Baharu</a>
                                          <div id="submenu-14" class="collapse submenu" style="padding-left:15%;">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.form') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.hadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                                  </li>
                                              </ul>
                                          </div>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan</a>
                                <div id="submenu-11" class="collapse submenu" style="">
                                    <ul class="nav flex-column" style="padding-left:15%;">
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.harta.FormB.senaraihartaB') }}"><i class="fas fa-chevron-right"></i> Senarai Perisytiharan Harta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.harta.FormC.senaraihartaC') }}"><i class="fas fa-chevron-right"></i> Senarai Pelupusan Harta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.harta.FormD.senaraihartaD') }}"><i class="fas fa-chevron-right"></i> Senarai Perisytiharan Syarikat dan Perniagaan Sendiri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.harta.FormG.senaraihartaG') }}"><i class="fas fa-chevron-right"></i> Senarai Perisytiharan Memohon dan Memiliki Saham</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="fas fa-dot-circle"></i> Senarai Penerimaan Hadiah</a>
                                <div id="submenu-12" class="collapse submenu" style="">
                                    <ul class="nav flex-column" style="padding-left:15%;">
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraihadiah') }}"><i class="fas fa-chevron-right"></i> Senarai Penerimaan Hadiah Atas RM 100</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraihadiahB') }}"><i class="fas fa-chevron-right"></i> Senarai Penerimaan Hadiah RM 100 dan Kebawah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fas fa-dot-circle"></i> Senarai Draf</a>
                                <div id="submenu-13" class="collapse submenu" style="">
                                    <ul class="nav flex-column" style="padding-left:15%;">
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.harta.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Harta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Hadiah</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                          @endif

                      @if(Auth::user()->role == 1)
                      <li class="nav-item">
                          <a class="nav-link text-secondary-side" href="{{ route('user.admin.view') }}"><i class="fas fa-dot-circle"></i> Dashboard</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-dot-circle"></i> Peribadi</a>
                          <div id="submenu-9" class="collapse submenu" style="">
                              <ul class="nav flex-column">
                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-dot-circle"></i> Perisytiharan Peribadi</a>
                                  <div id="submenu-14" class="collapse submenu" style="padding-left:15%;">
                                      <ul class="nav flex-column">
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.form') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.hadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                          </li>
                                      </ul>
                                  </div>
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan Peribadi</a>
                                  <div id="submenu-13" class="collapse submenu" style="padding-left:15%;">
                                      <ul class="nav flex-column">
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.senaraiharta') }}"><i class="fas fa-chevron-right"></i> Harta </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.senaraihadiah') }}"><i class="fas fa-chevron-right"></i> Hadiah </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.harta.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Harta </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Hadiah </a>
                                          </li>
                                      </ul>
                                  </div>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-all" aria-controls="submenu-all"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan</a>
                          <div id="submenu-all" class="collapse submenu" style="padding-left:15%;">
                              <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary-side"  href="{{ route('user.admin.harta.senaraiallharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary-side" href="{{ route('user.admin.hadiah.senaraiallhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary-side" href="{{ route('user.admin.senarai_user_declaration') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Mengikut Pengguna</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tugasan" aria-controls="submenu-tugasan"><i class="fas fa-dot-circle"></i> Senarai Tugasan</a>
                            <div id="submenu-tugasan" class="collapse submenu" style="padding-left:15%;">
                                <ul class="nav flex-column">
                                      <li class="nav-item">
                                          <a class="nav-link text-secondary-side"  href="{{ route('user.admin.harta.senaraitugasanharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link text-secondary-side"  href="{{ route('user.admin.hadiah.senaraitugasanhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          @for($i=0; $i<count(json_decode(Auth::user()->layouts->layout));$i++)
                            @if(json_decode(Auth::user()->layouts->layout)[$i] == "1" && json_decode(Auth::user()->layouts->layout)[$i+1] == "2")
                            <li class="nav-item">
                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                    <ul class="nav flex-column">
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              @break
                              @elseif(json_decode(Auth::user()->layouts->layout)[$i] == "1")
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                  <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                      <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a>
                                            </li>
                                            <li class="nav-item">
                                                <!-- <a class="nav-link"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @break
                                @elseif(json_decode(Auth::user()->layouts->layout)[$i] == "2")
                                <li class="nav-item">
                                    <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                    <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                        <ul class="nav flex-column">
                                              <li class="nav-item">
                                                  <!-- <a class="nav-link"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a> -->
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link text-secondary-side"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  @break
                                @endif
                              @endfor

                              @endif
                              @if(Auth::user()->role == 2)
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="{{ route('user.admin.view') }}"><i class="fas fa-dot-circle"></i> Dashboard</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-dot-circle"></i> Peribadi</a>
                                  <div id="submenu-9" class="collapse submenu" style="">
                                      <ul class="nav flex-column">
                                        <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-dot-circle"></i> Perisytiharan Peribadi</a>
                                          <div id="submenu-14" class="collapse submenu" style="padding-left:15%;">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.form') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.hadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                                  </li>
                                              </ul>
                                          </div>
                                          <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan Peribadi</a>
                                          <div id="submenu-13" class="collapse submenu" style="padding-left:15%;">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.senaraiharta') }}"><i class="fas fa-chevron-right"></i> Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.senaraihadiah') }}"><i class="fas fa-chevron-right"></i> Hadiah </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.harta.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Hadiah </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </ul>
                                  </div>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-all" aria-controls="submenu-all"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan</a>
                                  <div id="submenu-all" class="collapse submenu" style="padding-left:15%;">
                                      <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side"  href="{{ route('user.admin.harta.senaraiallharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side" href="{{ route('user.admin.hadiah.senaraiallhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                            </li>
                                            <li class="nav-item">
                                                <!-- <a class="nav-link text-secondary-side" href="{{ route('user.admin.senarai_user_declaration') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Mengikut Pengguna</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tugasan" aria-controls="submenu-tugasan"><i class="fas fa-dot-circle"></i> Senarai Tugasan</a>
                                    <div id="submenu-tugasan" class="collapse submenu" style="padding-left:15%;">
                                        <ul class="nav flex-column">
                                              <li class="nav-item">
                                                  <a class="nav-link text-secondary-side"  href="{{ route('user.integrityHOD.harta.senaraitugasanharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link text-secondary-side"  href="{{ route('user.integrityHOD.hadiah.senaraitugasanhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  @endif
                              @if(Auth::user()->role == 3)
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="{{ route('user.admin.view') }}"><i class="fas fa-dot-circle"></i> Dashboard</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-dot-circle"></i> Peribadi</a>
                                  <div id="submenu-9" class="collapse submenu" style="">
                                      <ul class="nav flex-column">
                                        <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-dot-circle"></i> Perisytiharan Peribadi</a>
                                          <div id="submenu-14" class="collapse submenu" style="padding-left:15%;">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.form') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.hadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                                  </li>
                                              </ul>
                                          </div>
                                          <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan Peribadi</a>
                                          <div id="submenu-13" class="collapse submenu" style="padding-left:15%;">
                                              <ul class="nav flex-column">
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.senaraiharta') }}"><i class="fas fa-chevron-right"></i> Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.senaraihadiah') }}"><i class="fas fa-chevron-right"></i> Hadiah </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.harta.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Harta </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Hadiah </a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </ul>
                                  </div>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-all" aria-controls="submenu-all"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan</a>
                                  <div id="submenu-all" class="collapse submenu" style="padding-left:15%;">
                                      <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side"  href="{{ route('user.admin.harta.senaraiallharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side" href="{{ route('user.admin.hadiah.senaraiallhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                            </li>
                                            <li class="nav-item">
                                                <!-- <a class="nav-link text-secondary-side" href="{{ route('user.admin.senarai_user_declaration') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Mengikut Pengguna</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tugasan" aria-controls="submenu-tugasan"><i class="fas fa-dot-circle"></i> Senarai Tugasan</a>
                                    <div id="submenu-tugasan" class="collapse submenu" style="padding-left:15%;">
                                        <ul class="nav flex-column">
                                              <li class="nav-item">
                                                  <a class="nav-link text-secondary-side"  href="{{ route('user.hodiv.harta.senaraitugasanharta') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link text-secondary-side"  href="{{ route('user.hodiv.hadiah.senaraitugasanhadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  @endif
                                  @if(Auth::user()->role == 4)

                                  <li class="nav-item">
                                      <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-dot-circle"></i> Peribadi</a>
                                      <div id="submenu-9" class="collapse submenu" style="">
                                          <ul class="nav flex-column">
                                            <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14"><i class="fas fa-dot-circle"></i> Perisytiharan Peribadi</a>
                                              <div id="submenu-14" class="collapse submenu" style="padding-left:15%;">
                                                  <ul class="nav flex-column">
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.form') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Harta </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.hadiah') }}"><i class="fas fa-chevron-right"></i> Perisytiharan Hadiah </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                              <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" style="padding-left:15%;" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-13"><i class="fas fa-dot-circle"></i> Senarai Perisytiharan Peribadi</a>
                                              <div id="submenu-13" class="collapse submenu" style="padding-left:15%;">
                                                  <ul class="nav flex-column">
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.senaraiharta') }}"><i class="fas fa-chevron-right"></i> Harta </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.senaraihadiah') }}"><i class="fas fa-chevron-right"></i> Hadiah </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.harta.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Harta </a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side" href="{{ route('user.hadiah.senaraidraft') }}"><i class="fas fa-chevron-right"></i> Draf Hadiah </a>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-secondary-side" href="{{ route('user.it.audit') }}"><i class="fas fa-dot-circle"></i> Audit Trail</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-secondary-side" href="{{ route('user.it.users') }}"><i class="fas fa-dot-circle"></i> Pengurusan Pengguna</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-kawalan" aria-controls="submenu-kawalan"><i class="fas fa-dot-circle"></i> Kawalan Sistem</a>
                                      <div id="submenu-kawalan" class="collapse submenu" style="padding-left:15%;">
                                          <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link text-secondary-side"  href="{{ route('user.it.backup') }}"><i class="fas fa-chevron-right"></i> Pemulihan dan Sokongan Sistem</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-secondary-side"  href="{{ route('user.it.errorlog') }}"><i class="fas fa-chevron-right"></i> Ralat dan Sistem Log</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-secondary-side"  href="{{ route('user.it.backgroundqueues') }}"><i class="fas fa-chevron-right"></i> Memantau Latar Belakang Sistem</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-secondary-side" href="{{ route('user.it.sistemkonfigurasi') }}"><i class="fas fa-dot-circle"></i> Konfigurasi Sistem</a>
                                    </li>

                                      @for($i=0; $i<count(json_decode(Auth::user()->layouts->layout));$i++)
                                        @if(json_decode(Auth::user()->layouts->layout)[$i] == "1" && json_decode(Auth::user()->layouts->layout)[$i+1] == "2")
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                            <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                                <ul class="nav flex-column">
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a>
                                                      </li>
                                                      <li class="nav-item">
                                                          <a class="nav-link text-secondary-side"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </li>
                                          @break
                                          @elseif(json_decode(Auth::user()->layouts->layout)[$i] == "1")
                                          <li class="nav-item">
                                              <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                              <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                                  <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link text-secondary-side"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <!-- <a class="nav-link"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @break
                                            @elseif(json_decode(Auth::user()->layouts->layout)[$i] == "2")
                                            <li class="nav-item">
                                                <a class="nav-link text-secondary-side" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-tetapan" aria-controls="submenu-tetapan"><i class="fas fa-dot-circle"></i> Tetapan Sistem</a>
                                                <div id="submenu-tetapan" class="collapse submenu" style="padding-left:15%;">
                                                    <ul class="nav flex-column">
                                                          <li class="nav-item">
                                                              <!-- <a class="nav-link"  href="{{ route('user.admin.systemconfig') }}"><i class="fas fa-chevron-right"></i> Tetapan Sistem</a> -->
                                                          </li>
                                                          <li class="nav-item">
                                                              <a class="nav-link text-secondary-side"  href="{{ route('user.admin.notification') }}"><i class="fas fa-chevron-right"></i> Sistem Notifikasi</a>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </li>
                                              @break
                                            @endif
                                          @endfor
                                  @endif
                        </ul>
                  </div>
              </nav>
          </div>
      </div>
    </div>
        <!-- Main section -->
        <main class="main-full-body" style="background-color:#ffffff;width: 100% !important;padding-bottom: 5%;">

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
            <nav class="navbar fixed-top" style="background-color:#ffff !important;">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>

                <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="bran_name" class="brand-img" style="width:6%;height:6%;">

                <a href="{{ route('menu-utama') }}" class="brand-name mt-2 ml-3 font-weight-bold" style="font-size: 1.5rem;  color: #000000 !important;">Sistem Perisytiharan Harta & Hadiah (e-Declare)</a>


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
        <div class="col-md-10"><font color="white">&copy; Copyright. </font><a href="https://www.forestry.gov.my/my/" target="_Blank"><font color="white">Malaysian Communications and Multimedia Commission</font></a></div>
        <div class="col-md-2"><font color="white">Version 1.0.0</font></div>
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
    }, 1500 ); // 5 secs

  });
</script>
