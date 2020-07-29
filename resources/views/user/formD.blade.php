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
               @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

             <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('asset.post3')}}" method="POST">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->alamat_tempat_bertugas }}
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
                                        <p>i) Nama Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="nama_syarikat" placeholder="Nama Syarikat/Perniagaan" value="{{ session()->get('asset.nama_syarikat') }}">
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) No. Pendaftaran</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_syarikat" placeholder="No Pendaftaran Syarikat/Perniagaan" value="{{ session()->get('asset.no_pendaftaran_syarikat') }}">
                                      </div>
                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Alamat Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="alamat_syarikat" placeholder="Alamat Syarikat / Perniagaan" value="{{ session()->get('asset.alamat_syarikat') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Jenis Syarikat / Perniagaan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_syarikat" placeholder="Jenis Syarikat / Perniagaan" value="{{ session()->get('asset.jenis_syarikat') }}">
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Pulangan Perniagaan Tahunan</p>
                                    </div>
                                    <div class="col-md-8">
                                       <input class="form-control bg-light" type="text" name="pulangan_tahunan" placeholder="Pulangan Perniagaan Tahunan" value="{{ session()->get('asset.pulangan_tahunan') }}">
                                    </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi) Modal Dibenarkan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="modal_syarikat" placeholder="Modal Dibenarkan" value="{{ session()->get('asset.modal_syarikat') }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                      <p>vii) Modal Berbayar (Paid Up Capital)</p>
                                  </div>
                                  <div class="col-md-8">
                                      <input class="form-control bg-light" type="text" name="modal_dibayar" placeholder="Modal Dibayar" value="{{ session()->get('asset.modal_dibayar') }}">
                                  </div>
                               </div>
                               <br>
                               <div class="row">
                                 <div class="col-md-4">
                                     <p>viii) Punca Kewangan Syarikat / Perniagaan</p>
                                 </div>
                                 <div class="col-md-8">
                                     <input class="form-control bg-light" type="text" name="punca_kewangan" placeholder=" "  value="{{ session()->get('asset.punca_kewangan') }}">
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
                                       <input class="form-control bg-light" type="text" name="nama_ahli" placeholder=" "  value="{{ session()->get('asset.nama_ahli') }}">
                                   </div>
                                   <div class="col-md-2">
                                     <div class="dropdown-example d-flex justify-content-betwen">
                                    <!-- Basic one -->
                                     <div class="dropdown">
                                            <select id="select-1" class="custom-select  bg-light" name="hubungan"  value="{{ session()->get('asset.hubungan') }}">
                                                <option value="" selected disabled hidden>Pilih Hubungan</option>
                                                <option value="Isteri" {{ old('hubungan') == "Isteri" ? 'selected' : '' }}>Isteri</option>
                                                <option value="Suami" {{ old('hubungan') == "Suami" ? 'selected' : '' }}>Suami</option>
                                                <option value="Anak" {{ old('hubungan') == "Anak" ? 'selected' : '' }}>Anak</option>
                                                <option value="Lain-lain" {{ old('hubungan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                    </div>
                                   </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="dropdown-example d-flex justify-content-betwen">
                                    <!-- Basic one -->
                                     <div class="dropdown">
                                          <select id="select-1" class="custom-select  bg-light" name="jawatan_syarikat"  value="{{ session()->get('asset.jawatan_syarikat') }}">
                                              <option value="" selected disabled hidden>Pilih Jawatan</option>
                                              <option value="Pemilik Saham" {{ old('jawatan_syarikat') == "Pemilik Saham" ? 'selected' : '' }}>Pemilik Saham</option>
                                              <option value="Pengarah/ Lembaga Pengarah" {{ old('jawatan_syarikat') == "Pengarah/ Lembaga Pengarah" ? 'selected' : '' }}>Pengarah/ Lembaga Pengarah</option>
                                          </select>
                                    </div>
                                   </div>
                                   </div>
                                   <div class="col-md-2">
                                       <input class="form-control bg-light" type="text" name="jumlah_saham" placeholder=" "  value="{{ session()->get('asset.jumlah_saham') }}">
                                   </div>
                                   <div class="col-md-2">
                                       <input class="form-control bg-light" type="text" name="nilai_saham" placeholder=" "  value="{{ session()->get('asset.nilai_saham') }}">
                                   </div>
                                   <button class="add_field_button" >Add More Fields</button>
                                   </div>
                                   <br>
                              </div>


                              <!-- <div class="input_fields_wrap">
                                  <button class="add_field_button">Add More Fields</button>
                                  <div><input type="text" name="mytext[]"></div>
                              </div> -->

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

                            			$(wrapper).append('<div id="div'+counter+'" class="row"><div class="col-md-2"><input class="form-control bg-light" type="text" name="punca_kewangan['+
                                  counter+
                                  ']" placeholder=" "></div><div class="col-md-2"><div class="dropdown-example d-flex justify-content-betwen"><div class="dropdown"><select id="select-1" class="custom-select  bg-light" name="hubungan['+
                                  counter+
                                  ']"><option value="" selected disabled hidden>Pilih Hubungan</option><option value="Isteri">Isteri</option><option value="Suami">Suami</option><option value="Anak">Anak</option><option value="Lain-Lain">Lain-Lain</option></select></div></div></div><div class="col-md-2"><div class="dropdown-example d-flex justify-content-betwen"><div class="dropdown"><select id="select-1" class="custom-select  bg-light" name="jawatan_syarikat['+
                                  counter+
                                  ']"><option value=" " selected disabled hidden>Pilih Jawatan</option><option value="Pemilik Saham">Pemilik Saham</option><option value="Pengarah/ Lembaga Pengarah">Pengarah/ Lembaga Pengarah</option></select></div></div></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="jumlah_saham['+
                                  counter+
                                  ']" placeholder=" "></div><div class="col-md-2"> <input class="form-control bg-light" type="text" name="nilai_saham['+
                                  counter+
                                  ']" placeholder=" "></div><a onClick="removeData(this, '+
                                  counter+
                                  ' ); return false;" id ="button'+counter+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a></div></div></div>'); //add input box

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
                                     <p><b>3. DOKUMEN SYARIKAT</b></p>
                                 </div>
                              </div>
                               <div class="row">
                                  <div class="col-md-6">
                                      <p>Bersama-sama in disertakan 'Memorandum And Articles of Association'</p>
                                  </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <label for="dokumen_syarikat">Muatnaik Dokumen Syarikat:</label>
                                      <input type="file" class="form-control bg-light" id="dokumen_syarikat" name="dokumen_syarikat" aria-describedby="dokumen_syarikat">
                                        <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                 </div>
                             </div>
                             <br>
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
                                    <a class="btn btn-primary mt-4"href="{{ route('user.formC') }}">Kembali</a>
                                    <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                  </div>
                                  <div class="col-md-8">
                                  </div>
                                  <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary mt-4">Seterusnya</button>
                                    <!-- <button type="submit" class="btn btn-primary mt-4">Seterusnya</button> -->
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection