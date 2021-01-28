@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="col-md-12 mt-4">
                                <!-- Basic tabs card -->
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <div class="card-title">Tetapan Kandungan Notifikasi</div>
                                        <!-- Nav tabs -->
                                        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist"> -->
                                            <!-- <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tarikh Notifikasi Mengikut Status</a>
                                            </li> -->
                                            <!-- <li class="nav-item"> -->
                                            <!-- <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Kandungan Notifikasi</a> -->
                                            <!-- </li> -->

                                        <!-- </ul> -->

                                        <!-- Tab panes -->
                                        <!-- <div class="tab-content"> -->
                                            <!-- <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <div class="page-body p-4 text-dark">
                                              <div class="row mt-10">
                                                <div class="col-md-12 mt-4">

                                                      <div class="card rounded-lg">

                                                              <div class="table-responsive">
                                                                  <table class="table table-bordered">
                                                                      <thead>
                                                                          <tr class="text-center">
                                                                              <th width="10%"><p class="mb-0">Bil</p></th>
                                                                              <th width="50%"><p class="mb-0">Status</p></th>
                                                                              <th width="50%"><p class="mb-0">Tempoh Notifikasi</p></th>
                                                                              <th width="50%"><p class="mb-0">Tindakan</p></th>

                                                                          </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @foreach($listTempohNotifikasi as $data)
                                                                        <form action ="{{route('tempoh_notifikasi.update', $data->id)}}" method="post">
                                                                          @csrf

                                                                          <tr class="text-center">
                                                                              <td><p class="mb-0 font-weight-bold">{{$data ->id}}</p></td>
                                                                              <td>
                                                                                @if($data->status == "Diterima")
                                                                                <span class="badge badge-success badge-pill">{{$data->status}}</span>
                                                                                @elseif ($data->status == "Tidak Lengkap")
                                                                                <span class="badge badge-warning badge-pill">{{$data->status}}</span>
                                                                                @else
                                                                                <span class="badge badge-danger badge-pill">{{$data->status}}</span>
                                                                                @endif
                                                                              </td>
                                                                              <td><input type="text" name="tempoh_notifikasi" class="form-control bg-light" placeholder="Tempoh Notifikasi (Hari)" value="{{$data->tempoh_notifikasi}}"></td>
                                                                              <td><button class="btn btn-primary mt-2" type="submit" onclick=" return confirm('Set Tempoh Notifikasi?');">Set</button></td>
                                                                          </tr>
                                                                          </form>
                                                                          @endforeach

                                                                      </tbody>
                                                                  </table>
                                                              </div>

                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>

                                        </div> -->

                                      <!-- <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
                                        <div class="page-body p-4 text-dark">
                                          <div class="col-md-12 mt-4" >
                                              <!-- basic light table card -->

                                                  <div class="card-body">
                                                      <div class="card-title"> Senarai Templat Emel</div>
                                                      <div class="row">
                                                        <a class="btn btn-primary" href="{{route('user.admin.template_email')}}">Tambah</a>
                                                      </div>
                                                      <br>
                                                      <!-- Table -->
                                                      <div class="table-responsive">
                                                          <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                                              <thead class="thead-light">
                                                                  <tr class="text-center">
                                                                      <th><p class="mb-0">ID</p></th>
                                                                      <th><p class="mb-0">Jenis</p></th>
                                                                      <th><p class="mb-0">Penerima</p></th>
                                                                      <th><p class="mb-0">Tajuk</p></th>
                                                                      <th><p class="mb-0">Subjek</p></th>
                                                                      <th><p class="mb-0">Tindakan</p></th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody align="center">
                                                                @foreach($listEmel as $data)
                                                                <tr>
                                                                  <td>{{$data->id}}</td>

                                                                  <td>{{$data->jenis}}</td>

                                                                  <td>{{$data->penerima}}</td>

                                                                  <td>{{$data->tajuk}}</td>

                                                                  <td>{{$data->subjek}}</td>

                                                                  <td>
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a class="btn btn-success mr-1" href="{{route('emel.edit',$data->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                                                        <a class="btn btn-danger mr-1" href="{{route('emel.delete',$data->id)}}"><i class="fas fa-trash"></i></a>
                                                                    </div>

                                                                  </td>
                                                                </tr>
                                                                @endforeach

                                                              </tbody>
                                                          </table>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>

                                        </div>
                                      </div>

                                      </div>
                              <!-- </div>
                            </div> -->

@endsection
