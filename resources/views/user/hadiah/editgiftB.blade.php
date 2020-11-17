@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal">Lampiran B: LAPORAN PENERIMAAN HADIAH DIBAWAH SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI RM {{ $nilaiHadiah ->nilai_hadiah }} DAN KE BAWAH</p>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('giftB.update', $info->id)}}" method="post" id="giftB.submit" enctype="multipart/form-data">
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
                                          <p class="required">Jabatan/ Bahagian</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Jabatan / Bahagian" name="jabatan" value="{{ $info->jabatan  }}" required>
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
                                        <p class="required">i) Jenis</p>
                                      </div>
                                      <div class="col-md-8">
                                        <select id="jenis_hadiah" class="custom-select  bg-light" name="jenis_hadiah" value="{{ $info->jenis_gift  }}" required>
                                            <option value="" selected disabled hidden>Jenis Hadiah</option>
                                            @foreach($jenisHadiah as $data)
                                            @if($data->status_jenis_hadiah == "Aktif")
                                            <option value="{{$data->jenis_gift}}">{{$data->jenis_gift}}</option>
                                            @endif
                                            @endforeach
                                            </select>
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
                                          <p class="required">ii) Nilai/ Anggaran Nilai</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_hadiah" id="nilai_hadiah" placeholder="Nilai Hadiah/ Anggaran Nilai" value="{{ $info->nilai_gift  }}" required>
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
                                          <p class="required">iii) Tarikh diterima</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_diterima" id="tarikh_diterima" placeholder="Tarikh Hadiah Diterima" value="{{ $info->tarikh_diterima  }}" required>
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
                                        <p class="required">iv) Nama Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="nama_pemberi" id="nama_pemberi" placeholder="Nama Pemberi Hadiah" value="{{ $info->nama_pemberi  }}" required>
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
                                        <p class="required">v) Alamat Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control bg-light" type="text" name="alamat_pemberi" id="alamat_pemberi" placeholder="Alamat Pemberi" value="{{ $info->alamat_pemberi  }}" required>
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
                                       <p class="required">v) Hubungan Pemberi</p>
                                   </div>
                                   <div class="col-md-8">
                                      <input class="form-control bg-light" type="text" name="hubungan_pemberi" id="hubungan_pemberi" placeholder="Hubungan Pemberi" value="{{ $info->hubungan_pemberi  }}" required>
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
                                        <p class="required">vi)Sebab Diberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="sebab_diberi" id="sebab_diberi" placeholder="Sebab Diberi" value="{{ $info->sebab_gift  }}" required>
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
                                     <p class="required"><b>3. GAMBAR HADIAH YANG DITERIMA</b></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <label for="dokumen_syarikat">Sila lampirkan gambar hadiah yang diterima:</label>
                                      <input type="file" class="form-control bg-light" id="gambar_hadiah" name="gambar_hadiah" aria-describedby="dokumen_syarikat"  required>
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
                              <div class="hidden">
                                  <input class="form-control bg-light" type="text" name="status" value="{{ $info->status }}">
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
           <!-- <script>
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
          </script> -->
@endsection
