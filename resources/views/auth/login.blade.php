@extends('layouts.app_auth')
@section('content')
<head>
  <style media="screen">
  .card {
    box-shadow: 5px 10px #b8c2cc !important;
    /* background-color: #efefef; */
}
  </style>
</head>
@if ($message = Session::get('success'))
    <div id=alert>
        <div class="alert alert-card  alert-success" role="alert">
            <strong>Success! </strong>
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @elseif ($message = Session::get('error'))
    <div id="alert">
      <div class="alert alert-card  alert-danger" role="alert">
          <strong>Error! </strong>
          {{$message}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
    @endif

    <div class="row d-flex justify-content-center align-items-center" style="padding-top:6%; padding-bottom:5%;">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <center>
        <div class="" style="background:white;" >
            <!-- Login card -->

            <div class="card mx-0 mx-md-0 border-1 rounded-lg" style="width: 80%;">
                <div class="card-body" style="width: 100%;">
                    <!-- Row -->
                    <div class="row d-flex justify-content-center align-items-center">
                        <!-- Left side -->
                        <div class="col-md-12 border-0">
                            <!-- Brand -->
                            <div class=" m-3 m-md-0 d-flex justify-content-center align-items-center">
                                <h5 style="font-size: 1.15rem;">Sila masukkan username dan kata laluan anda.</h5>
                            </div>
                            <br>



                            <form method="POST" action="{{ route('login') }}" >
                                @csrf

                                @foreach ($errors->all() as $message)
                                  <div class="alert alert-danger">
                                      {{ $message }}
                                  </div>
                                @endforeach

                                <!-- Email -->
                                <div class="form-group mb-2" style="text-align:right;">
                                    <!-- <label for="email" class="text-muted">Username</label> -->
                                    <div class="row">
                                      <div class="col-md-4">
                                        <h5 style="font-size: 1.15rem;">Username:</h5>
                                      </div>
                                      <div class="col md-6">
                                        <input id="samaccountname" type="text" class="form-control" name="samaccountname" value="{{ old('samaccountname') }}" required autocomplete="samaccountname" autofocus>
                                      </div>
                                      <div class="col-md-2">

                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <h5 style="font-size: 1.15rem;">Kata Laluan:</h5>
                                      </div>
                                      <div class="col md-6">
                                          <input id="Passeord" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                      </div>
                                      <div class="col-md-2">

                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-7">
                                      </div>
                                      <div class="col md-3">
                                          <button style="width:100%;" type="submit" class="btn btn-danger">Log Masuk</button>
                                      </div>
                                      <div class="col-md-2">

                                      </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      </center>
      </div>
      <div class="col-md-3">
      </div>
    </div>





@endsection
