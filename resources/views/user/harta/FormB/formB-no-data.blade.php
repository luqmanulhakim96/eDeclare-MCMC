@extends('user.layouts.app')
@section('content')

        <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran B: Borang Perisytiharan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg" >
                          <div class="card-body">

                              <form id="formB_submit" action="{{route('b.submit')}}" method="POST">
                                @csrf

                                <div id="hidden_input" name="hidden_input">
                                  <input type="hidden" id="counter_keterangan" name="counter_keterangan" value="0">
                                  <input type="hidden" id="increment_keterangan" name="increment_keterangan" value="0">
                                </div>

                                <div id="hidden_dividen" name="hidden_dividen">
                                </div>
                                <div id="hidden_pinjaman" name="hidden_pinjaman">
                                </div>

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
                                            <!-- <input type="hidden" name="jabatan" value="{{Auth::user()->jabatan }}">{{Auth::user()->jabatan }} -->
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($maklumat_pasangan == null)
                    @else
                    <div class="row">
                      <div class="col-12 mt-4">
                           <div class="card rounded-lg">
                               <div class="card-body">

                                  <!-- keluarga -->
                                  <div class="row">
                                    <div class="col-md-4">
                                      <p><b>2.KETERANGAN MENGENAI KELUARGA</b></p>
                                    </div>
                                  </div>
                                  @foreach($maklumat_pasangan as $maklumat_pasangan)
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama Suami / Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @if($maklumat_pasangan->NOKNAME != null)
                                              <input type="hidden" name="nama_pasangan" value="{{ucwords(strtolower($maklumat_pasangan->NOKNAME))}}">{{ucwords(strtolower($maklumat_pasangan->NOKNAME))}}
                                              @else
                                              -
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>No.Kad Pengenalan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @if($maklumat_pasangan->ICNEW != null)
                                              <input type="hidden" name="ic_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->ICNEW}}
                                              @else
                                              -
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Pekerjaan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @if($maklumat_pasangan->NOKEMLOYER != NULL)
                                              <input type="hidden" name="pekerjaan_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->NOKEMLOYER}}
                                              @else
                                              -
                                              @endif
                                          </div>
                                      </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    @endif

                                    @if($maklumat_anak == null)
                                    @else
                                    @foreach($maklumat_anak as $maklumat_anak)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->NOKNAME != null)
                                              <input type="hidden" name="nama_anak" value="{{ucwords(strtolower($maklumat_anak->NOKNAME))}}">{{ucwords(strtolower($maklumat_anak->NOKNAME))}}
                                              @else
                                              -
                                              @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Umur Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              <span></span>
                                              <?php
                                                $ic = $maklumat_anak->ICNEW;
                                                if($ic != ""){
                                                    $year = substr($ic, 0, 2);
                                                    $curYear = Date('Y');
                                                    $cutoff = Date('Y') - 2000;

                                                if($year > $cutoff)
                                                {
                                                  $above = $curYear - ($year + 1900);
                                                  echo $above;
                                                }
                                                else{
                                                  $above = $curYear - ($year + 2000);
                                                  echo $above;
                                                }
                                              }
                                              ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->NOKNAME != null)
                                                <!-- <input type="hidden" name="ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}} -->
                                                <span id = "ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}}</span>
                                                @else
                                                -
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                      <hr>
                                      @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                      <div class="row">
                        <div class="col-12 mt-4">
                             <div class="card rounded-lg">
                                 <div class="card-body">
                                    <!-- pendapatan bulanan-->
                                    <div class="row">
                                      <div class="col-md-4">
                                        <p><b>3. PENDAPATAN BULANAN</b></p>
                                      </div>
                                    </div>
                                    <!-- Gaji -->
                                    <div class="row">
                                      <div class="col-md-3">
                                      </div>
                                      <div class="col-md-4">
                                        <p align="center"> PEGAWAI</p>
                                      </div>
                                      <div class="col-md-4">
                                          <p align="center"> PASANGAN</p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <p> 1) Gaji</p>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="input-group">
                                            @foreach($staffinfo as $gaji)
                                              <input type="hidden" name="gaji" value="{{$gaji->SALARY}}">{{$gaji->SALARY}}
                                            @endforeach
                                          </div>
                                      </div>
                                      <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)"  name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ old('gaji_pasangan')}}" autocomplete="off">
                                        @error('gaji_pasangan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>

                                    </div>
                                  </br>
                                <!-- imbuhan -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan')}}" autocomplete="off">
                                            @error('jumlah_imbuhan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror

                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ old('jumlah_imbuhan_pasangan')}}" autocomplete="off">
                                        @error('jumlah_imbuhan_pasangan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                  </div>
                                  <br>
                                  <!-- sewa -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> iii) Sewa Rumah/Kedai</p>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">

                                            <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ old('sewa')}}" autocomplete="off">
                                            @error('sewa')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror


                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">

                                        <input class="form-control bg-light" type="text" name="sewa_pasangan" onkeypress="return onlyNumberKey(event)" placeholder="Sewa Pasangan" value="{{ old('sewa_pasangan')}}" autocomplete="off">
                                        @error('sewa_pasangan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror

                                    </div>
                                  </div>
                                  <!-- dividen -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> iv) Dividen</p>
                                    </div>
                                  </div>
                                  <input type="hidden" name="counter_dividen" value="0" id="counter_dividen">
                                  <div id="dividen_field">
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="dividen_1[]"placeholder="Nyatakan Dividen" value="{{ old('dividen_1[]')}}" autocomplete="off">
                                            @error('dividen_1[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light"  name="dividen_1_pegawai[]" onkeypress="return onlyNumberKey(event)" id="dividen0" placeholder="Dividen Pegawai"  value="{{ old('dividen_1_pegawai[]')}}" autocomplete="off">
                                            @error('dividen_1_pegawai[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light"  name="dividen_1_pasangan[]" onkeypress="return onlyNumberKey(event)" id="dividen0" placeholder="Dividen Pasangan"  value="{{ old('dividen_1_pasangan[]')}}" autocomplete="off">
                                        @error('dividen_1_pasangan[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                    <div class="col-md-1">
                                      <button class="add_field_button" id="add_dividen_button">Tambah</button>
                                  </div>
                                  </div>
                                  <br>
                                  </div>
                            </div>
                          </div>
                        </div>
                    </div>


                <div class="row">
                  <div class="col-12 mt-4">

                       <div class="card rounded-lg">
                           <div class="card-body">

                          <div class="row">
                            <div class="col-md-4">
                              <p><b>4. KETERANGAN MENGENAI HARTA</b></p>
                            </div>
                          </div>
                          <!-- <div class="row">
                            <div class="col-md-4">
                              <p class="">Jenis Harta</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" name="jenis_harta"  placeholder="Jenis Harta"  value="{{ old('jenis_harta')}}" >
                            </div>
                          </div> -->

                          <div class="row">
                              <div class="col-md-4">
                                <p class="required">Jenis Harta</p>
                              </div>
                              <!-- input select with text -->
                              <div class="col-md-8">
                                <input id="jenis_harta" list="harta" class="custom-select  bg-light" name="jenis_harta" value="{{ old('jenis_harta')}}" placeholder="Sila masukan harta" autocomplete="off">
                                    <datalist id="harta">
                                      @foreach($jenisHarta as $jenisharta)
                                      @if($jenisharta->status_jenis_harta == "Aktif")
                                      <option value="{{$jenisharta->jenis_harta}}">{{$jenisharta->jenis_harta}}</option>
                                      @endif
                                      @endforeach
                                    </datalist>
                                    <option value="" selected disabled hidden>Jenis Harta</option>
                                  </input>
                                    <!-- @error('jenis_harta_')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror -->
                                   @foreach ($errors->get('jenis_harta_.*') as $messages)
                                    @foreach($messages as $message)
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @endforeach
                                   @endforeach
                              </div>

                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                            </div>
                            <div class="col-md-4">
                              <input class="form-control bg-light" type="text" id="pemilik_harta" name="pemilik_harta" placeholder="Nama Pemilik" value="{{ old('pemilik_harta')}}" >
                              <!-- @error('pemilik_harta_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('pemilik_harta_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>
                            <div class="col-md-4">
                                <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik" >
                                    <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                    <option value="Sendiri" {{ old('hubungan_pemilik') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                    <option value="Anak" {{ old('hubungan_pemilik') == "Anak" ? 'selected' : '' }}>Anak</option>
                                    <option value="Isteri/Suami" {{ old('hubungan_pemilik') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                    <option value="Ibu/Ayah" {{ old('hubungan_pemilik') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                    <option value="Lain-lain" {{ old('hubungan_pemilik') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                                <!-- @error('select_hubungan_')
                                   <div class="alert alert-danger">{{ $message }}</div>
                               @enderror -->
                               @foreach ($errors->get('select_hubungan_.*') as $messages)
                                @foreach($messages as $message)
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @endforeach
                               @endforeach
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="maklumat_harta" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('maklumat_harta')}}" autocomplete="off">
                              <!-- @error('maklumat_harta_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('maklumat_harta_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Tarikh Pemilikan Harta</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="date" id="tarikh_pemilikan_harta" name="tarikh_pemilikan_harta" value="{{ old('tarikh_pemilikan_harta')}}" autocomplete="off">
                              <!-- @error('tarikh_pemilikan_harta_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('tarikh_pemilikan_harta_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="bilangan" onkeypress="return onlyNumberKey(event)" name="bilangan" placeholder="Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ old('bilangan')}}" autocomplete="nope">
                              <!-- @error('bilangan_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('bilangan_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Nilai Perolehan Harta (RM)</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="nilai_perolehan" onkeypress="return onlyNumberKey(event)" name="nilai_perolehan" placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan')}}" autocomplete="off">
                              <!-- @error('nilai_perolehan_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('nilai_perolehan_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                            </div>
                            <div class="col-md-8">
                                <select id="cara_perolehan" class="custom-select  bg-light" name="cara_perolehan" onchange="showCaraPerolehan()" >
                                    <option value="" selected disabled hidden>Cara Perolehan</option>
                                    <option value="Dipusakai" {{ old('cara_perolehan') == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                    <option value="Dibeli" {{ old('cara_perolehan') == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                    <option value="Dihadiahkan" {{ old('cara_perolehan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                    <option value="Lain-lain" {{ old('cara_perolehan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                                <!-- @error('cara_perolehan_')
                                   <div class="alert alert-danger">{{ $message }}</div>
                               @enderror -->
                               @foreach ($errors->get('cara_perolehan_.*') as $messages)
                                @foreach($messages as $message)
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @endforeach
                               @endforeach
                            </div>

                            </div>
                            <br>

                            <div id="nama_pemilikan_asal_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required"> Dari Siapa Harta Diperolehi</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="nama_pemilikan_asal" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ old('nama_pemilikan_asal')}}" autocomplete="off">
                                  <!-- @error('nama_pemilikan_asal_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('nama_pemilikan_asal_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                            </div>

                            <div id="lain-lain_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required"> Nyatakan,</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="lain_lain" name="lain_lain" value="{{ old('lain_lain')}}" autocomplete="off">
                                  <!-- @error('lain_lain_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('lain_lain_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                            </div>

                            <div id="cara_belian_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required"> Cara Pembelian Harta</p>
                                </div>
                                <div class="col-md-8">
                                  <select id="select_cara_belian" class="custom-select  bg-light" name="cara_belian" onchange="showCaraBelian()" >
                                      <option value="" selected disabled hidden>Cara Pembelian Harta</option>
                                      <option value="Pinjaman" {{ old('cara_belian') == "Pinjaman" ? 'selected' : '' }}>Pinjaman</option>
                                      <option value="Pelupusan" {{ old('cara_belian') == "Pelupusan" ? 'selected' : '' }}>Pelupusan</option>
                                  </select>
                                  <!-- @error('cara_belian_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('cara_belian_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                            </div>

                            <div id="pinjaman_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">i) Jumlah Pinjaman</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="jumlah_pinjaman" onkeypress="return onlyNumberKey(event)"   value="{{ old('jumlah_pinjaman')}}" autocomplete="off">
                                  <!-- @error('jumlah_pinjaman_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('jumlah_pinjaman_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">ii)	Institusi memberi pinjaman</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="institusi_pinjaman"  value="{{ old('institusi_pinjaman')}}" autocomplete="off">
                                  <!-- @error('institusi_pinjaman_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('institusi_pinjaman_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iii)	Tempoh bayaran balik</p>
                                </div>
                                <div class="col-md-8">

                                  <input class="form-control bg-light" type="text" id="tempoh_bayar_balik"  value="{{ old('tempoh_bayar_balik')}}" autocomplete="off">
                                  <label for="tempoh_bayar_balik">Sila sertakan bulan atau tahun. cth: (9 Tahun / 10 Bulan)</label>
                                  <!-- @error('tempoh_bayar_balik_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('tempoh_bayar_balik_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>
                                <!-- <div class="col-md-4">
                                  <select class="form-control bg-light" id="tempoh" name="tempoh">
                                    <option selected value="years">Tahun</option>
                                    <option value="months">Bulan</option>
                                  </select>
                                </div> -->

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iv) Ansuran bulanan </p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="ansuran_bulanan" onkeypress="return onlyNumberKey(event)"   value="{{ old('ansuran_bulanan')}}" autocomplete="off">
                                  <!-- @error('ansuran_bulanan_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror -->
                                  @foreach ($errors->get('ansuran_bulanan_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach
                                </div>


                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">v)	Tarikh ansuran pertama</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="date" id="tarikh_ansuran_pertama"  value="{{ old('tarikh_ansuran_pertama')}}" >
                                  <!-- @error('tarikh_ansuran_pertama_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('tarikh_ansuran_pertama_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                            </div>

                            <div id="pelupusan_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">i)	Jenis Harta</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="jenis_harta_pelupusan"  value="{{ old('jenis_harta_pelupusan')}}" autocomplete="off">
                                  <!-- @error('jenis_harta_pelupusan_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('jenis_harta_pelupusan_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">ii) Alamat</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="alamat_asset"  value="{{ old('alamat_asset')}}" autocomplete="off">
                                  <!-- @error('alamat_asset_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('alamat_asset_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach


                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iii) No Pendaftaran Harta</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="no_pendaftaran"  value="{{ old('no_pendaftaran')}}" autocomplete="off">
                                  <!-- @error('no_pendaftaran_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('no_pendaftaran_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iv) Harga Jualan</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="harga_jualan" onkeypress="return onlyNumberKey(event)"  value="{{ old('harga_jualan')}}" autocomplete="off">
                                  <!-- @error('harga_jualan_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('harga_jualan_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">v)	Tarikh lupus</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="date" id="tarikh_lupus"  value="{{ old('tarikh_lupus')}}">
                                  <!-- @error('tarikh_lupus_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 @foreach ($errors->get('tarikh_lupus_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div>

                              </div>
                            </div>


                            <script type="text/javascript">
                            function showCaraPerolehan(){
                              var cara_peroleh = $('#cara_perolehan').val();

                              if(cara_peroleh == "Dipusakai" || cara_peroleh == "Dihadiahkan"){
                                document.getElementById('nama_pemilikan_asal_container').style.display ="block";
                              }
                              else{
                                document.getElementById('nama_pemilikan_asal_container').style.display ="none";
                              }

                              if(cara_peroleh == "Dibeli"){
                                document.getElementById('cara_belian_container').style.display ="block";
                              }
                              else{
                                document.getElementById('cara_belian_container').style.display ="none";
                              }

                              if(cara_peroleh == "Lain-lain"){
                                document.getElementById('lain-lain_container').style.display ="block";
                              }
                              else{
                                document.getElementById('lain-lain_container').style.display ="none";
                              }

                            }
                            </script>

                            <script type="text/javascript">
                            function showCaraBelian(){
                              var cara_belian = $('#select_cara_belian').val();

                              if(cara_belian == "Pinjaman"){
                                document.getElementById('pinjaman_container').style.display ="block";
                              }
                              else{
                                document.getElementById('pinjaman_container').style.display ="none";
                              }

                              if(cara_belian == "Pelupusan"){
                                document.getElementById('pelupusan_container').style.display ="block";
                              }
                              else{
                                document.getElementById('pelupusan_container').style.display ="none";
                              }

                            }
                            </script>

                          <div class="row">
                              <div class="col-md-5">

                              </div>
                              <div class="col-md-4">
                                <input class="btn btn-primary" type="button" value=" Tambah Data Harta" onclick="keterangan();calculatePinjamanPerumahan();">
                              </div>
                          </div>

                          <br>

                      </div>
                      </div>
                      <br>

                <div class="card rounded-lg">
                    <div class="card-body">
                      <div class="card-title" style="text-align: center;">Keterangan Mengenai Harta</div>
                      <!-- Table -->
                      <div class="table-responsive">
                          <table class="table table-bordered" id="table_keterangan">
                              <thead>
                                  <tr class="text-center">
                                      <th width="5%"><p class="mb-0">Jenis Harta</p></th>
                                      <th width="5%"><p class="mb-0">Pemilik Harta</p></th>
                                      <th width="10%"><p class="mb-0">Tarikh Pemilikan Harta</p></th>
                                      <th width="30%"><p class="mb-0">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p></th>
                                      <th width="15%"><p class="mb-0">Nilai Perolehan Harta (RM)</p></th>
                                      <th width="5%"><p class="mb-0">Tindakan</p></th>
                                  </tr>
                              </thead>
                              <tbody>


                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>

              </div>
          </div>
          <div class="row">
            <div class="col-12 mt-4">
                 <div class="card rounded-lg">
                     <div class="card-body">

                    <!-- Tanggungan -->
                    <div class="row">
                      <div class="col-md-8">
                        <p><b>5. TANGGUNGAN / ANSURAN BULANAN ATAS HUTANG / PINJAMAN</b></p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-4">
                        <p align="center"> PEGAWAI</p>
                      </div>
                      <div class="col-md-4">
                          <p align="center"> PASANGAN</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-2">
                        <p align="center">Jumlah Pinjaman / Tanggungan (RM)</p>
                      </div>
                      <div class="col-md-2">
                        <p align="center">Jumlah Bayaran Bulanan (RM)</p>
                      </div>
                        <div class="col-md-2">
                          <p align="center">Jumlah Pinjaman / Tanggungan (RM)</p>
                        </div>
                        <div class="col-md-2">
                          <p align="center">Jumlah Bayaran Bulanan (RM)</p>
                      </div>
                    </div>
                    <!--PINJAMAN PERUMAHAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>i) Jumlah Pinjaman Perumahan</p>
                      </div>
                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai" name="pinjaman_perumahan_pegawai" value="0" readonly>

                        <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_perumahan_pegawai')}}"> -->
                        @error('pinjaman_perumahan_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai" name="bulanan_perumahan_pegawai" value="0" readonly>

                        <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_perumahan_pegawai')}}"> -->
                        @error('bulanan_perumahan_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan" name="pinjaman_perumahan_pasangan" value="0" readonly>

                          <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_perumahan_pasangan')}}"> -->
                          @error('pinjaman_perumahan_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan" name="bulanan_perumahan_pasangan" value="0" readonly>

                          <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_perumahan_pasangan')}}"> -->
                          @error('bulanan_perumahan_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>

                    </div>
                    <br>
                    <!--PINJAMAN KENDERAAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>ii) Jumlah Pinjaman Kenderaan</p>
                      </div>
                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai" name="pinjaman_kenderaan_pegawai" value="0" readonly>

                        <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_kenderaan_pegawai')}}"> -->
                        @error('pinjaman_kenderaan_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai" name="bulanan_kenderaan_pegawai" value="0" readonly>

                        <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_kenderaan_pegawai')}}"> -->
                        @error('bulanan_kenderaan_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan" name="pinjaman_kenderaan_pasangan" value="0" readonly>

                          <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_kenderaan_pasangan')}}"> -->
                          @error('pinjaman_kenderaan_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan" name="bulanan_kenderaan_pasangan" value="0" readonly>

                          <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_kenderaan_pasangan')}}"> -->
                          @error('bulanan_kenderaan_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>

                    </div>
                    <br>
                    <!--CUKAI PENDAPATAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iii) Cukai Pendapatan</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('jumlah_cukai_pegawai')}}" autocomplete="off">
                        @error('jumlah_cukai_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_cukai_pegawai')}}" autocomplete="off">
                        @error('bulanan_cukai_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('jumlah_cukai_pasangan')}}" autocomplete="off">
                          @error('jumlah_cukai_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_cukai_pasangan')}}" autocomplete="off">
                          @error('bulanan_cukai_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>

                    </div>
                    <br>
                    <!--PINJAMAN KOPERASI -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iv) Pinjaman Koperasi</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light"  name="jumlah_koperasi_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('jumlah_koperasi_pegawai')}}" id="jumlah_koperasi_pegawai" autocomplete="off">
                        @error('jumlah_koperasi_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">
                        <input class="form-control bg-light"  name="bulanan_koperasi_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_koperasi_pegawai')}}" id="bulanan_koperasi_pegawai" autocomplete="off">
                        @error('bulanan_koperasi_pegawai')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light" name="jumlah_koperasi_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('jumlah_koperasi_pasangan')}}" id="jumlah_koperasi_pasangan" autocomplete="off">
                          @error('jumlah_koperasi_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light"  name="bulanan_koperasi_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_koperasi_pasangan')}}" id="bulanan_koperasi_pasangan" autocomplete="off">
                          @error('bulanan_koperasi_pasangan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>
                    </div>
                    <br>
                    <!--LAIN2 PINJAMAN -->
                    <input type="hidden" name="counter" value="0" id="counter1">

                    <div class="row">
                      <div class="col-md-3">
                        <p>v) Lain-Lain Pinjaman</p>
                      </div>
                    </div>
                    <div class="table_lain" id="table_lain">
                    <div class="row">
                      <div class="col-md-3">
                        <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman"  value="{{ old('lain_lain_pinjaman[]')}}" autocomplete="off">
                        @error('lain_lain_pinjaman[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_pegawai[]')}}" autocomplete="off">
                        @error('pinjaman_pegawai[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_pegawai[]')}}" autocomplete="off">
                        @error('bulanan_pegawai[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_pasangan[]')}}" autocomplete="off">
                          @error('pinjaman_pasangan[]')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>

                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_pasangan[]')}}" autocomplete="off">
                          @error('bulanan_pasangan[]')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>

                      <div class="col-md-1">
                        <button class="add_field_button" id="add_pinjaman_button">Tambah</button>
                    </div>
                    </div>
                    <br>
                    </div>
                  </div>
                </div>
              </div>
          </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-1" align="right">
                        <input type="checkbox" name="pengakuan" value="pengakuan pegawai" >
                      </div>
                      <div class="col-md-11">
                          <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
                      </div>
                      @error('pengakuan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
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
                              <button type="submit" class="btn btn-danger" name="publish" onclick="submitForm()">Ya</button>
                              </div>
                          </div>
                          </div>
                      </div>

                </form>
            </div>

            <script type="text/javascript">
            //for user to fill up the pinjaman
              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              // var wrapper   		= $("#table_lain"); //Fields wrapper

              var wrapper   		= $("#table_lain"); //Fields wrapper
              var add_button      = $("#add_pinjaman_button"); //Add button ID
              var counter = document.getElementById("counter1").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter++;

                  $(wrapper).append('<div id="divi'+counter+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" name="lain_lain_pinjaman[]" id="lain_lain_pinjaman['+
                  counter+
                  ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)"  name="pinjaman_pegawai[]" id="pinjaman_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)"  name="bulanan_pegawai[]" id="bulanan_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)"  name="pinjaman_pasangan[]" id="pinjaman_pasangan['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)"  name="bulanan_pasangan[]" id="bulanan_pasangan['+
                  counter+
                  ']"></div><div class="col-md-1"><a onClick="removeDataPinjaman(this,'+
                  counter+
                  ' ); return false;" id ="del'+
                  counter+
                  '"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>');

              });
            });

            function copyCatPinjaman(e){
             // console.log("MASUK MASUK");
             // console.log(e);
             var lain_lain_pinjaman = document.getElementById("lain_lain_pinjaman["+e+"]").value;
             var pinjaman_pegawai = document.getElementById("pinjaman_pegawai["+e+"]").value;
             var bulanan_pegawai = document.getElementById("bulanan_pegawai["+e+"]").value;
             var pinjaman_pasangan = document.getElementById("pinjaman_pasangan["+e+"]").value;
             var bulanan_pasangan = document.getElementById("bulanan_pasangan["+e+"]").value;


             // console.log(test);
             document.getElementById("lain_lain_pinjaman_hidden["+e+"]").value = lain_lain_pinjaman;
             document.getElementById("pinjaman_pegawai_hidden["+e+"]").value = pinjaman_pegawai;
             document.getElementById("bulanan_pegawai_hidden["+e+"]").value = bulanan_pegawai;
             document.getElementById("pinjaman_pasangan_hidden["+e+"]").value = pinjaman_pasangan;
             document.getElementById("bulanan_pasangan_hidden["+e+"]").value = bulanan_pasangan;

         }

            function removeDataPinjaman(e,counter){
            //$(e).parents('div'+counter+'').remove();
            console.log('masuk');
              $('#divi'+counter+'').remove();
              $('#divi_hidden'+counter+'').remove();

              $('#del'+counter+'').remove();
             //  var counter = document.getElementById("counter").value;
             //  counter--;
             // doctype.getElementById("counter").value = counter;
            }
          </script>

            <script type="text/javascript">
            //for form to capture user input and post it to backend

              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              // var wrapper   		= $("#table_lain"); //Fields wrapper

              var wrapper   		= $("#hidden_pinjaman"); //Fields wrapper
              var add_button      = $("#add_pinjaman_button"); //Add button ID
              var counter = document.getElementById("counter1").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter++;

                  $(wrapper).append('<div id="divi_hidden'+counter+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="hidden" name="lain_lain_pinjaman[]" id="lain_lain_pinjaman_hidden['+
                  counter+
                  ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" name="pinjaman_pegawai[]" id="pinjaman_pegawai_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" name="bulanan_pegawai[]" id="bulanan_pegawai_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" name="pinjaman_pasangan[]" id="pinjaman_pasangan_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" name="bulanan_pasangan[]" id="bulanan_pasangan_hidden['+
                  counter+
                  ']"></div></div>');

              });
            });

            // function removeData(e,counter){
            // //$(e).parents('div'+counter+'').remove();
            // console.log('masuk');
            //   $('#divi'+counter+'').remove();
            //   $('#del'+counter+'').remove();
            //  //  var counter = document.getElementById("counter").value;
            //  //  counter--;
            //  // doctype.getElementById("counter").value = counter;
            // }
            </script>

            <script type="text/javascript">
               //for user to fill up the dividen
               $(document).ready(function() {
               // var max_fields      = 10; //maximum input boxes allowed
               var wrapper   		= $("#dividen_field"); //Fields wrapper
               var add_button      = $("#add_dividen_button"); //Add button ID
               var counter_dividen = document.getElementById("counter_dividen").value;

               $(add_button).click(function(e){ //on add input button click
                 e.preventDefault();
                   counter_dividen++;
                   console.log('dividencounter',counter_dividen);

                   $(wrapper).append('<div id="dividen_add'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" onchange="return copyCat('+counter_dividen+')" name="dividen_1[]" id="dividen_1['+
                   counter_dividen+
                   ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" onchange="return copyCat('+counter_dividen+')" onkeypress="return onlyNumberKey(event)"  name="dividen_1_pegawai[]" id="dividen_1_pegawai['+
                   counter_dividen+
                   ']" placeholder="Dividen Pegawai"></div></div><input type="hidden" onchange="return copyCat('+counter_dividen+')" name="counter" id="counter_for_dividen" value="'+
                   counter_dividen+
                   '"><div class="col-md-4 mt-2 mt-md-0" id="dividen"><input class="form-control bg-light" id="dividen_1_pasangan['+
                   counter_dividen+
                   ']" onkeypress="return onlyNumberKey(event)"  name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" id="dividen_pasangan" onchange="return copyCat('+counter_dividen+')"></div><div class="col-md-1"><a onClick="removeDividen(this,'+
                   counter_dividen+
                   ' ); return false;" id ="button'+counter_dividen+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

               });
             });

              function copyCat(e){
               // console.log("MASUK MASUK");
               // console.log(e);
               var dividen_1 = document.getElementById("dividen_1["+e+"]").value;
               var dividen_1_pegawai = document.getElementById("dividen_1_pegawai["+e+"]").value;
               var dividen_1_pasangan = document.getElementById("dividen_1_pasangan["+e+"]").value;

               // console.log(test);
               document.getElementById("dividen_1_hidden["+e+"]").value = dividen_1;
               document.getElementById("dividen_1_pegawai_hidden["+e+"]").value = dividen_1_pegawai;
               document.getElementById("dividen_1_pasangan_hidden["+e+"]").value = dividen_1_pasangan;
           }

             function removeDividen(e,counter_dividen){
               // $(e).parents('div'+counter_pndptn+'').remove();
             console.log('masuk here');
               $('#dividen_add'+counter_dividen+'').remove();
               $('#dividen_add_hidden'+counter_dividen+'').remove();

               $('#button'+counter_dividen+'').remove();
             //   var counter = document.getElementById("counter").value;
             //   counter--;
             // doctype.getElementById("counter").value = counter;
             }


             </script>

            <script type="text/javascript">
               //for form to capture user input and post it to backend
               $(document).ready(function() {
               // var max_fields      = 10; //maximum input boxes allowed
               var wrapper   		= $("#hidden_dividen"); //Fields wrapper
               var add_button      = $("#add_dividen_button"); //Add button ID
               var counter_dividen = document.getElementById("counter_dividen").value;

               $(add_button).click(function(e){ //on add input button click
                 e.preventDefault();
                   counter_dividen++;
                   console.log('dividencounter',counter_dividen);

                   $(wrapper).append('<div id="dividen_add_hidden'+counter_dividen+'" class="row"><input type="hidden" name="dividen_1[]" id="dividen_1_hidden['+
                   counter_dividen+
                   ']"> <input type="hidden" name="dividen_1_pegawai[]" id="dividen_1_pegawai_hidden['+
                   counter_dividen+
                   ']"> <input type="hidden" name="counter" id="counter_for_dividen" value="'+
                   counter_dividen+
                   '"> <input type="hidden" name="dividen_1_pasangan[]" id="dividen_1_pasangan_hidden['+
                   counter_dividen+
                   ']">'); //add input box

               });
             });

             // function removeDividen(e,counter_dividen){
             //   // $(e).parents('div'+counter_pndptn+'').remove();
             // console.log('masuk');
             //   $('#dividen_add'+counter_dividen+'').remove();
             //   $('#button'+counter_dividen+'').remove();
             // //   var counter = document.getElementById("counter").value;
             // //   counter--;
             // // doctype.getElementById("counter").value = counter;
             // }

             </script>


            <script type="text/javascript">
           //  var MyIDCard = "{{Auth::user()->no_kad_pengenalan_anak}}";//ID number
           //  // console.log(MyIDCard);
           //  var MyAge;//age
           //  // Get the birthday, gender, age according to the ID number
           //  function IDCardData() {
           //       if (MyIDCard != "") {
           //           var MyDate = new Date();
           //           // console.log(parseInt(MyDate.getFullYear()));
           //           var MyAge = parseInt(MyDate.getFullYear()) - (parseInt(MyIDCard.substring(0, 2)) + 1900);
           //       }
           //       return MyAge;
           //  }
           // // IDCardData();
           // // console.log(IDCardData());
           // window.onload = function() {
           //   document.getElementById("umur_anak").innerHTML = IDCardData();
           // };


            function keterangan(){
             var jenis_harta = document.getElementById("jenis_harta").value;
             var pemilik_harta = document.getElementById("pemilik_harta").value;
             var select_hubungan = document.getElementById("select_hubungan").value;
             var maklumat_harta = document.getElementById("maklumat_harta").value;
             var tarikh_pemilikan_harta = document.getElementById("tarikh_pemilikan_harta").value;
             var bilangan = document.getElementById("bilangan").value;
             var nilai_perolehan = document.getElementById("nilai_perolehan").value;
             var cara_perolehan = document.getElementById("cara_perolehan").value;
             var nama_pemilikan_asal = document.getElementById("nama_pemilikan_asal").value;
             var lain_lain = document.getElementById("lain_lain").value;
             var cara_belian = document.getElementById("select_cara_belian").value;
             var jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
             var institusi_pinjaman = document.getElementById("institusi_pinjaman").value;
             var tempoh_bayar_balik = document.getElementById("tempoh_bayar_balik").value;
             // var tempoh = document.getElementById("tempoh").value;
             var ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
             var tarikh_ansuran_pertama = document.getElementById("tarikh_ansuran_pertama").value;
             var jenis_harta_pelupusan = document.getElementById("jenis_harta_pelupusan").value;
             var alamat_asset = document.getElementById("alamat_asset").value;
             var no_pendaftaran = document.getElementById("no_pendaftaran").value;
             var harga_jualan = document.getElementById("harga_jualan").value;
             var tarikh_lupus = document.getElementById("tarikh_lupus").value;



             var counter_keterangan = document.getElementById("counter_keterangan").value;
             var increment_keterangan = document.getElementById("increment_keterangan").value;

             //tambah table
             $("#table_keterangan").append(
               '<tr><td><p class="mb-0 " style="text-align: center;">' +
               jenis_harta +
               '</td><td><p class="mb-0 " style="text-align: center;">' +
               pemilik_harta +
               '</td><td><p class="mb-0 " style="text-align: center;">' +
               tarikh_pemilikan_harta +
               '</td><td><p class="mb-0 " style="text-align: center;">' +
               bilangan +
               '</td><td><p class="mb-0 " style="text-align: center;">' +
               nilai_perolehan +
               '</td><td><a onClick="removeJumlahPinjaman('+ increment_keterangan  +');removeData(this,'+ increment_keterangan  +'); return false;" class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a></td></tr>'
             );

             jenis_harta_to_append = '<input type="hidden" id="jenis_harta'+ increment_keterangan +'" name="jenis_harta_[]"  value="'+ jenis_harta +'" readonly>';
             pemilik_harta_to_append = '<input type="hidden" id="pemilik_harta'+ increment_keterangan +'" name="pemilik_harta_[]"  value="'+ pemilik_harta +'" readonly>';
             select_hubungan_to_append = '<input type="hidden" id="select_hubungan'+ increment_keterangan +'" name="select_hubungan_[]"  value="'+ select_hubungan +'" readonly>';
             maklumat_harta_to_append = '<input type="hidden" id="maklumat_harta'+ increment_keterangan +'" name="maklumat_harta_[]"  value="'+ maklumat_harta +'" readonly>';
             tarikh_pemilikan_harta_to_append = '<input type="hidden" id="tarikh_pemilikan_harta'+ increment_keterangan +'" name="tarikh_pemilikan_harta_[]"  value="'+ tarikh_pemilikan_harta +'" readonly>';
             bilangan_to_append = '<input type="hidden" id="bilangan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)"  name="bilangan_[]"  value="'+ bilangan +'" readonly>';
             nilai_perolehan_to_append = '<input type="hidden" id="nilai_perolehan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)"  name="nilai_perolehan_[]"  value="'+ nilai_perolehan +'" readonly>';
             cara_perolehan_to_append = '<input type="hidden" id="cara_perolehan'+ increment_keterangan +'" name="cara_perolehan_[]"  value="'+ cara_perolehan +'" readonly>';
             nama_pemilikan_asal_to_append = '<input type="hidden" id="nama_pemilikan_asal'+ increment_keterangan +'" name="nama_pemilikan_asal_[]"  value="'+ nama_pemilikan_asal +'" readonly>';
             jumlah_pinjaman_to_append = '<input type="hidden" id="jumlah_pinjaman'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)"  name="jumlah_pinjaman_[]"  value="'+ jumlah_pinjaman +'" readonly>';
             institusi_pinjaman_to_append = '<input type="hidden" id="institusi_pinjaman'+ increment_keterangan +'" name="institusi_pinjaman_[]"  value="'+ institusi_pinjaman +'" readonly>';
             tempoh_bayar_balik_to_append = '<input type="hidden" id="tempoh_bayar_balik'+ increment_keterangan +'" name="tempoh_bayar_balik_[]"  value="'+ tempoh_bayar_balik +'" readonly>';
             // tempoh_to_append = '<input type="hidden" id="tempoh'+ increment_keterangan +'" name="tempoh_[]"  value="'+ tempoh +'" readonly>';
             ansuran_bulanan_to_append = '<input type="hidden" id="ansuran_bulanan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)"  name="ansuran_bulanan_[]"  value="'+ ansuran_bulanan +'" readonly>';
             tarikh_ansuran_pertama_to_append = '<input type="hidden" id="tarikh_ansuran_pertama'+ increment_keterangan +'" name="tarikh_ansuran_pertama_[]"  value="'+ tarikh_ansuran_pertama +'" readonly>';
             jenis_harta_pelupusan_to_append = '<input type="hidden" id="jenis_harta_pelupusan'+ increment_keterangan +'" name="jenis_harta_pelupusan_[]"  value="'+ jenis_harta_pelupusan +'" readonly>';
             alamat_asset_to_append = '<input type="hidden" id="alamat_asset'+ increment_keterangan +'" name="alamat_asset_[]"  value="'+ alamat_asset +'" readonly>';
             no_pendaftaran_to_append = '<input type="hidden" id="no_pendaftaran'+ increment_keterangan +'" name="no_pendaftaran_[]"  value="'+ no_pendaftaran +'" readonly>';
             harga_jualan_to_append = '<input type="hidden" id="harga_jualan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)"  name="harga_jualan_[]"  value="'+ harga_jualan +'" readonly>';
             tarikh_lupus_to_append = '<input type="hidden" id="tarikh_lupus'+ increment_keterangan +'" name="tarikh_lupus_[]"  value="'+ tarikh_lupus +'" readonly>';
             lain_lain_to_append = '<input type="hidden" id="lain_lain'+ increment_keterangan +'" name="lain_lain_[]"  value="'+ lain_lain +'" readonly>';
             cara_belian_to_append = '<input type="hidden" id="cara_belian'+ increment_keterangan +'" name="cara_belian_[]"  value="'+ cara_belian +'" readonly>';


             increment_keterangan++;
             counter_keterangan++;

             document.getElementById("increment_keterangan").value = increment_keterangan;
             document.getElementById("counter_keterangan").value = counter_keterangan;

             $("#counter_keterangan").append(counter_keterangan);
             $("#increment_keterangan").append(increment_keterangan);

             $("#hidden_input").append(jenis_harta_to_append);
             $("#hidden_input").append(pemilik_harta_to_append);
             $("#hidden_input").append(select_hubungan_to_append);
             $("#hidden_input").append(maklumat_harta_to_append);
             $("#hidden_input").append(tarikh_pemilikan_harta_to_append);
             $("#hidden_input").append(bilangan_to_append);
             $("#hidden_input").append(nilai_perolehan_to_append);
             $("#hidden_input").append(cara_perolehan_to_append);
             $("#hidden_input").append(nama_pemilikan_asal_to_append);
             $("#hidden_input").append(jumlah_pinjaman_to_append);
             $("#hidden_input").append(institusi_pinjaman_to_append);
             $("#hidden_input").append(tempoh_bayar_balik_to_append);
             // $("#hidden_input").append(tempoh_to_append);
             $("#hidden_input").append(ansuran_bulanan_to_append);
             $("#hidden_input").append(tarikh_ansuran_pertama_to_append);
             $("#hidden_input").append(jenis_harta_pelupusan_to_append);
             $("#hidden_input").append(alamat_asset_to_append);
             $("#hidden_input").append(no_pendaftaran_to_append);
             $("#hidden_input").append(harga_jualan_to_append);
             $("#hidden_input").append(tarikh_lupus_to_append);
             $("#hidden_input").append(lain_lain_to_append);
             $("#hidden_input").append(cara_belian_to_append);


             //reset form
             $("#tarikh_pemilikan_harta").val("")
             // $("#jenis_harta").prop('selectedIndex', 0);
             // $("#select_hubungan").prop('selectedIndex', 0);
             $("#cara_perolehan").prop('selectedIndex', 0);
             // $("#cara_belian").prop('selectedIndex', 0);
             $("#tarikh_lupus").val("")
             $("#tarikh_ansuran_pertama").val("")


             // document.getElementById("jenis_harta").value = "";
             document.getElementById("pemilik_harta").value = "";
             document.getElementById("maklumat_harta").value = "";
             document.getElementById("bilangan").value = "";
             document.getElementById("cara_belian_container").style="display: none;";
             document.getElementById("nama_pemilikan_asal_container").style="display: none;";
             document.getElementById("lain-lain_container").style="display: none;";
             document.getElementById("pinjaman_container").style="display: none;";
             document.getElementById("pelupusan_container").style="display: none;";
             document.getElementById("nilai_perolehan").value = "";
             document.getElementById("nama_pemilikan_asal").value = "";
             // document.getElementById("jumlah_pinjaman").value = "";
             document.getElementById("institusi_pinjaman").value = "";
             document.getElementById("tempoh_bayar_balik").value = "";
             // document.getElementById("tempoh").value = "";
             // document.getElementById("ansuran_bulanan").value = "";
             document.getElementById("jenis_harta_pelupusan").value = "";
             document.getElementById("alamat_asset").value = "";
             document.getElementById("no_pendaftaran").value = "";
             document.getElementById("harga_jualan").value = "";
             document.getElementById("lain_lain").value = "";


           }

           function removeData(e,counter){
            //remove table row
            $(e).parents('tr').remove();

            //remove input text in form
            $('#jenis_harta'+counter+'').remove();
            $('#pemilik_harta'+counter+'').remove();
            $('#select_hubungan'+counter+'').remove();
            $('#maklumat_harta'+counter+'').remove();
            $('#tarikh_pemilikan_harta'+counter+'').remove();
            $('#bilangan'+counter+'').remove();
            $('#nilai_perolehan'+counter+'').remove();
            $('#cara_perolehan'+counter+'').remove();
            $('#nama_pemilikan_asal'+counter+'').remove();
            $('#lain_lain'+counter+'').remove();
            $('#cara_belian'+counter+'').remove();
            $('#nama_pemilikan_asal'+counter+'').remove();
            $('#jumlah_pinjaman'+counter+'').remove();
            $('#institusi_pinjaman'+counter+'').remove();
            $('#tempoh_bayar_balik'+counter+'').remove();
            // $('#tempoh'+counter+'').remove();
            $('#ansuran_bulanan'+counter+'').remove();
            $('#tarikh_ansuran_pertama'+counter+'').remove();
            $('#jenis_harta_pelupusan'+counter+'').remove();
            $('#alamat_asset'+counter+'').remove();
            $('#no_pendaftaran'+counter+'').remove();
            $('#harga_jualan'+counter+'').remove();
            $('#tarikh_lupus'+counter+'').remove();


            //fetch data from jumlah data input
            var counter_keterangan = document.getElementById("counter_keterangan").value;
            counter_keterangan--;

            //update data into jumlah data input
            document.getElementById("counter_keterangan").value = counter_keterangan;
          }
            </script>



            <script type="text/javascript">
                    function submitForm() {
                      $('#submit-form').html('<i class="fa fa-spinner fa-spin"></i>');
                      $('#submit-form').attr('disabled', 'disabled');
                  }
                  // $(document).on('submit', '#formbpost', function() {
                  //     $('#submit-form').html('<i class="fa fa-spinner fa-spin"></i>');
                  //     $('#submit-form').attr('disabled', 'disabled');
                  // });
            </script>
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
             document.getElementById("tarikh_pemilikan_harta").setAttribute("max", today);

            </script>
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
             document.getElementById("tarikh_ansuran_pertama").setAttribute("max", today);

            </script>
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
             document.getElementById("tarikh_lupus").setAttribute("max", today);

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

            <script type="text/javascript">
            function calculatePinjamanPerumahan(){
              var TotalValue = 0;
              var TotalValue_bulanan = 0;

              jenis_harta = document.getElementById("jenis_harta").value;
              pasangan = document.getElementById("select_hubungan").value;
              cara_belian= document.getElementById("select_cara_belian").value;
              if(cara_belian == "Pinjaman"){
                console.log('pinjaman');
                  if(jenis_harta == "Rumah"){
                    console.log('rumah');
                    console.log(pasangan);
                    if(pasangan == "Isteri/Suami"){
                      console.log('masuk rumah isteri');
                      //pinjaman_perumahan_pasangan
                      pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pasangan').value;
                      jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                      TotalValue = parseFloat(pinjaman_rumah_semasa).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                      pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pasangan').value;
                      ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                      TotalValue_bulanan = parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);


                      document.getElementById("jenis_harta").value = "";
                      document.getElementById("ansuran_bulanan").value = "";
                      document.getElementById("jumlah_pinjaman").value = "";
                      $("#select_cara_belian").prop('selectedIndex', 0);
                      $("#select_hubungan").prop('selectedIndex', 0);
                      document.getElementById('pinjaman_perumahan_pasangan').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                      document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);
                    }

                    else if(pasangan == "Sendiri"){
                      console.log('masuk sendiri');
                      pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pegawai').value;
                      jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                      TotalValue = parseFloat(pinjaman_rumah_semasa).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                      pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pegawai').value;
                      ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                      TotalValue_bulanan = parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);


                      document.getElementById("jenis_harta").value = "";
                      document.getElementById("ansuran_bulanan").value = "";
                      document.getElementById("jumlah_pinjaman").value = "";
                      $("#select_cara_belian").prop('selectedIndex', 0);
                      $("#select_hubungan").prop('selectedIndex', 0);
                      document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                      document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                    }
                    else{
                      $("#select_cara_belian").prop('selectedIndex', 0);
                      $("#select_hubungan").prop('selectedIndex', 0);
                      document.getElementById("jenis_harta").value = "";
                      document.getElementById("ansuran_bulanan").value = "";
                      document.getElementById("jumlah_pinjaman").value = "";
                    }
                  }
                  else if (jenis_harta == "Kenderaan") {
                    console.log('masuk kenderaan');
                    if(pasangan == "Isteri/Suami"){
                      //pinjaman_perumahan_pasangan
                      console.log('masuk suami isteri');
                      pinjaman_kenderaan_pegawai = document.getElementById('pinjaman_kenderaan_pasangan').value;
                      jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                      TotalValue = parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                      pinjaman_bulanan_kenderaan_semasa = document.getElementById('bulanan_kenderaan_pasangan').value;
                      ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                      TotalValue_bulanan = parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);

                      $("#select_cara_belian").prop('selectedIndex', 0);
                      $("#select_hubungan").prop('selectedIndex', 0);
                      document.getElementById("jenis_harta").value = "";
                      document.getElementById("ansuran_bulanan").value = "";
                      document.getElementById("jumlah_pinjaman").value = "";
                      document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                      document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);
                    }

                else if(pasangan == "Sendiri"){
                  console.log('masuk la sini, kenderaan sendiri');
                  pinjaman_kenderaan_pegawai = document.getElementById('pinjaman_kenderaan_pegawai').value;
                  jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                  TotalValue = parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                  pinjaman_bulanan_kenderaan_semasa = document.getElementById('bulanan_kenderaan_pegawai').value;
                  ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                  TotalValue_bulanan = parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);

                  $("#select_cara_belian").prop('selectedIndex', 0);
                  $("#select_hubungan").prop('selectedIndex', 0);
                  document.getElementById("jenis_harta").value = "";
                  document.getElementById("ansuran_bulanan").value = "";
                  document.getElementById("jumlah_pinjaman").value = "";
                  document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                  document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                }
                else{
                  console.log('masuk la sini');
                  $("#select_cara_belian").prop('selectedIndex', 0);
                  $("#select_hubungan").prop('selectedIndex', 0);
                  document.getElementById("jenis_harta").value = "";
                  document.getElementById("ansuran_bulanan").value = "";
                  document.getElementById("jumlah_pinjaman").value = "";
                }
              }
              else{
                console.log('masuk la sini');
                $("#select_cara_belian").prop('selectedIndex', 0);
                $("#select_hubungan").prop('selectedIndex', 0);
                document.getElementById("jenis_harta").value = "";
                document.getElementById("ansuran_bulanan").value = "";
                document.getElementById("jumlah_pinjaman").value = "";
              }
            }
            else{
              console.log('masuk la sini');
              $("#select_cara_belian").prop('selectedIndex', 0);
              $("#select_hubungan").prop('selectedIndex', 0);
              document.getElementById("jenis_harta").value = "";
              document.getElementById("ansuran_bulanan").value = "";
              document.getElementById("jumlah_pinjaman").value = "";
            }
          }
     </script>
           <script>
           function removeJumlahPinjaman(e){
               jenis_harta = document.getElementById("jenis_harta"+ e +"").value;
               pasangan = document.getElementById("select_hubungan"+ e +"").value;
               cara_belian= document.getElementById("cara_belian"+ e +"").value;
               console.log(cara_belian,'cara_belian');
               if(cara_belian == "Pinjaman"){
               if(jenis_harta == "Rumah"){

                 if(pasangan == "Isteri/Suami"){
                   pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pasangan').value;
                   jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                   pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pasangan').value;
                   ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                   document.getElementById('pinjaman_perumahan_pasangan').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                   document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                 }
                 else if(pasangan == "Sendiri"){
                   pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pegawai').value;
                   jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                   pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pegawai').value;
                   ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                   document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                   document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                 }
               }
               else if(jenis_harta == "Kenderaan"){
                 if(pasangan == "Isteri/Suami"){
                   pinjaman_rumah_semasa = document.getElementById('pinjaman_kenderaan_pasangan').value;
                   jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                   pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_kenderaan_pasangan').value;
                   ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                   document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                   document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                 }
                 else if(pasangan == "Sendiri") {
                   pinjaman_rumah_semasa = document.getElementById('pinjaman_kenderaan_pegawai').value;
                   jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                   pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_kenderaan_pegawai').value;
                   ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                   document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                   document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                 }
               }
             }
           }
           </script>

@endsection
