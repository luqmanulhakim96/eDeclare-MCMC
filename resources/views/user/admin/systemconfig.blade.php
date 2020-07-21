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
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pengurusan Pengguna</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Hadiah</a>
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
                                                                              <th width="50%"><p class="mb-0">Nama</p></th>
                                                                              <th width="55%"><p class="mb-0">No Kad Pengenalan</p></th>
                                                                              <th width="30%"><p class="mb-0">Jabatan</p></th>
                                                                              <th width="30%"><p class="mb-0">Jawatan</p></th>
                                                                              <th width="30%"><p class="mb-0">Status</p></th>
                                                                              <th width="50%"><p class="mb-0">Edit</p></th>
                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">1</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">Muhammad Syahdan</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">IT</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">Admin</p></td>
                                                                              <td><span class="badge badge-success badge-pill">Aktif</span></td>
                                                                              <td class="p-3">
                                                                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                                                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                                  </div>
                                                                              </td>
                                                                          </tr>

                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">2</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">Muhammad Hafiz</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">HR</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">User</p></td>
                                                                              <td><span class="badge badge-success badge-pill">Aktif</span></td>
                                                                              <td class="p-3">
                                                                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                                                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                                  </div>
                                                                              </td>
                                                                          </tr>

                                                                          <!-- Table data -->
                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">3</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">Muhammad Amirul</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">IT</p></td>
                                                                              <td><p class="mb-0 font-weight-normal">Integrity HOD</p></td>
                                                                              <td><span class="badge badge-danger badge-pill">Tidak Aktif</span></td>
                                                                              <td class="p-3">
                                                                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                                                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                                  </div>
                                                                              </td>
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
                                                <p>Nilai Hadiah Yang Diterima</p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control bg-light" placeholder="Nilai Hadiah Yang Diterima (RM)">
                                                    <br>
                                                    <input type="submit">
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                      </div>
                                      </div>
                              </div>

@endsection
