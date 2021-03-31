@extends('user.layouts.app')

@section('content')
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<div class="page-body p-4 text-dark">

  <!-- Small card component -->
  <div class="small-cards mt-5 mb-4">
      <div class="row">
          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormB.senaraihartaB')}}">
              <!-- Card -->
              <div class="card border rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" width="20%"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center" >
                              <!-- <p class="font-weight-normal m-0 text-muted">Lampiran B:</p> -->
                              <p class="font-weight-normal m-0 text-primary">Senarai Perisytiharan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>

          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormC.senaraihartaC')}}">
              <!-- Card -->
              <div class="card border rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" width="20%"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <!-- <p class="font-weight-normal m-0 text-muted">Lampiran C:</p> -->
                              <p class="font-weight-normal m-0 text-primary">Senarai Pelupusan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>
      <br>
      <!-- Col sm 6, col md 6, col lg 3 -->
      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormD.senaraihartaD')}}">
          <!-- Card -->
          <div class="card border rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" width="20%"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center" >
                          <!-- <p class="font-weight-normal m-0 text-muted">Lampiran D:</p> -->
                          <p class="font-weight-normal m-0 text-primary">Senarai Perisytiharan Syarikat</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>

      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormG.senaraihartaG')}}">
          <!-- Card -->
          <div class="card border rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" width="20%"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center" >
                          <!-- <p class="font-weight-normal m-0 text-muted">Lampiran G:</p> -->
                          <p class="font-weight-normal m-0 text-primary">Senarai Memohon dan Memiliki Saham</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>
  </div>
  </div>
</div>



@endsection
