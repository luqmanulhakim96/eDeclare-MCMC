@extends('user.layouts.app')

@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                <div class="card-body">
                      <div class="card-titleuser"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                </div>
                </div>
                <div class="small-cards mt-5 mb-4">
                    <div class="row">
                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                            <!-- Card -->
                            <div class="card border-0 rounded-lg">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon w-100">
                                          <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" class="w-50"></i>
                                        </div>
                                        <!-- Text -->
                                        <a href="{{route('user.harta.FormB.senaraihartaB')}}">
                                        <div class="small-card-text w-100 text-center">
                                            <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Harta Pegawai</p>
                                            <h4 class="font-weight-normal m-0 text-primary">{{$listB}}</h4>
                                        </div>
                                      </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                            <!-- Card -->
                            <div class="card border-0 rounded-lg">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon w-100 ">
                                            <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" class="w-50"></i>
                                        </div>
                                        <!-- Text -->
                                        <a href="{{route('user.harta.FormC.senaraihartaC')}}">
                                        <div class="small-card-text w-100 text-center">
                                            <p class="font-weight-normal m-0 text-muted">Jumlah Pelupusan Harta Pegawai</p>
                                            <h4 class="font-weight-normal m-0 text-primary">{{$listC}}</h4>
                                        </div>
                                      </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                            <!-- Card -->
                            <div class="card border-0 rounded-lg">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon w-100">
                                            <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" class="w-50"></i>
                                        </div>
                                        <!-- Text -->
                                        <a href="{{route('user.harta.FormD.senaraihartaD')}}">
                                        <div class="small-card-text w-100 text-center">
                                            <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Syarikat</p>
                                            <h4 class="font-weight-normal m-0 text-primary">{{$listD}}</h4>
                                        </div>
                                      </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                            <!-- Card -->
                            <div class="card border-0 rounded-lg">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon w-100">
                                            <!-- <i class="far fa-money-bill-alt card-icon-bg-primary fa-4x"></i> -->
                                            <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" class="w-50"></i>
                                        </div>
                                        <!-- Text -->
                                        <a href="{{route('user.harta.FormG.senaraihartaG')}}">
                                        <div class="small-card-text w-100 text-center">
                                            <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Saham Pegawai</p>
                                            <h4 class="font-weight-normal m-0 text-primary">{{$listG}}</h4>
                                        </div>
                                      </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                <div class="card-title" align="center"><b>TATACARA PENGGUNAAN UNTUK MENGISI PERMOHONAN</b></div>
                <div class="card rounded-lg">
                    <div class="card-body">
                      <div  align="center">
                        <img src="{{ asset('qbadminui/img/landing.png') }}" alt="img" style="width:80%; height:80%;">
                      </div>
                    </div>
                </div>
                <br>


                <div class="card rounded-lg">
                  <div class="card-body">
                    <div class="card-title" align="center"><b>PERISYTIHARAN HADIAH</b></div>
                    <div class="small-cards mt-5 mb-4">
                      <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                        </div>
                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <a class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" href="{{ route('user.hadiah.gift') }}">
                            <!-- Card -->
                            <div class="card border-0 rounded-lg">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">

                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img" class="w-50"></i>
                                            <p class="font-weight-normal m-0 text-muted">Penerimaan Hadiah bernilai atas dari RM {{$nilai_hadiah->nilai_hadiah}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>

                      <!-- Col sm 6, col md 6, col lg 3 -->
                      <a class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" href="{{ route('user.hadiah.giftB') }}">
                          <!-- Card -->
                          <div class="card border-0 rounded-lg">
                              <!-- Card body -->
                              <div class="card-body">

                                  <div class="d-flex flex-row justify-content-center align-items-center">

                                      <!-- Text -->
                                      <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_B icon.png') }}" alt="img" class="w-50"></i>

                                          <p class="font-weight-normal m-0 text-muted">Penerimaan Hadiah bawah dari RM {{$nilai_hadiah->nilai_hadiah}}</p>
                                      </div>
                                  </div>

                                </div>
                            </div>
                          </a>
                        </div>
                    </div>
                </div>

            <br>
                <div class="row">
                    <div class="card-body">
                      <div class="card-title" align="center"><b>PERISYTIHARAN HARTA</b></div>
                      <table class="table-responsive">
                        <tr>
                          <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" href="{{route('user.perakuanharta.formA')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img" class="w-50"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perakuan Tiada Penambahan Harta</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </td>
                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" href="{{route('user.harta.FormB.formB')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" class="w-50"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Harta Baharu Pegawai</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </td>
                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg"  href="{{route('user.harta.FormC.formC')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" class="w-50"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Pelupusan Harta Pegawai</p>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" href="{{route('user.harta.FormD.formD')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" class="w-50"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Syarikat dan Perniagaan Sendiri</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </td>

                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" href="{{route('user.harta.FormG.formG')}}">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" class="w-50"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Borang Bagi Memohon dan Memiliki Saham</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </td>
                      </tr>
                      </table>
                    </div>
                    </div>
                  </div>
          </div>
    </div>



@endsection
