@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="col-md-12 mt-4">
                                <!-- Basic tabs card -->
                                <div class="card rounded-lg">
                                    <div class="card-body">
                                        <div class="card-title">Tetapan Sistem</div>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tetapan Hadiah</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tetapan Jenis Hadiah</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="jenisharta-tab" data-toggle="tab" href="#jenisharta" role="tab" aria-controls="jenisharta" aria-selected="false">Tetapan Jenis Harta</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <div class="page-body p-4 text-dark">
                                                <div class="col mt-10">
                                                  <div class="col-md-12">
                                                      Nilai Minimum Terkini Hadiah Yang Diterima
                                                      <button class="btn btn-ripple btn-raised btn-success m-2" > RM {{$nilaiHadiah->nilai_hadiah}}</button>
                                                  </div>
                                                  <br>
                                                  <div class="col-md-12">
                                                      <p>Nilai Hadiah Yang Diterima</p>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <form action="{{route('nilaiGift.update', $nilaiHadiah->id)}}" method="post">
                                                      @csrf
                                                      <div class="form-group">
                                                          <input type="text" class="form-control bg-light" name="nilai_hadiah" placeholder="Nilai Hadiah Yang Diterima (RM)">
                                                          <br>
                                                          <!-- <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Kemaskini</button> -->
                                                          <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#nilaihadiah" >Kemaskini</button>
                                                          <!-- <input type="submit"> -->
                                                      </div>
                                                      <div class="modal fade" id="nilaihadiah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog modal-sm" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                              </button>
                                                              </div>
                                                              <div class="modal-body">
                                                              <p align="center">Kemaskini Nilai Hadiah ?</p>
                                                              </div>
                                                              <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                              <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                              </div>
                                                          </div>
                                                          </div>
                                                      </div>
                                                    </form>
                                                  </div>
                                                  </div>
                                                </div>
                                        </div>

                                      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <br>
                                            <div class="col-md-12">
                                                <p>Tambah Jenis Hadiah</p>
                                            </div>
                                            <div class="col-md-4">
                                              <form action="{{route('jenishadiah.submit')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control bg-light" name="jenis_gift" placeholder="Jenis Hadiah ">
                                                    <br>
                                                    <!-- <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Tambah</button> -->
                                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#jenishadiah" >Tambah</button>
                                                </div>
                                                <div class="modal fade" id="jenishadiah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p align="center">Tambah Jenis Hadiah ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                            <div class="col-md-8">
                                                  <table class="table table-striped table-bordered" >
                                                    <thead class="thead-light">
                                                      <tr>
                                                        <th>ID</th>
                                                        <th>Jenis Hadiah</th>
                                                        <th>Padam</th>
                                                      </tr>
                                                  </thead>
                                                    @foreach($jenisHadiah as $data)
                                                    <form action="{{route('jenishadiah.delete')}}" method="POST">
                                                      @csrf
                                                    <tr align="center">
                                                      @if($data->status_jenis_hadiah == "Aktif")
                                                      <td><input type="hidden" name="id" value="{{$data->id}}">{{$data->id}}</td>
                                                      <td><input type="hidden" name="jenis_gift" value=" {{$data->jenis_gift}}">{{$data->jenis_gift}}
                                                        <input type="hidden" name="status_jenis_hadiah" value=" {{$data->status_jenis_hadiah}}">
                                                      </td>
                                                      <td><a type="button"  data-toggle="modal" data-target="#padamhadiah{{$data->id}}" ><i class="fas fa-times-circle"></i></a></td>
                                                        @endif
                                                    </tr>
                                                    <div class="modal fade" id="padamhadiah{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p align="center">Tambah Jenis Harta ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                    @endforeach
                                                  </table>
                                                </div>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="tab-pane" id="jenisharta" role="tabpanel" aria-labelledby="jenisharta-tab">
                                        <div class="page-body p-4 text-dark">
                                          <div class="col mt-10">
                                            <br>
                                            <div class="col-md-12">
                                                <p>Tambah Jenis Harta</p>
                                            </div>
                                            <div class="col-md-4">
                                              <form action="{{route('jenisharta.submit')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control bg-light" name="jenis_harta" placeholder="Jenis Harta ">
                                                    <br>
                                                    <!-- <button type="submit" class="btn btn-ripple btn-raised btn-info m-2">Tambah</button> -->
                                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#jenisharta1" >Tambah</button>
                                                </div>
                                                <div class="modal fade" id="jenisharta1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p align="center">Tambah Jenis Harta ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                            <div class="col-md-8">
                                                  <table class="table table-striped table-bordered" >
                                                    <thead class="thead-light">
                                                      <tr>
                                                        <th>ID</th>
                                                        <th>Jenis Hadiah</th>
                                                        <th>Padam</th>
                                                      </tr>
                                                  </thead>
                                                    @foreach($jenisHarta as $data)
                                                    <form action="{{route('jenisharta.delete')}}" method="POST">
                                                      @csrf
                                                    <tr align="center">
                                                      @if($data->status_jenis_harta == "Aktif")
                                                      <td><input type="hidden" name="id" value="{{$data->id}}">{{$data->id}}</td>
                                                      <td><input type="hidden" name="jenis_harta" value=" {{$data->jenis_harta}}">{{$data->jenis_harta}}
                                                        <input type="hidden" name="status_jenis_harta" value=" {{$data->status_jenis_harta}}">
                                                      </td>
                                                      <td><a type="button"  data-toggle="modal" data-target="#padamharta{{$data->id}}" ><i class="fas fa-times-circle"></i></a></td>
                                                        @endif
                                                    </tr>
                                                    <div class="modal fade" id="padamharta{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p align="center">Tambah Jenis Harta ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div
                                                  </form>
                                                    @endforeach
                                                  </table>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>

@endsection
