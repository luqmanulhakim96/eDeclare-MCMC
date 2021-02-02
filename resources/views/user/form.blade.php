@extends('user.layouts.app')

@section('content')
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<div class="page-body p-4 text-dark">

  @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

  <div class="small-cards mt-5 mb-4" >
    <div class="row">
          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-1 mt-4 mt-lg-0"></a>
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.perakuanharta.formA')}}">
          <!-- <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0"> -->
              <!-- Card -->
              <div class="card border-0 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img" class="w-50"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran A:</p>
                              <p class="font-weight-normal m-0 text-primary">Perakuan Tiada Penambahan Harta</p>
                          </div>
                      </div>

                  </div>
              </div>
          <!-- </div> -->
        </a>

          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormB.formB')}}">
              <!-- Card -->
              <div class="card border-0 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" class="w-50"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran B:</p>
                              <p class="font-weight-normal m-0 text-primary">Borang Perisytiharan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>

          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormC.formC')}}">
              <!-- Card -->
              <div class="card border-0 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" class="w-50"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran C:</p>
                              <p class="font-weight-normal m-0 text-primary">Borang Pelupusan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>
        </div>
        </div>

      <!-- </div> -->
      <br>
      <div class="row" align="center">
      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0"></a>
      <!-- Col sm 6, col md 6, col lg 3 -->
      <!-- <div class="col-sm-8 col-md-8 col-lg-2 mt-2 mt-lg-0"></div> -->
      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormD.formD')}}">
          <!-- Card -->
          <div class="card border-0 rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" class="w-50"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <p class="font-weight-normal m-0 text-muted">Lampiran D:</p>
                          <p class="font-weight-normal m-0 text-primary">Perisytiharan Syarikat dan Perniagaan Sendiri</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>

      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormG.formG')}}">
          <!-- Card -->
          <div class="card border-0 rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" class="w-50"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <p class="font-weight-normal m-0 text-muted">Lampiran E:</p>
                          <p class="font-weight-normal m-0 text-primary">Borang Memohon dan Memiliki Saham</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>
  </div>
  </div>



@endsection
