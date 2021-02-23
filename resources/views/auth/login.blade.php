@extends('layouts.app_auth')

@section('content')
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
    <!-- Main content start -->
    <div class="login-page d-flex flex-row justify-content-center align-items-center">
        <!-- Login card -->

        <div class="card mx-3 mx-md-0 border-0 rounded-lg">
            <div class="card-body">
                <!-- Row -->
                <div class="row d-flex justify-content-center align-items-center">
                    <!-- Left side -->
                    <div class="col-md-6 border-0">
                        <!-- Brand -->
                        <div class="login-brand m-3 m-md-0 d-flex justify-content-center align-items-center">
                            <!-- <img src="{{ asset('https://upload.wikimedia.org/wikipedia/commons/f/fc/SKMM-MCMC-2014.png') }}" alt="image" class="w-25"> -->
                            <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="image" class="w-25">
                        </div>
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf
                            <h5 class="text-dark my-3">Log Masuk</h5>
                            <!-- Email -->
                            <div class="form-group mb-2">
                                <!-- <label for="email" class="text-muted">No Staff</label>
                                <input id="no_staff" type="text" class="form-control badge-pill bg-light" name="no_staff" value="{{ old('no_staff') }}" required autocomplete="no_staff" autofocus>
                                @error('no_staff')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                                <label for="email" class="text-muted">Username</label>
                                <input id="samaccountname" type="text" class="form-control badge-pill bg-light" name="samaccountname" value="{{ old('samaccountname') }}" required autocomplete="samaccountname" autofocus>
                                @error('samaccountname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>These credential does not match our records</strong>
                                    </span>
                                @enderror
                                <!-- <label for="username" class="text-muted">Username</label>
                                <input id="username" type="text" class="form-control badge-pill bg-light" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                                <!-- <label for="email" class="text-muted">Username</label>
                                <input id="userprincipalname" type="text" class="form-control badge-pill bg-light" name="userprincipalname" value="{{ old('userprincipalname') }}" required autocomplete="userprincipalname" autofocus>
                                @error('userprincipalname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <!-- Passeord -->
                            <div class="form-group mb-2">
                                <label for="Passeord" class="text-muted">Password</label>
                                <input id="Passeord" type="password" class="form-control badge-pill bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>These credential does not match our records</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Remember me checkbox -->
                            <!-- <div class="custom-control custom-checkbox">
                                <input id="my-input" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="my-input" class="custom-control-label">Remember me</label>
                            </div> -->

                            <button type="submit" class="btn btn-primary btn-outline-primary badge-pill btn-block w-75 m-auto">Sign in</button>

                            <!-- <p class="text-center mt-3">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" >Forgot Password?</a>
                                @endif
                            </p> -->
                        </form>
                    </div>
                    <!-- Right side -->
                    <!-- <div class="col-md-6 d-flex flex-column justify-content-center align-items-center pt-3 pt-md-0">
                        <button class="btn btn-raised btn-google btn-icon m-2 badge-pill btn-block w-75"><i class="fab fa-google"></i> <p class="d-inline">Sign up with Google</p></button>
                        <button class="btn btn-raised btn-facebook btn-icon m-2 badge-pill btn-block w-75"><i class="fab fa-facebook-f"></i> <p class="d-inline">Sign up with Facebook</p></button>
                        <a href="{{ route('register') }}" class="w-75"><button class="btn btn-primary btn-outline-primary badge-pill btn-block"><p class="d-inline">Sign Up</p></button></a>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
@endsection
