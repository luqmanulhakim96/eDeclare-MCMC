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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tarikh Notifikasi Mengikut Status</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Kandungan Notifikasi</a>
                                            </li>
                                            
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <div class="page-body p-4 text-dark">
                                              <div class="row mt-10">
                                                <div class="col-md-12 mt-4">
                                                      <!-- Light Bordered Table card -->
                                                      <div class="card rounded-lg">
                                                              <!-- Table -->
                                                              <div class="table-responsive">
                                                                  <table class="table table-bordered">
                                                                      <thead>
                                                                          <tr class="text-center">
                                                                              <th width="10%"><p class="mb-0">#</p></th>
                                                                              <th width="50%"><p class="mb-0">Status</p></th>
                                                                              <th width="20%"><p class="mb-0">Simbol</p></th>
                                                                              <th width="50%"><p class="mb-0">Tempoh Notifikasi</p></th>
                                                                              <th width="50%"><p class="mb-0">Tindakan</p></th>

                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">1</p></td>
                                                                              <td><p class="mb-0">Selesai</p></td>
                                                                              <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                                                              <td><input type="text" class="form-control bg-light" placeholder="Tempoh Notifikasi (Hari)"></td>
                                                                              <td><a class="btn btn-primary mt-2"href="#">Set</a></td>
                                                                          </tr>

                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">2</p></td>
                                                                              <td><p class="mb-0">Tidak Lengkap</p></td>
                                                                              <td><span class="badge badge-warning badge-pill">Tidak Lengkap</span></td>
                                                                              <td><input type="text" class="form-control bg-light" placeholder="Tempoh Notifikasi (Hari)"></td>
                                                                              <td><a class="btn btn-primary mt-2"href="#">Set</a></td>
                                                                          </tr>

                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">3</p></td>
                                                                              <td><p class="mb-0">Dibatalkan</p></td>
                                                                              <td><span class="badge badge-danger badge-pill">Dibatalkan</span></td>
                                                                              <td><input type="text" class="form-control bg-light" placeholder="Tempoh Notifikasi (Hari)"></td>
                                                                              <td><a class="btn btn-primary mt-2"href="#">Set</a></td>
                                                                          </tr>

                                                                      </tbody>
                                                                  </table>
                                                              </div>

                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>

                                        </div>

                                      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <div class="col-md-12">
                                                <p><b>Kandungan Notifikasi E-mel</b></p>
                                            </div>
                                            <div class="col-md-4">
                                              <form action="#">
                                                <textarea name="content" rows="15" cols="100"></textarea>
                                                <br><br>
                                                <input type="submit">
                                                </form>
                                            </div>
                                            </div>
                                          </div>
                                      </div>

                                      </div>
                              </div>
                            </div>
                        </div>

@endsection
