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
                                  <select id="jenis" class="custom-select  bg-light" name="jenis" value="{{ old('jenis')}}" onchange="gettype(this);" required>
                                      <option value="" selected disabled hidden>Pilih Jenis Templat</option>
                                      <option value="Perisytiharan Harta Baharu">Perisytiharan Harta Baharu</option>
                                      <option value="Perisytiharan Hadiah Baharu">Perisytiharan Hadiah Baharu</option>
                                      <option value="Perisytiharan Tidak Lengkap (Harta)">Perisytiharan Tidak Lengkap (Harta)</option>
                                      <option value="Perisytiharan Tidak Lengkap (Hadiah)">Perisytiharan Tidak Lengkap (Hadiah)</option>
                                      <option value="Proses ke Ketua Jabatan Integriti (Harta)">Proses ke Ketua Jabatan Integriti (Harta)</option>
                                      <option value="Proses ke Ketua Jabatan Integriti (Hadiah)">Proses ke Ketua Jabatan Integriti (Hadiah)</option>
                                      <option value="Proses ke Ketua Bahagian (Harta)">Proses ke Ketua Bahagian (Harta)</option>
                                      <option value="Proses ke Ketua Bahagian (Hadiah)">Proses ke Ketua Bahagian (Hadiah)</option>
                                      <option value="Perisytiharan Harta Diterima">Perisytiharan Harta Diterima</option>
                                      <option value="Perisytiharan Harta Gagal">Perisytiharan Harta Gagal</option>
                                      <option value="Perisytiharan Hadiah Diterima">Perisytiharan Hadiah Diterima</option>
                                      <option value="Perisytiharan Hadiah Gagal">Perisytiharan Hadiah Gagal</option>
                                      </select>
                                </div>
                                <div class="col-md-6">

                                  <input type="text" id="penerima" class="form-control bg-light" name="penerima" value="{{ old('penerima')}}" style="display: none;" readonly>
                                  <select id="select_penerima" class="custom-select  bg-light" name="penerima" value="{{ old('penerima')}}" style="display: block;" >
                                      <option value="" selected disabled hidden>Pilih Penerima</option>
                                      <option value="Pentadbir Sistem">Pentadbir Sistem</option>
                                      <option value="Ketua Jabatan Integriti">Ketua Jabatan Integriti</option>
                                      <option value="Ketua Bahagian">Ketua Bahagian</option>
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
          <br><br><br><br>
        <script>
          tinymce.init({
              selector:'#kandungan',
              // inline: true5
              width: 1000,
              // width: 794,
              height: 700,
          });
        </script>
        <script type="text/javascript">
        function gettype(sel)
        {
          // alert(sel.value);
          if(sel.value == "Perisytiharan Harta Baharu"){
            document.getElementById("select_penerima").style.display ="block";
            document.getElementById("penerima").style.display ="none";
          }
          else if(sel.value == "Perisytiharan Hadiah Baharu"){
            document.getElementById("select_penerima").style.display ="block";
            document.getElementById("penerima").style.display ="none";
          }
          else if(sel.value == "Perisytiharan Tidak Lengkap (Harta)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
          else if(sel.value == "Perisytiharan Tidak Lengkap (Hadiah)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
          else if(sel.value == "Proses ke Ketua Jabatan Integriti (Harta)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Ketua Jabatan Integriti";
          }
          else if(sel.value == "Proses ke Ketua Jabatan Integriti (Hadiah)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Ketua Jabatan Integriti";
          }
          else if(sel.value == "Proses ke Ketua Bahagian (Harta)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Ketua Bahagian";
          }
          else if(sel.value == "Proses ke Ketua Bahagian (Hadiah)"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Ketua Bahagian";
          }
          else if(sel.value == "Perisytiharan Harta Diterima"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
          else if(sel.value == "Perisytiharan Harta Gagal"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
          else if(sel.value == "Perisytiharan Hadiah Diterima"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
          else if(sel.value == "Perisytiharan Hadiah Gagal"){
            document.getElementById("penerima").style.display ="block";
            document.getElementById("select_penerima").style.display ="none";
            document.getElementById("penerima").value = "Pengguna";
          }
        }
        </script>

@endsection
