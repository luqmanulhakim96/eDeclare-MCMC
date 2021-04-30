@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal">Borang A: PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH DI BAWAH PERATURAN 10, PERATURAN-PERATURAN TATATERTIB SKMM 2007 DAN SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN
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
                                              <input type="hidden" name="nama_pegawai" value="{{Auth::user()->name }}">{{Auth::user()->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @foreach($staffinfo as $ic)
                                              <input type="hidden" name="no_kad_pengenalan" value="{{$ic->ICNUMBER}}">{{$ic->ICNUMBER}}
                                            @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @foreach($staffinfo as $ic)
                                              <input type="hidden" name="jawatan" value="{{$ic->GRADE}}">{{$ic->GRADE}}
                                            @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <select  class="custom-select  bg-light" name="jabatan" value="{{ old('jabatan')}}" >
                                                <option value="" selected disabled hidden>Jabatan</option>

                                                @foreach($jabatan as $jabatan)

                                                <option value="{{$jabatan->OLEVEL5NAME}}" {{ old('jabatan') =="$jabatan->OLEVEL5NAME" ? 'selected' :'' }}>{{ucwords(strtolower($jabatan->OLEVEL5NAME))}}</option>

                                                @endforeach

                                                </select>
                                              <!-- <input type="text" class="form-control bg-light" placeholder="Jabatan / Bahagian" name="jabatan" value="{{old('jabatan')}}"> -->
                                              @error('jabatan')
                                              <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                              </div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Bahagian</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <select id="jenis_harta" class="custom-select  bg-light" name="bahagian" value="{{ old('bahagian')}}" >
                                                <option value="" selected disabled hidden>Bahagian</option>

                                                @foreach($bahagian as $bahagian)

                                                <option value="{{$bahagian->OLEVEL4NAME}}" {{ old('bahagian') =="$bahagian->OLEVEL4NAME" ? 'selected' :'' }}>{{ucwords(strtolower($bahagian->OLEVEL4NAME))}}</option>

                                                @endforeach

                                                </select>
                                              <!-- <input type="text" class="form-control bg-light" placeholder="Bahagian" name="bahagian" value="{{old('bahagian')}}"> -->
                                              @error('bahagian')
                                              <div class="alert alert-danger">
                                                <strong>{{ $message }}</strong>
                                              </div>
                                              @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <p><b>2. KETERANGAN MENGENAI HADIAH</b></p>
                                      </div>
                                  </div>
                                  <!-- <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">i) Jenis</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_hadiah" id="jenis_hadiah" placeholder="Jenis Hadiah" required>
                                      </div>
                                      @error('jenis_hadiah')
                                      <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                      </div>
                                      @enderror
                                  </div> -->
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">i) Jenis Hadiah</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input id="jenis_gift" list="hadiah" class="custom-select  bg-light" name="jenis_gift" value="{{ old('jenis_gift')}}" placeholder="Sila masukkan jenis hadiah" autocomplete="off" >
                                          <datalist id="hadiah">
                                            <option value="" selected disabled hidden>Jenis Hadiah</option>

                                            @foreach($jenisHadiah as $data)
                                            @if($data->status_jenis_hadiah == "Aktif")
                                            <option value="{{$data->jenis_gift}}">{{$data->jenis_gift}}</option>
                                            @endif
                                            @endforeach
                                          </datalist>
                                        </input>
                                      </div>
                                      @error('jenis_gift')
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
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="nilai_hadiah" value="{{ old('nilai_hadiah')}}" id="nilai_hadiah" placeholder="Nilai Hadiah/ Anggaran Nilai" >
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
                                          <input class="form-control bg-light" id="datefield" type="date" name="tarikh_diterima" value="{{ old('tarikh_diterima')}}" id="tarikh_diterima" placeholder="Tarikh Hadiah Diterima" >
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
                                        <input class="form-control bg-light" type="text" name="nama_pemberi" value="{{ old('nama_pemberi')}}" id="nama_pemberi" placeholder="Nama Pemberi Hadiah" >
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
                                       <input class="form-control bg-light" type="text" name="alamat_pemberi" value="{{ old('alamat_pemberi')}}" id="alamat_pemberi" placeholder="Alamat Pemberi" >
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
                                       <p class="required">vi) Hubungan Pemberi</p>
                                   </div>
                                   <div class="col-md-8">
                                     <input id="hubungan_pemberi" list="hubungan" class="custom-select  bg-light" name="hubungan_pemberi" value="{{ old('hubungan_pemberi')}}" placeholder="Hubungan Pemberi" autocomplete="off" >
                                       <datalist id="hubungan">
                                         <option value="" selected disabled hidden>Pilih Hubungan</option>
                                         <option value="Suami/Isteri">Suami/Isteri</option>
                                         <option value="Rakan">Rakan</option>
                                       </datalist>
                                     </input>
                                      <!-- <input class="form-control bg-light" type="text" name="hubungan_pemberi" value="{{ old('hubungan_pemberi')}}" id="hubungan_pemberi" placeholder="Hubungan Pemberi" > -->
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
                                        <p class="required">vii)Sebab Diberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="sebab_diberi" value="{{ old('sebab_diberi')}}" id="sebab_diberi" placeholder="Sebab Diberi" >
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
                                     <p class="required"><b>3. LAMPIRAN HADIAH YANG DITERIMA</b></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <label for="dokumen_syarikat">Sila lampirkan gambar/dokumen mengenai hadiah yang diterima:</label>
                                      <input type="file" class="form-control bg-light" id="gambar_hadiah" name="gambar_hadiah" aria-describedby="gambar_hadiah"  >
                                        <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                        @error('dokumen_syarikat')
                                        <div class="alert alert-danger">
                                          <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                 </div>

                             </div>
                             <br>
                             <br>
                             <div class="row">
                                 <div class="col-md-1" align="right">
                                   <input type="checkbox" name="pengakuan" value="pengakuan_pegawai" ></div>
                                   <div class="col-md-11">
                                   <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar.
                                      Sekiranya terdapat sebarang maklumat yang palsu dan meragukan, perisytiharan saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC</label><br>
                                 </div>
                                 @error('pengakuan')
                                 <div class="alert alert-danger">
                                   <strong>{{ $message }}</strong>
                                 </div>
                                 @enderror
                             </div>



                                  <!-- button -->
                                 <div class="row">
                                  <!-- <div class="col-md-9">
                                  </div>
                                  <div class="col-md-3">
                                    <button type="submit" onclick=" return confirm('Simpan maklumat?');" class="btn btn-primary mt-4" name="save">Simpan</button>

                                    <button type="submit" onclick=" return confirm('Hantar maklumat?');" class="btn btn-primary mt-4" name="publish">Hantar</button>
                                  </div> -->
                                  <div class="col-md-9">
                                    </div>
                                    <div class="col-md-3">
                                      <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#save" >Simpan</button>
                                      <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
                                      </div>
                                          <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-sm" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>
                                                  <div class="modal-body">
                                                  <p align="center">Simpan maklumat perisytiharan?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                                  <button type="submit" class="btn btn-danger" name="save">Ya</button>
                                                  </div>
                                              </div>
                                              </div>
                                          </div>

                                            <div class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p align="center">Hantar maklumat perisytiharan?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                                    <button type="submit" class="btn btn-danger" name="publish">Ya</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
           <script type="text/javascript">
           var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
             if(dd<10){
                    dd='0'+dd
                }
                if(mm<10){
                    mm='0'+mm
                }

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("datefield").setAttribute("max", today);
            </script>
            <script>
            function onlyNumberKey(evt) {

                // Only ASCII charactar in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
            </script>
@endsection
