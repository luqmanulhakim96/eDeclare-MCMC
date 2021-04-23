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
    <div class="container-fluid px-0" style="padding:5%;">
        <!-- The side bar -->
        <div class="side-bar side-bar-lg-active" data-theme="purple">
            <!-- Brand details -->
            <div class="side-menu-brand d-flex flex-column justify-content-center align-items-center clear mt-3">
                <img src="img/QbyteIcon.png" alt="bran_name" class="brand-img">
                <a href="#" class="brand-name mt-2 ml-2 font-weight-bold">QBAdminUI</a>
            </div>
            <!-- Side bar menu -->
            <div class="the_menu mt-5">
                <!-- Heading -->
                <div class="side-menu-heading d-flex">
                    <h6 class=" font-weight-bold pb-2 mx-3"> Mr Admin </h6>
                    <a href="#" class="font-weight-bold ml-auto px-3">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
                <!-- Menu item -->
                <div id="accordion">
                    <ul class="side-menu p-0 m-0 mt-3">
                        <li class="side-menu-item px-3"><a href="index.html" class="w-100 py-3 pl-4">Dashboard</a></li>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_1" aria-expanded="true" aria-controls="sub_menu_1">Basic UI Elements</a></li>
                        <!-- Sub menu -->
                        <div id="sub_menu_1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="alert.html" class="w-100 pl-4 small">Alert</a></li>
                                <li class="side-sub-menu-item px-3"><a href="accordion.html" class="w-100 pl-4 small active">Accordion</a></li>
                                <li class="side-sub-menu-item px-3"><a href="badge.html" class="w-100 pl-4 small">Badge</a></li>
                                <li class="side-sub-menu-item px-3"><a href="button.html" class="w-100 pl-4 small">Button</a></li>
                                <li class="side-sub-menu-item px-3"><a href="bootstrap_tab.html" class="w-100 pl-4 small">Bootstrap tab</a></li>
                                <li class="side-sub-menu-item px-3"><a href="cards.html" class="w-100 pl-4 small">Cards</a></li>
                                <li class="side-sub-menu-item px-3"><a href="carousels.html" class="w-100 pl-4 small">Carousels</a></li>
                                <li class="side-sub-menu-item px-3"><a href="dropdown.html" class="w-100 pl-4 small">Dropdown</a></li>
                                <li class="side-sub-menu-item px-3"><a href="list.html" class="w-100 pl-4 small">Llist</a></li>
                                <li class="side-sub-menu-item px-3"><a href="modal.html" class="w-100 pl-4 small">Modals</a></li>
                                <li class="side-sub-menu-item px-3"><a href="paginations.html" class="w-100 pl-4 small">Paginations</a></li>
                                <li class="side-sub-menu-item px-3"><a href="progressbar.html" class="w-100 pl-4 small">Progressbar</a></li>
                                <li class="side-sub-menu-item px-3"><a href="tooltip.html" class="w-100 pl-4 small">Tooltip</a></li>
                                <li class="side-sub-menu-item px-3"><a href="typography.html" class="w-100 pl-4 small">Typography</a></li>
                            </ul>
                        </div>


                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#form-sub-menu" aria-expanded="false" aria-controls="form-sub-menu">Form Elements</a></li>
                        <!-- Sub menu -->
                        <div id="form-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="form_basic.html" class="w-100 pl-4 small">Basic Elements</a></li>
                                <li class="side-sub-menu-item px-3"><a href="form_basic_action.html" class="w-100 pl-4 small">Basic Action Bar</a></li>
                                <li class="side-sub-menu-item px-3"><a href="form_layout.html" class="w-100 pl-4 small">Form layouts</a></li>
                                <li class="side-sub-menu-item px-3"><a href="multi_column_forms.html" class="w-100 pl-4 small">Multi Column Forms</a></li>
                                <li class="side-sub-menu-item px-3"><a href="input_group.html" class="w-100 pl-4 small">Input Group</a></li>
                                <li class="side-sub-menu-item px-3"><a href="form_validation.html" class="w-100 pl-4 small">Form Validation</a></li>
                            </ul>
                        </div>

                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#chart-sub-menu" aria-expanded="false" aria-controls="chart-sub-menu">Charts</a></li>
                        <!-- Sub menu -->
                        <div id="chart-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="chart_js.html" class="w-100 pl-4">Chart Js</a></li>
                            </ul>
                        </div>

                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu" aria-expanded="false" aria-controls="table-sub-menu">Tables</a></li>
                        <!-- Sub menu -->
                        <div id="table-sub-menu" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="basic_table.html" class="w-100 pl-4 small">Basic Table</a></li>
                                <li class="side-sub-menu-item px-3"><a href="datatables.html" class="w-100 pl-4 small">DataTables</a></li>
                            </ul>
                        </div>

                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4">Icons</a></li>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#sub_menu_2" aria-expanded="true" aria-controls="sub_menu_2">User Pages</a></li>
                        <!-- Sub menu -->
                        <div id="sub_menu_2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="blank.html" class="w-100 pl-4 small">Blank Page</a></li>
                                <li class="side-sub-menu-item px-3"><a href="login.html" class="w-100 pl-4 small">Login</a></li>
                                <li class="side-sub-menu-item px-3"><a href="signup.html" class="w-100 pl-4 small">Register</a></li>
                                <li class="side-sub-menu-item px-3"><a href="404.html" class="w-100 pl-4 small">404</a></li>
                                <li class="side-sub-menu-item px-3"><a href="500.html" class="w-100 pl-4 small">500</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main section -->
        <main class="main-full-body" style="background-color:#ffffff;padding-top: 2% ;padding-left: 5%;padding-right: 5%;">

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
            <nav class="navbar fixed-top" style="background-color:#ffff !important;border-bottom: 5px solid;padding: 1%;">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>

                <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="bran_name" class="brand-img" style="width:5%;">

                <a href="{{ route('menu-utama') }}" class="brand-name mt-2 ml-3 font-weight-bold" style="font-size: 1.5rem;  color: #000000 !important;">Sistem Perisytiharan Harta & Hadiah</a>


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
                <div class="navb-menu ml-auto d-flex flex-row" style="width:9%;">
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
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown"><img  class="profile-avatar"
                          @if($thumbnailphoto)
                          src="data:image/jpeg;base64,{{ base64_encode($thumbnailphoto)}}"
                          @else
                          src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcScbyaC694UuDqfOSQEwPZrKBXESLtdOn74Iw&usqp=CAU"
                          @endif
                          /></a>
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
      <div class="row">
        <div class="col-md-12" style="text-align:center;"><a href="" target="_Blank" ><font color="white">MALAYSIAN COMMUNICATIONS AND MULTIMEDIA COMMISSION</font></a></div>
        <!-- <div class="col-md-2"><font color="white">Version 1.0.0</font></div> -->
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
