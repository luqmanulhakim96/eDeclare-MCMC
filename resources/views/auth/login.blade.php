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
    <div class="login-page d-flex flex-row justify-content-center align-items-center" style="background-image: url({{ asset('qbadminui/design/background.jpg') }});background-blend-mode: overlay;background-repeat:no-repeat;background-size:cover;">
        <!-- Login card -->

        <div class="card mx-3 mx-md-0 border-0 rounded-lg" style="width: 50%;">
            <div class="card-body">
                <!-- Row -->
                <div class="row d-flex justify-content-center align-items-center">
                    <!-- Left side -->
                    <div class="col-md-6 border-0">
                        <!-- Brand -->
                        <div class="login-brand m-3 m-md-0 d-flex justify-content-center align-items-center">

                            <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="image" class="w-50">
                        </div>



                        <form method="POST" action="{{ route('login') }}" >
                            @csrf

                            @foreach ($errors->all() as $message)
                              <div class="alert alert-danger">
                                  {{ $message }}
                              </div>
                            @endforeach

                            <!-- Email -->
                            <div class="form-group mb-2">

                                <label for="email" class="text-muted">Username</label>
                                <input id="samaccountname" type="text" class="form-control badge-pill bg-light" name="samaccountname" value="{{ old('samaccountname') }}" required autocomplete="samaccountname" autofocus>


                            </div>
                            <!-- Password -->
                            <div class="form-group mb-2">
                                <label for="Passeord" class="text-muted">Kata Laluan</label>
                                <input id="Passeord" type="password" class="form-control badge-pill bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                            </div>


                            <button type="submit" class="btn btn-primary btn-outline-primary badge-pill btn-block w-75 m-auto">Log Masuk</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
