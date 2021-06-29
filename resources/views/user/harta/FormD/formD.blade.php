@extends('user.layouts.app')
@section('content')
          <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran D: Perisytiharan Syarikat dan Perniagaan Sendiri</h5>
               </div>

             <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('d.submit')}}" method="POST" name="Ds" enctype="multipart/form-data">
                                @csrf
                                @foreach($staffinfo as $data)
                                  <input type="hidden" name="no_staff" value="{{$data->STAFFNO}}">
                                @endforeach
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          <input type="hidden" name="nama_pegawai"  value="{{Auth::user()->name }}">{{Auth::user()->name }}
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
                                              <input type="hidden" name="kad_pengenalan" value="{{$ic->ICNUMBER}}">{{$ic->ICNUMBER}}
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
                                            @foreach($staffinfo as $data)
                                              <input type="hidden" name="jawatan" value="{{$data->GRADE}}">{{$data->GRADE}}
                                            @endforeach
                                          <!-- <input type="hidden" name="jawatan"  value="{{Auth::user()->jawatan }}">{{Auth::user()->jawatan }} -->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @foreach($staffinfo as $jabatan)
                                              <input type="hidden" name="jabatan" value="{{ucwords(strtolower($jabatan->OLEVEL5NAME))}}">{{ucwords(strtolower($jabatan->OLEVEL5NAME))}}
                                            @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <p><b>2. KETERANGAN MENGENAI SYARIKAT / PERNIAGAAN</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">i) Nama Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="nama_syarikat" placeholder="Nama Syarikat/Perniagaan" value="{{ old('nama_syarikat')}}" >
                                        @error('nama_syarikat')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>

                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">ii) No. Pendaftaran</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_syarikat" placeholder="No Pendaftaran Syarikat/Perniagaan" value="{{ old('no_pendaftaran_syarikat')}}" >
                                          @error('no_pendaftaran_syarikat')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>

                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">iii) Alamat Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="alamat_syarikat" placeholder="Alamat Syarikat / Perniagaan" value="{{ old('alamat_syarikat')}}">
                                          @error('alamat_syarikat')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>

                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">iv) Jenis Syarikat / Perniagaan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_syarikat" placeholder="Jenis Syarikat / Perniagaan" value="{{ old('jenis_syarikat')}}" >
                                        @error('jenis_syarikat')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">v) Pulangan Perniagaan Tahunan</p>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" type="text" name="pulangan_tahunan" placeholder="Pulangan Perniagaan Tahunan" value="{{ old('pulangan_tahunan')}}" >
                                       @error('pulangan_tahunan')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                    </div>

                                 </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">vi) Modal Dibenarkan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" type="text" name="modal_syarikat" placeholder="Modal Dibenarkan" value="{{ old('modal_syarikat')}}" >
                                        @error('modal_syarikat')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                      <p class="required">vii) Modal Berbayar (Paid Up Capital)</p>
                                  </div>
                                  <div class="col-md-8">
                                      <input class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" type="text" name="modal_dibayar" placeholder="Modal Dibayar" value="{{ old('modal_dibayar')}}" >
                                      @error('modal_dibayar')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                  </div>

                               </div>
                               <br>
                               <div class="row">
                                 <div class="col-md-4">
                                     <p class="required">viii) Punca Kewangan Syarikat / Perniagaan</p>
                                 </div>
                                 <div class="col-md-8">
                                     <input class="form-control bg-light" type="text" name="punca_kewangan" placeholder="Punca Kewangan Syarikat / Perniagaan"  value="{{ old('punca_kewangan')}}" >
                                     @error('punca_kewangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                 </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-6">
                                    <p>ix) Nama ahli keluarga yang terlibat dalam perniagaan / syarikat</p>
                                </div>
                              </div>
                              <br>
                              <input type="hidden" name="counter" value="0" id="counter">

                                <div class="row">
                                   <div class="col-md-2">
                                       <p><b>Nama</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Hubungan</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Jawatan dalam syarikat</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Jumlah saham dipegang (unit)</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Nilai saham</b></p>
                                   </div>
                                </div>

                                <div class="table_keluarga">
                                <div class="row">
                                   <div class="col-md-2">
                                       <input class="form-control bg-light" type="text" name="nama_ahli[]" value="{{ old('nama_ahli[]')}}">
                                       @error('nama_ahli[]')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                   </div>
                                   <div class="col-md-2">
                                     <div class="dropdown-example d-flex justify-content-betwen">
                                    <!-- Basic one -->
                                     <div class="dropdown">
                                            <select id="select" class="custom-select  bg-light" name="hubungan[]"  value="{{ old('hubungan[]')}}">
                                                <option selected hidden></option>
                                                <option value="Isteri" {{ old('hubungan[]') == "Isteri" ? 'selected' : '' }}>Isteri</option>
                                                <option value="Suami" {{ old('hubungan[]') == "Suami" ? 'selected' : '' }}>Suami</option>
                                                <option value="Anak" {{ old('hubungan[]') == "Anak" ? 'selected' : '' }}>Anak</option>
                                                <option value="Lain-lain" {{ old('hubungan[]') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                            @error('hubungan[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                    </div>
                                   </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="dropdown-example d-flex justify-content-betwen">
                                    <!-- Basic one -->
                                     <div class="dropdown">
                                          <select id="select-1" class="custom-select  bg-light" name="jawatan_syarikat[]"  value="{{ old('jawatan_syarikat[]')}}">
                                              <option selected hidden></option>
                                              <option value="Pemilik Saham" {{ old('jawatan_syarikat[]') == "Pemilik Saham" ? 'selected' : '' }}>Pemilik Saham</option>
                                              <option value="Pengarah/ Lembaga Pengarah" {{ old('jawatan_syarikat[]') == "Pengarah/ Lembaga Pengarah" ? 'selected' : '' }}>Pengarah/ Lembaga Pengarah</option>
                                          </select>
                                          @error('jawatan_syarikat')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                    </div>
                                   </div>
                                   </div>
                                   <div class="col-md-2">
                                       <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_saham[]"value="{{ old('jumlah_saham[]')}}">
                                       @error('jumlah_saham[]')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                   </div>
                                   <div class="col-md-2">
                                       <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="nilai_saham[]" value="{{ old('nilai_saham[]')}}">
                                       @error('nilai_saham')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                   </div>
                                   <button class="add_field_button" >Tambah</button>
                                   </div>
                                   <br>
                              </div>

                              <!--script-->
                              <script type="text/javascript">
                              $(document).ready(function() {
                            	// var max_fields      = 10; //maximum input boxes allowed
                            	var wrapper   		= $(".table_keluarga"); //Fields wrapper
                            	var add_button      = $(".add_field_button"); //Add button ID
                              var counter = document.getElementById("counter").value;

                            	$(add_button).click(function(e){ //on add input button click
                            		e.preventDefault();
                                  counter++;

                            			$(wrapper).append('<div id="div'+counter+'" class="row"><div class="col-md-2"><input class="form-control bg-light" type="text" name="nama_ahli['+
                                  counter+
                                  ']" placeholder=" "></div><div class="col-md-2"><div class="dropdown-example d-flex justify-content-betwen"><div class="dropdown"><select id="select" class="custom-select  bg-light" name="hubungan['+
                                  counter+
                                  ']"><option selected disabled hidden>Pilih Hubungan</option><option value="Isteri">Isteri</option><option value="Suami">Suami</option><option value="Anak">Anak</option><option value="Lain-Lain">Lain-Lain</option></select></div></div></div><div class="col-md-2"><div class="dropdown-example d-flex justify-content-betwen"><div class="dropdown"><select id="select-1" class="custom-select  bg-light" name="jawatan_syarikat['+
                                  counter+
                                  ']"><option selected disabled hidden>Pilih Jawatan</option><option value="Pemilik Saham">Pemilik Saham</option><option value="Pengarah/ Lembaga Pengarah">Pengarah/ Lembaga Pengarah</option></select></div></div></div><div class="col-md-2"><input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_saham['+
                                  counter+
                                  ']" placeholder=" "></div><div class="col-md-2"> <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="nilai_saham['+
                                  counter+
                                  ']" placeholder=" "></div><a onClick="removeData(this, '+
                                  counter+
                                  ' ); return false;" id ="button'+counter+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br><div><br></div><br></div>'); //add input box

                            	});


                            });

                              </script>
                              <script type="text/javascript">
                              function removeData(e,counter){
                              //  $(e).parents('div'+counter+'').remove();
                              console.log('masuk');
                                $('#div'+counter+'').remove();
                                $('#button'+counter+'').remove();
                                //var counter = document.getElementById("counter").value;
                                //counter--;
                              //  doctype.getElementById("counter").value = counter;
                              }
                            </script>
                              <br>
                              <!--upload dokumen syarikat-->
                              <div class="row">
                                 <div class="col-md-6">
                                     <p class="required"><b>3. DOKUMEN SYARIKAT</b></p>
                                 </div>
                              </div>
                               <div class="row">
                                  <div class="col-md-6">
                                      <p>Bersama-sama in disertakan 'Sijil Pendaftaran Syarikat'</p>
                                  </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <label for="dokumen_syarikat">Muatnaik Dokumen Syarikat:</label>
                                      <input type="file" class="form-control bg-light" id="dokumen_syarikat" name="dokumen_syarikat[]" aria-describedby="dokumen_syarikat" multiple>
                                        <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                        @error('dokumen_syarikat[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                 </div>

                             </div>
                             <br>
                             <br>
                             <div class="row">
                               <div class="col-md-1" align="right">
                                 <input type="checkbox" name="pengakuan" value="pengakuan pegawai">
                               </div>
                               <div class="col-md-11">
                                   <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
                                   @error('pengakuan')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                               </div>

                             </div>
                                  <!-- button -->
                                  <div class="row">
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
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

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
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                      
                                                      </div>
                                                  </div>
                                                  </div>
                                              </div>
                              </form>
                          </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
      </div>
      <br><br><br><br>
           <script>
           function onlyNumberKey(evt, element) {
              var charCode = (evt.which) ? evt.which : event.keyCode
              if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
                return false;
              else {
                var len = $(element).val().length;
                var index = $(element).val().indexOf('.');
                if (index > 0 && charCode == 46) {
                  return false;
                }
                if (index > 0) {
                  var CharAfterdot = (len + 1) - index;
                  if (CharAfterdot > 3) {
                    return false;
                  }
                }

              }
              return true;
            }
           </script>

@endsection
