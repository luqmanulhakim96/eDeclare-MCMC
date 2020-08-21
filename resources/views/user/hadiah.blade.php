@extends('user.layouts.app')

@section('content')
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<div class="page-body p-4 text-dark">

  <!-- Small card component -->
  <div class="small-cards mt-5 mb-4">
      <div class="row">
        <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{ route('user.hadiah.giftB') }}">

        </a>
          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{ route('user.hadiah.gift') }}">
          <!-- <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0"> -->
              <!-- Card -->
              <div class="card border-0 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img" class="w-50"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran A:</p>
                              <p class="font-weight-normal m-0 text-primary">PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH BERNILAI LEBIH DARIPADA RM {{ $nilai_hadiah->nilai_hadiah}}</p>
                          </div>
                      </div>

                  </div>
              </div>
          <!-- </div> -->
        </a>

          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{ route('user.hadiah.giftB') }}">
              <!-- Card -->
              <div class="card border-0 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/prize_B icon.png') }}" alt="img" class="w-50"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran B:</p>
                              <p class="font-weight-normal m-0 text-primary">PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH BERNILAI RM {{ $nilai_hadiah->nilai_hadiah}} DAN KE BAWAH</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>

          <!-- Col sm 6, col md 6, col lg 3 -->


      </div>
      <br>
      <div class="row">

      <!-- Col sm 6, col md 6, col lg 3 -->
      <div class="col-sm-8 col-md-8 col-lg-2 mt-2 mt-lg-0"></div>



  </div>
  </div>
</div>



@endsection
