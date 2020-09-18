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
                            <form action="{{route('email.submit')}} "method="post">
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
                                  <select id="jenis" class="custom-select  bg-light" name="jenis" value="{{ old('jenis')}}" required>
                                      <option value="" selected disabled hidden>Pilih Jenis Templat</option>
                                      <option value="Perisytiharan Berjaya">Perisytiharan Berjaya</option>
                                      <option value="Perisytiharan Gagal">Perisytiharan Gagal</option>
                                      <option value="Proses ke Ketua Jabatan Integriti">Proses ke Ketua Jabatan Integriti</option>
                                      <option value="Proses ke Ketua Bahagian">Proses ke Ketua Bahagian</option>
                                      </select>
                                </div>
                                <div class="col-md-6">
                                  <select id="penerima" class="custom-select  bg-light" name="penerima" value="{{ old('penerima')}}" required>
                                      <option value="" selected disabled hidden>Pilih Penerima</option>
                                      <option value="Pentadbir Sistem">Pentadbir Sistem</option>
                                      <option value="Ketua Jabatan Integriti">Ketua Jabatan Integriti</option>
                                      <option value="Ketua Bahagian">Ketua Bahagian</option>
                                      <option value="Pengguna">Pengguna</option>
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
                                  <input type="text" class="form-control bg-light" name="subjek">
                                </div>
                                <div class="col-md-6">
                                  <input type="text" class="form-control bg-light" name="tajuk">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group form-inline justify-content-center">
                                        <!-- <label for="testing">Kandungan</label> -->
                                        <textarea type="text" class="form-control bg-light text-center" name="kandungan" id="kandungan" aria-describedby="kandungan" placeholder="" ></textarea>
                                        <small id="testing" class="form-text text-secondary"></small>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <center>
                              <input class="btn btn-primary" type="submit" value="Simpan"></input>
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
