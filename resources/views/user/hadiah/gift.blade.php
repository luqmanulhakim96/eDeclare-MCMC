@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal">Lampiran A: PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH DI BAWAH PERATURAN 10, PERATURAN-PERATURAN TATATERTIB SKMM 2007 DAN SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN
                                                BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI LEBIH DARIPADA RM {{ $nilaiHadiah ->nilai_hadiah }}</p>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('gift.submit')}}" method="post" id="gift.submit" enctype="multipart/form-data">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->name }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->kad_pengenalan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          <b>{{Auth::user()->jawatan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan/ Bahagian</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Jabatan / Bahagian" name="jabatan">
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <p><b>2. KETERANGAN MENGENAI HADIAH</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>i) Jenis</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_hadiah" id="jenis_hadiah" placeholder="Jenis Hadiah" required>
                                      </div>
                                      @error('jenis_hadiah')
                                      <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                      @enderror
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) Nilai/ Anggaran Nilai</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_hadiah" id="nilai_hadiah" placeholder="Nilai Hadiah/ Anggaran Nilai" required>
                                      </div>
                                      @error('nilai_hadiah')
                                      <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                      @enderror
                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Tarikh diterima</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_diterima" id="tarikh_diterima" placeholder="Tarikh Hadiah Diterima" required>
                                      </div>
                                      @error('tarikh_diterima')
                                      <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                      @enderror
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Nama Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="nama_pemberi" id="nama_pemberi" placeholder="Nama Pemberi Hadiah" required>
                                    </div>
                                    @error('nama_pemberi')
                                    <div class="alert alert-danger">
                                      <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Alamat Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control bg-light" type="text" name="alamat_pemberi" id="alamat_pemberi" placeholder="Alamat Pemberi" required>
                                    </div>
                                    @error('alamat_pemberi')
                                    <div class="alert alert-danger">
                                      <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                 </div>
                                 <br>
                                 <div class="row">
                                   <div class="col-md-4">
                                       <p>v) Hubungan Pemberi</p>
                                   </div>
                                   <div class="col-md-8">
                                      <input class="form-control bg-light" type="text" name="hubungan_pemberi" id="hubungan_pemberi" placeholder="Hubungan Pemberi" required>
                                   </div>
                                   @error('hubungan_pemberi')
                                   <div class="alert alert-danger">
                                     <strong>{{ $message }}</strong>
                                   </div>
                                   @enderror
                                </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi)Sebab Diberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="sebab_diberi" id="sebab_diberi" placeholder="Sebab Diberi" required>
                                    </div>
                                    @error('sebab_diberi')
                                    <div class="alert alert-danger">
                                      <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <br>
                              <!--upload gambar hadiah-->
                              <div class="row">
                                 <div class="col-md-6">
                                     <p><b>3. GAMBAR HADIAH YANG DITERIMA</b></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <label for="dokumen_syarikat">Sila lampirkan gambar hadiah yang diterima:</label>
                                      <input type="file" class="form-control bg-light" id="gambar_hadiah" name="gambar_hadiah" aria-describedby="dokumen_syarikat" onchange="return fileValidation()" required>
                                        <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                 </div>
                                 @error('gambar_hadiah')
                                 <div class="alert alert-danger">
                                   <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>
                             <br>
                             <br>
                             <div class="row">
                                 <div class="col-md-1" align="right">
                                   <input type="checkbox" name="pengakuan" value="pengakuan_pegawai" required></div>
                                   <div class="col-md-11">
                                   <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar.
                                      Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan dirujuk kepada Jawatankuasa Tatatertib MCMC</label><br>
                                 </div>
                             </div>
                                  <!-- button -->
                                 <div class="row">
                                  <div class="col-md-10">
                                  </div>
                                  <div class="col-md-2">
                                    <button type="submit" onclick=" return confirm('Hantar maklumat?');" class="btn btn-primary mt-4">Hantar</button>
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
           <script>
              function fileValidation() {
                  var fileInput =
                      document.getElementById('gambar_hadiah');

                  var filePath = fileInput.value;

                  // Allowing file type
                  var allowedExtensions =
                          /(\.jpg|\.jpeg|\.png)$/i;

                  if (!allowedExtensions.exec(filePath)) {
                      alert('Sila muat naik gambar berformat .jpg, .jpeg dan .png sahaja.');
                      fileInput.value = '';
                      return false;
                  }
              }
          </script>
@endsection
