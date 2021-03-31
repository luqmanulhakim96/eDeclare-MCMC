@extends('user.layouts.app')

@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                <div class="card-body">
                      <div class="card-titleuser" align="center"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                </div>
                </div>
                <div class="small-cards mt-5 mb-4">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" >
                           <!-- Card -->
                           <a href="{{route('user.harta.FormB.senaraihartaB')}}">
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/design/card1.png') }}); background-repeat: no-repeat; background-position: 50% 67%; ">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Harta Pegawai</p>
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
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/design/card2.png') }}); background-repeat: no-repeat; background-position: 50% 71%;" >
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Pelupusan Harta Pegawai</p>
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
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/design/card3.png') }}); background-repeat: no-repeat; background-position: 33% 71%; ">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Syarikat</p>
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
                           <div class="card rounded-lg" style="background-image: url({{ asset('qbadminui/design/card4.png') }}); background-repeat: no-repeat; background-position: 30% 75%; ">
                               <!-- Card body -->
                               <div class="card-body">

                                   <div class="d-flex flex-row justify-content-center align-items-center">
                                       <!-- Icon -->
                                       <div class="small-card-icon">
                                          <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Saham Pegawai</p>
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
                              <img src="{{ asset('qbadminui/design/harta.png') }}" alt="img" width="70%">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col md-6">
                      <div class="card rounded-lg">
                          <div class="card-body">
                            <div  align="center">
                              <img src="{{ asset('qbadminui/design/hadiah .png') }}" alt="img" width="70%">
                            </div>
                          </div>
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
                            <div class="card border-0 rounded-lg" style="background-color: #ffff;">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">

                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img"  width="30%"></i>
                                            <p class="font-weight-normal m-0 text-muted">Hadiah bernilai atas dari RM {{$nilai_hadiah->nilai_hadiah}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>

                      <!-- Col sm 6, col md 6, col lg 3 -->
                      <a class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0" href="{{ route('user.hadiah.giftB') }}">
                          <!-- Card -->
                          <div class="card border-0 rounded-lg"  style="background-color: #ffff;">
                              <!-- Card body -->
                              <div class="card-body">

                                  <div class="d-flex flex-row justify-content-center align-items-center">

                                      <!-- Text -->
                                      <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/prize_B icon.png') }}" alt="img" width="30%"></i>

                                          <p class="font-weight-normal m-0 text-muted">Hadiah bernilai bawah dari RM {{$nilai_hadiah->nilai_hadiah}}</p>
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
                            <a class="card border-0 rounded-lg"  style="background-color: #ffff;" href="{{route('user.perakuanharta.formA')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img" width="30%"></i>
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
                            <a class="card border-0 rounded-lg"  style="background-color: #ffff;" href="{{route('user.harta.FormB.formB')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" width="30%"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Harta Baharu</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </td>
                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" style="background-color: #ffff;"  href="{{route('user.harta.FormC.formC')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Icon -->
                                        <div class="small-card-icon">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" width="30%"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Pelupusan Harta </p>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" style="background-color: #ffff;" href="{{route('user.harta.FormD.formD')}}">
                                <!-- Card body -->
                                <div class="card-body">

                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img"width="30%"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Syarikat </p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </td>

                        <td>
                            <!-- Card -->
                            <a class="card border-0 rounded-lg" style="background-color: #ffff;" href="{{route('user.harta.FormG.formG')}}">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <!-- Text -->
                                        <div class="small-card-text w-100 text-center">
                                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" width="30%"></i>
                                          <br>
                                          <br>
                                            <p class="font-weight-normal m-0 text-muted">Perisytiharan Memiliki Saham</p>
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
