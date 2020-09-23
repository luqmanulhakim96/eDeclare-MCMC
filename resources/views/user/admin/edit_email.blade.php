@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="col-md-12 mt-4">
              <!-- Basic tabs card -->
              <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="page-body p-4 text-dark">
                        <div class="page-heading border-bottom d-flex flex-row">
                          <h5 class="font-weight-normal">Templat Emel Baharu</h5>
                          </div>
                            <br>
                            <form action="{{route('emel.update', $info->id)}} "method="post">
                              @csrf
                              <div class="row">
                                <div class="col-md-6">
                                  <p>Jenis</p>
                                </div>
                                <div class="col-md-6">
                                  <p>Kepada</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <select id="jenis" class="custom-select  bg-light" name="jenis">
                                      <option value="" selected disabled hidden>Pilih Jenis Templat</option>
                                      <option value="Perisytiharan Harta Baharu" {{ $info->jenis == "Perisytiharan Harta Baharu" ? 'selected' : '' }}>Perisytiharan Harta Baharu</option>
                                      <option value="Perisytiharan Hadiah Baharu" {{ $info->jenis == "Perisytiharan Hadiah Baharu" ? 'selected' : '' }}>Perisytiharan Hadiah Baharu</option>
                                      <option value="Perisytiharan Tidak Lengkap (Harta)" {{ $info->jenis == "Perisytiharan Tidak Lengkap (Harta)" ? 'selected' : '' }}>Perisytiharan Tidak Lengkap (Harta)</option>
                                      <option value="Perisytiharan Tidak Lengkap (Hadiah)" {{ $info->jenis == "Perisytiharan Tidak Lengkap (Hadiah)" ? 'selected' : '' }}>Perisytiharan Tidak Lengkap (Hadiah)</option>
                                      <option value="Proses ke Ketua Jabatan Integriti (Harta)" {{ $info->jenis == "Proses ke Ketua Jabatan Integriti (Harta)" ? 'selected' : '' }}>Proses ke Ketua Jabatan Integriti (Harta)</option>
                                      <option value="Proses ke Ketua Jabatan Integriti (Hadiah)" {{ $info->jenis == "Proses ke Ketua Jabatan Integriti (Hadiah)" ? 'selected' : '' }}>Proses ke Ketua Jabatan Integriti (Hadiah)</option>
                                      <option value="Proses ke Ketua Bahagian (Harta)"{{ $info->jenis == "Proses ke Ketua Bahagian (Harta)" ? 'selected' : '' }}>Proses ke Ketua Bahagian (Harta)</option>
                                      <option value="Proses ke Ketua Bahagian (Hadiah)"{{ $info->jenis == "Proses ke Ketua Bahagian (Hadiah)" ? 'selected' : '' }}>Proses ke Ketua Bahagian (Hadiah)</option>
                                      <option value="Perisytiharan Harta Diterima"{{ $info->jenis == "Perisytiharan Harta Diterima" ? 'selected' : '' }}>Perisytiharan Harta Diterima</option>
                                      <option value="Perisytiharan Harta Gagal"{{ $info->jenis == "Perisytiharan Harta Gagal" ? 'selected' : '' }}>Perisytiharan Harta Gagal</option>
                                      <option value="Perisytiharan Hadiah Diterima"{{ $info->jenis == "Perisytiharan Hadiah Diterima" ? 'selected' : '' }}>Perisytiharan Hadiah Diterima</option>
                                      <option value="Perisytiharan Hadiah Gagal"{{ $info->jenis == "Perisytiharan Hadiah Gagal" ? 'selected' : '' }}>Perisytiharan Hadiah Gagal</option>
                                      </select>
                                </div>
                                <div class="col-md-6">
                                  <select id="penerima" class="custom-select  bg-light" name="penerima" value="{{ old('penerima')}}" >
                                      <option value="" selected disabled hidden>Pilih Penerima</option>
                                      <option value="Pentadbir Sistem" {{ $info->penerima == "Pentadbir Sistem" ? 'selected' : '' }}>Pentadbir Sistem</option>
                                      <option value="Ketua Jabatan Integriti"{{ $info->penerima == "Ketua Jabatan Integriti" ? 'selected' : '' }}>Ketua Jabatan Integriti</option>
                                      <option value="Ketua Bahagian"{{ $info->penerima == "Ketua Bahagian" ? 'selected' : '' }}>Ketua Bahagian</option>
                                      <option value="Pengguna"{{ $info->penerima == "Pengguna" ? 'selected' : '' }}>Pengguna</option>
                                      </select>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-6">
                                  <p>Subjek</p>
                                </div>
                                <div class="col-md-6">
                                  <p>Tajuk</p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type="text" class="form-control bg-light" name="subjek" value="{{$info->subjek}}">
                                </div>
                                <div class="col-md-6">
                                  <input type="text" class="form-control bg-light" name="tajuk" value="{{$info->tajuk}}">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group form-inline justify-content-center">
                                        <!-- <label for="testing">Kandungan</label> -->
                                        <textarea type="text" class="form-control bg-light text-center" name="kandungan" id="kandungan" aria-describedby="kandungan" >{{$info->kandungan}}</textarea>
                                        <small id="testing" class="form-text text-secondary"></small>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <center>
                              <input class="btn btn-primary" type="submit" value="Kemaskini"></input>
                            </center>
                              </form>
                          </div>
                    </div>
                </div>
          </div>
        <script>
          tinymce.init({
              selector:'#kandungan',
              // inline: true5
              width: 1000,
              // width: 794,
              height: 700,
          });
        </script>

@endsection
