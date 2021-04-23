@extends('user.layouts.welcome')

@section('content')

<div class="page-body p-4 text-dark" style="margin-top: -4%;">

                <!-- Small card component -->
                <!-- <div class="card rounded-lg">
                <div class="card-body">
                      <div class="card-titleuser" align="center"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                </div>
                </div> -->
                <div class="small-cards mt-5 mb-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" >
                           <!-- Card -->
                           <a href="{{route('user.harta.FormB.senaraihartaB')}}">
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/img/papan-01.png') }}); background-repeat: no-repeat; background-position: 23% 77%; ">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah<br>Perisytiharan Harta Pegawai</p>
                                       </div>
                                       <!-- Text -->
                                       <div class="small-card-text w-100 text-center">
                                           <h1 style="color: black !important;">{{$listB}}</h1>
                                       </div>
                                   </div>

                               </div>
                           </div>
                           </a>
                       </div>


                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" >
                           <!-- Card -->
                           <a href="{{route('user.harta.FormC.senaraihartaC')}}">
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/img/papan-02.png') }}); background-repeat: no-repeat; background-position: 23% 77%; " >
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah <br>Pelupusan Harta Pegawai</p>
                                       </div>
                                       <!-- Text -->
                                       <div class="small-card-text w-100 text-center">
                                           <h1 style="color: black !important;">{{$listC}}</h1>
                                       </div>
                                   </div>

                               </div>
                           </div>
                           </a>
                       </div>

                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" >
                           <!-- Card -->
                           <a href="{{route('user.harta.FormD.senaraihartaD')}}">
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/img/papan-03.png') }}); background-repeat: no-repeat; background-position: 23% 77%; ">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah<br>Perisytiharan Syarikat</p>
                                       </div>
                                       <!-- Text -->
                                       <div class="small-card-text w-100 text-center">
                                           <h1 style="color: black !important;">{{$listD}}</h1>
                                       </div>
                                   </div>

                               </div>
                           </div>
                           </a>
                       </div>


                        <!-- Col sm 6, col md 6, col lg 3 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" >
                           <!-- Card -->
                           <a href="{{route('user.harta.FormG.senaraihartaG')}}">
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/img/papan-04.png') }}); background-repeat: no-repeat; background-position: 23% 77%;">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah<br>Perisytiharan Saham Pegawai</p>
                                       </div>
                                       <!-- Text -->
                                       <div class="small-card-text w-100 text-center">
                                           <h1 style="color: black !important;">{{$listG}}</h1>
                                       </div>
                                   </div>

                               </div>
                           </div>
                           </a>
                       </div>




                    </div>
                    <br>

                <div class="card-title" align="center"><b>TATACARA PENGGUNAAN UNTUK MENGISI PERMOHONAN</b></div>
                <div class="row">
                    <div class="col md-6">
                      <div class="card rounded-lg">
                          <div class="card-body">
                            <div  align="center">
                              <img src="{{ asset('qbadminui/img/tatacara-harta.png') }}" alt="img" width="70%">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col md-6">
                      <div class="card rounded-lg">
                          <div class="card-body">
                            <div  align="center">
                              <img src="{{ asset('qbadminui/img/tatacara-hadiah.png') }}" alt="img" width="70%">
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <br>

          <div class="row">
            <div class="col-md-6">
              <div class="card-title" align="center"><b>PERISYTIHARAN HADIAH</b></div>
                <div class="card rounded-lg" style="padding-left: 3%;padding-right: 3%;">
                    <div class="small-cards mt-3 mb-3">
                      <div class="row">
                        <div class="col-md-6">
                          <center>
                          <a href="{{ route('user.hadiah.gift') }}">
                          <div class="card rounded-lg" style="background-color: #ffff;">
                              <!-- Card body -->
                              <div class="card-body">

                                  <div class="d-flex flex-row justify-content-center align-items-center">
                                      <!-- Icon -->
                                      <div class="small-card-icon">
                                         <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Hadiah bernilai atas dari <br>RM {{$nilai_hadiah->nilai_hadiah}}</p>
                                      </div>
                                      <!-- Text -->
                                      <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img"  width="50%"></i>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          </a>
                        </center>
                        </div>

                        <div class="col-md-6">
                          <center>
                          <a href="{{ route('user.hadiah.giftB') }}">
                          <div class="card rounded-lg" style="background-color: #ffff;">
                              <!-- Card body -->
                              <div class="card-body">

                                  <div class="d-flex flex-row justify-content-center align-items-center">
                                      <!-- Icon -->
                                      <div class="small-card-icon">
                                         <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Hadiah bernilai bawah dari<br> RM {{$nilai_hadiah->nilai_hadiah}}</p>
                                      </div>
                                      <!-- Text -->
                                      <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_B icon.png') }}" alt="img"  width="50%"></i>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          </a>
                        </CENTER>
                        </div>

                        </div>
                    </div>
              </div>
            </div>
            <br>
            <div class="col-md-6">
              <div class="card-title" align="center"><b>PERISYTIHARAN HARTA</b></div>
              <div class="card rounded-lg" style="padding-left: 3%;padding-right: 3%;">
                  <div class="small-cards mt-3 mb-3" style="">

                    <div class="row">
                      <div class="col-md-6">
                        <center>
                        <a href="{{route('user.perakuanharta.formA')}}">
                        <div class="card rounded-lg" style="background-color: #ffff;">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon">
                                       <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Perakuan Tiada Penambahan Harta</p>
                                    </div>
                                    <!-- Text -->
                                    <div class="small-card-text w-100 text-center">
                                        <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img"  width="50%"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </a>
                      </center>
                      </div>

                      <div class="col-md-6">
                        <center>
                        <a href="{{route('user.harta.FormB.formB')}}">
                        <div class="card rounded-lg" style="background-color: #ffff;">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon">
                                       <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Perisytiharan Harta Baharu</p>
                                    </div>
                                    <!-- Text -->
                                    <div class="small-card-text w-100 text-center">
                                        <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img"  width="46%"></i>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </a>
                      </center>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <center>
                      <a href="{{route('user.harta.FormC.formC')}}">
                      <div class="card rounded-lg" style="background-color: #ffff;">
                          <!-- Card body -->
                          <div class="card-body">

                              <div class="d-flex flex-row justify-content-center align-items-center">
                                  <!-- Icon -->
                                  <div class="small-card-icon">
                                     <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Perisytiharan Pelupusan Harta</p>
                                  </div>
                                  <!-- Text -->
                                  <div class="small-card-text w-100 text-center">
                                      <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img"  width="50%"></i>
                                  </div>
                              </div>

                          </div>
                      </div>
                      </a>
                    </center>
                    </div>

                    <div class="col-md-6">
                      <center>
                      <a href="{{route('user.harta.FormD.formD')}}">
                      <div class="card rounded-lg" style="background-color: #ffff;">
                          <!-- Card body -->
                          <div class="card-body">

                              <div class="d-flex flex-row justify-content-center align-items-center">
                                  <!-- Icon -->
                                  <div class="small-card-icon">
                                     <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Perisytiharan Syarikat</p>
                                  </div>
                                  <!-- Text -->
                                  <div class="small-card-text w-100 text-center">
                                      <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img"  width="45%"></i>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </a>
                    </center>
                  </div>
                </div>
                <br>
                  <div class="row">
                    <center>
                      <div class="col-md-6">
                        <a href="{{route('user.harta.FormG.formG')}}">
                        <div class="card rounded-lg" style="background-color: #ffff;">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon">
                                       <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Perisytiharan Memiliki Saham</p>
                                    </div>
                                    <!-- Text -->
                                    <div class="small-card-text w-100 text-center">
                                        <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img"  width="50%"></i>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </a>
                    </div>
                    </center>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
