@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="col-md-12 mt-4">
                                <!-- Basic tabs card -->
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <div class="card-title">Sistem Konfigurasi</div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Susun Atur Sistem</a>
                                            </li>
                                            <li class="nav-item">
                                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Log Masuk</a>
                                            </li>

                                            <li class="nav-item">
                                            <a class="nav-link" id="jenisharta-tab" data-toggle="tab" href="#jenisharta" role="tab" aria-controls="jenisharta" aria-selected="false">Tetapan Tempoh Notifikasi</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <div class="page-body p-4 text-dark">

                                                @foreach($route as $data)
                                                <form action="{{route('layout.update')}}" method="post">
                                                  @csrf
                                                @if($data -> jawatan == "Pentadbir Sistem")
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <p>Jawatan</p>
                                                    <input type="hidden" name="id_admin" value="{{ $data->id }}">
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <input type="text" class="form-control bg-light" name="jawatan_admin" value="{{$data->jawatan}}" readonly>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <input type="checkbox" id="menu1" name="layout1_admin" value="1" @foreach($admin as $checkbox) @if($checkbox == '1') checked @endif @endforeach > Tetapan Sistem
                                                    <br>
                                                    <input type="checkbox" id="menu2" name="layout2_admin" value="2" @foreach($admin as $checkbox) @if($checkbox == '2') checked @endif @endforeach > Sistem Notifikasi
                                                    <!-- <label for="menu2"> Sistem Notifikasi</label><br> -->
                                                  </div>
                                                </div>
                                                @endif
                                                <br>

                                                @if($data -> jawatan == "IT Admin")
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <p>Jawatan</p>
                                                    <input type="hidden" name="id_itadmin" value="{{ $data->id }}">
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <input type="text" class="form-control bg-light" name="jawatan_it" value="{{$data->jawatan}}" readonly>
                                                  </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <input type="checkbox" id="menu1" name="layout1_it" value="1" @foreach($itadmin as $checkbox) @if($checkbox == '1') checked @endif @endforeach > Tetapan Sistem
                                                    <br>
                                                    <input type="checkbox" id="menu2" name="layout2_it" value="2" @foreach($itadmin as $checkbox) @if($checkbox == '2') checked @endif @endforeach > Sistem Notifikasi
                                                  </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                <br>
                                                  <div class="row">
                                                    <button class="btn btn-primary" type="submit" name="button">Hantar</button>
                                                  </div>
                                              </form>
                                              </div>
                                        </div>

                                       <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <br>

                                            <div class="col-md-4">
                                              <form action="{{route('auth.submit', $auth->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Had Percubaan</p>
                                                        <input type="text" class="form-control bg-light" value="{{$auth->max_attempts}}" name="max_attempts" placeholder="Had Percubaan ">
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Tempoh Percubaan Semula (Minit)</p>
                                                        <input type="text" class="form-control bg-light" value="{{$auth->decay_minutes}}" name="decay_minutes" placeholder="Tempoh Percubaan Semula ">
                                                    </div>
                                                  </div>
                                                  <br>
                                                  <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Tambah</button>
                                                </div>
                                              </form>
                                            </div>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="tab-pane" id="jenisharta" role="tabpanel" aria-labelledby="jenisharta-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <br>
                                            <div class="col-md-12">
                                                <p>Sila setkan tempoh masa notifikasi yang akan dihantar ke setiap pengguna.</p>
                                            </div>

                                              <form action="{{route('duration.submit')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                  <div class="row">
                                                  <div class="col-md-2">
                                                    <label for="years">Tahun</label>
                                                    <input type="text" class="form-control bg-light" name="years" placeholder="Tahun" value="{{ $duration->years/365 }}">
                                                  </div>
                                                  <div class="col-md-2">
                                                    <label for="months">Bulan</label>
                                                    <input type="text" class="form-control bg-light" name="months" placeholder="Bulan" value="{{ $duration->months/30 }}">
                                                  </div>
                                                  <div class="col-md-2">
                                                    <label for="days">Hari</label>
                                                    <input type="text" class="form-control bg-light" name="days" placeholder="Hari" value="{{ $duration->days }}">
                                                  </div>
                                                  <button type="submit" class="btn btn-ripple btn-raised btn-info m-3">Set</button>
                                                </div>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <br><br>

@endsection
