@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran C: Borang Pelupusan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="#">
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Name">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="No. Kad Pengenalan">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Jawatan / Gred">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Alamat Tempat Bertugas">
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p><b>2. KETERANGAN MENGENAI PELUPUSAN HARTA</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_harta">
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum">
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Hubungan dengan Pemilik">
                                      </div>
                                  </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pelupusan">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). Jika dijual, Nyatakan nilai jualan.</p>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_lupus" placeholder="Cara Pelupusan">
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nilai_jualan" placeholder="Nilai Jualan">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="pengakuan" value="pengakuan_pegawai" required>
                                        <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang ini adalah lengkap dan benar.</label><br>
                                    </div>
                                  </div>
                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4"href="{{ route('user.formB') }}">Kembali</a>
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4"href="{{ route('user.formD') }}">Seterusnya</a>
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Seterusnya</button> -->
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
