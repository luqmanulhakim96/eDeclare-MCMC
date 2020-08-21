@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="col-md-12 mt-4">
                                <!-- Basic tabs card -->
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <div class="card-title">Konfigurasi Sistem</div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tetapan Hadiah</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Jenis Hadiah</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <div class="page-body p-4 text-dark">
                                                <div class="col mt-10">
                                                  <div class="col-md-12">
                                                      Nilai Minimum Terkini Hadiah Yang Diterima
                                                      <button class="btn btn-ripple btn-raised btn-success m-2" > RM {{$listHadiah->nilai_hadiah}}</button>
                                                  </div>
                                                  <br>
                                                  <div class="col-md-12">
                                                      <p>Nilai Hadiah Yang Diterima</p>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <form action="{{route('nilaiGift.update', $listHadiah->id)}}" method="post">
                                                      @csrf
                                                      <div class="form-group">
                                                          <input type="text" class="form-control bg-light" name="nilai_hadiah" placeholder="Nilai Hadiah Yang Diterima (RM)">
                                                          <br>
                                                          <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Kemaskini</button>
                                                          <!-- <input type="submit"> -->
                                                      </div>
                                                    </form>
                                                  </div>
                                                  </div>
                                                </div>

                                        </div>

                                      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <div class="col-md-12">
                                                <p>Nilai Hadiah Yang Diterima</p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control bg-light" placeholder="Nilai Hadiah Yang Diterima (RM)">
                                                    <br>
                                                    <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Kemaskini</button>
                                                    <!-- <input type="submit">Kemaskini</input> -->
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

@endsection
