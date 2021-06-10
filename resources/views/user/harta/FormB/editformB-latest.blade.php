@extends('user.layouts.app')
@section('content')

        <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <style media="screen">
            .css-serial {
              counter-reset: serial-number -1;  /* Set the serial number counter to -1 */
            }

            .css-serial td:first-child:before {
              counter-increment: serial-number;  /* Increment the serial number counter */
              content: counter(serial-number);  /* Display the counter */
            }
          </style>
        </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran B: Borang Perisytiharan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">

                              <form id="formB_submit" action="{{route('b.update', $info->id)}}" method="POST">
                                @csrf

                                <div id="hidden_input" name="hidden_input">

                                  @forelse($hartaB as $data)
                                    @if($loop->last)

                                    <input type="hidden" id="counter_keterangan" name="counter_keterangan" value="{{$data->id}}">
                                    <input type="hidden" id="increment_keterangan" name="increment_keterangan" value="{{$data->id}}">
                                    @endif
                                      <input type="hidden" id="jenis_harta{{$data->id}}" name="jenis_harta_[]"  value="{{$data->jenis_harta}}" readonly>
                                      <input type="hidden" id="pemilik_harta{{$data->id}}" name="pemilik_harta_[]"  value="{{$data->pemilik_harta}}" readonly>
                                      <input type="hidden" id="select_hubungan{{$data->id}}" name="select_hubungan_[]"  value="{{$data->hubungan_pemilik}}" readonly>
                                      <input type="hidden" id="maklumat_harta{{$data->id}}" name="maklumat_harta_[]"  value="{{$data->maklumat_harta}}" readonly>
                                      <input type="hidden" id="tarikh_pemilikan_harta{{$data->id}}" name="tarikh_pemilikan_harta_[]"  value="{{$data->tarikh_pemilikan_harta}}" readonly>
                                      <input type="hidden" id="bilangan{{$data->id}}" name="bilangan_[]"  value="{{$data->bilangan}}" readonly>
                                      <input type="hidden" id="unit_bilangan{{$data->id}}" name="unit_bilangan_[]"  value="{{$data->unit_bilangan}}" readonly>
                                      <input type="hidden" id="nilai_perolehan{{$data->id}}" name="nilai_perolehan_[]"  value="{{$data->nilai_perolehan}}" readonly>
                                      <input type="hidden" id="cara_perolehan{{$data->id}}" name="cara_perolehan_[]"  value="{{$data->cara_perolehan}}" readonly>
                                      <input type="hidden" id="nama_pemilikan_asal{{$data->id}}" name="nama_pemilikan_asal_[]"  value="{{$data->nama_pemilikan_asal}}" readonly>
                                      <input type="hidden" id="tunai{{$data->id}}" name="tunai_[]"  value="{{$data->tunai}}" readonly>
                                      <input type="hidden" id="jumlah_pinjaman{{$data->id}}" name="jumlah_pinjaman_[]"  value="{{$data->jumlah_pinjaman}}" readonly>
                                      <input type="hidden" id="institusi_pinjaman{{$data->id}}" name="institusi_pinjaman_[]"  value="{{$data->institusi_pinjaman}}" readonly>
                                      <input type="hidden" id="tempoh_bayar_balik{{$data->id}}" name="tempoh_bayar_balik_[]"  value="{{$data->tempoh_bayar_balik}}" readonly>
                                      <input type="hidden" id="ansuran_bulanan{{$data->id}}" name="ansuran_bulanan_[]"  value="{{$data->ansuran_bulanan}}" readonly>
                                      <input type="hidden" id="tarikh_ansuran_pertama{{$data->id}}" name="tarikh_ansuran_pertama_[]"  value="{{$data->tarikh_ansuran_pertama}}" readonly>
                                      <input type="hidden" id="keterangan_lain{{$data->id}}" name="keterangan_lain_[]"  value="{{$data->keterangan_lain}}" readonly>
                                      <input type="hidden" id="jenis_harta_pelupusan{{$data->id}}" name="jenis_harta_pelupusan_[]"  value="{{$data->jenis_harta_pelupusan}}" readonly>
                                      <input type="hidden" id="alamat_asset{{$data->id}}" name="alamat_asset_[]"  value="{{$data->alamat_asset}}" readonly>
                                      <input type="hidden" id="no_pendaftaran{{$data->id}}" name="no_pendaftaran_[]"  value="{{$data->no_pendaftaran}}" readonly>
                                      <input type="hidden" id="harga_jualan{{$data->id}}" name="harga_jualan_[]"  value="{{$data->harga_jualan}}" readonly>
                                      <input type="hidden" id="tarikh_lupus{{$data->id}}" name="tarikh_lupus_[]"  value="{{$data->tarikh_lupus}}" readonly>
                                      <input type="hidden" id="lain_lain{{$data->id}}" name="lain_lain_[]"  value="{{$data->lain_lain}}" readonly>
                                      <input type="hidden" id="cara_belian{{$data->id}}" name="cara_belian_[]"  value="{{$data->cara_belian}}" readonly>
                                    @empty
                                    <input type="hidden" id="counter_keterangan" name="counter_keterangan" value="0">

                                    <input type="hidden" id="increment_keterangan" name="increment_keterangan" value="0">

                                    @endforelse
                                </div>

                                <div id="hidden_dividen" name="hidden_dividen">

                                </div>

                                <div id="hidden_pinjaman" name="hidden_pinjaman">

                                </div>

                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->nama_pegawai}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          {{$info->kad_pengenalan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->jawatan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->jabatan}}
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
                                            {{$info->alamat_tempat_bertugas}}
                                              <!-- <input type="hidden" name="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }} -->
                                          </div>
                                      </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-12 mt-4">
                         <div class="card rounded-lg">
                             <div class="card-body">

                                  <!-- keluarga -->
                                  @if($maklumat_pasangan->isEmpty())
                                  @else
                                  @foreach($maklumat_pasangan as $maklumat_pasangan)
                                  <div class="row">
                                    <div class="col-md-4">
                                      <p><b>2.KETERANGAN MENGENAI KELUARGA</b></p>
                                    </div>
                                  </div>
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

                                    @if($maklumat_anak->isEmpty())
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
                                                }
                                                if($year > $cutoff)
                                                {
                                                  $above = $curYear - ($year + 1900);
                                                  echo $above;
                                                }
                                                else{
                                                  $above = $curYear - ($year + 2000);
                                                  echo $above;
                                                }
                                              ?>
                                                <!-- <input type="hidden" name="umur_anak" value="{{Auth::user()->umur_anak }}">{{Auth::user()->umur_anak }} -->
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
                                      @endif
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-4">
                             <div class="card rounded-lg">
                                 <div class="card-body">
                                    <!-- pendapatan bulanan-->
                                    @if($info)
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
                                            {{$info->gaji}}
                                          </div>
                                      </div>
                                      <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ $info->gaji_pasangan  }}">
                                      </div>
                                      @error('gaji_pasangan')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>
                                  </br>
                                <!-- imbuhan -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ $info->jumlah_imbuhan}}">
                                        </div>
                                        @error('jumlah_imbuhan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $info->jumlah_imbuhan_pasangan}}">
                                    </div>
                                    @error('jumlah_imbuhan_pasangan')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                  </div>
                                  <br>
                                  <!-- sewa -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> iii) Sewa Rumah/Kedai</p>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="sewa" placeholder="Sewa Pegawai" value="{{ $info->sewa}}">
                                        </div>
                                        @error('sewa')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $info->sewa_pasangan}}">
                                    </div>
                                  </div>
                                  @if($listDividenB->isEmpty())
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
                                            <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ old('dividen_1[]')}}">
                                        </div>
                                        @error('dividen_1[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)"  name="dividen_1_pegawai[]" id="dividen0" placeholder="Dividen Pegawai"  value="{{ old('dividen_1_pegawai[]')}}">
                                        </div>
                                        @error('dividen_1_pegawai[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)"  name="dividen_1_pasangan[]" id="dividen0" placeholder="Dividen Pasangan"  value="{{ old('dividen_1_pasangan[]')}}">
                                    </div>
                                    @error('dividen_1_pasangan[]')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                    <div class="col-md-1">
                                      <button class="add_field_button" id="add_dividen_button">Tambah</button>
                                  </div>
                                  </div>
                                  <br>
                                  </div>
                                  @else
                                  <!-- dividen -->
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <p> iv) Dividen</p>
                                    </div>
                                  </div>
                                  <input type="hidden" name="counter_dividen" value="{{count($listDividenB)}}" id="counter_dividen">
                                  @foreach($listDividenB as $dividen)
                                  <!-- <input type="hidden" name="counter_dividen" value="0" id="counter_dividen"> -->
                                  <div id="dividen_field">
                                  <div class="row">
                                    <div class="col-md-3 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ $dividen->dividen_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light"  onkeypress="return onlyNumberKey(event)" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{$dividen->dividen_1_pegawai}}">
                                            @error('dividen_1_pegawai[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-2 mt-md-0">
                                        <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)"  name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{ $dividen->dividen_1_pasangan}}">
                                        @error('dividen_1_pasangan[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    @if($loop->last)
                                      <div class="col-md-1">
                                        <button class="add_field_button" id="add_dividen_button">Tambah</button>
                                    </div>
                                  @endif
                                  </div>
                                  <br>
                                  </div>
                                  @endforeach
                                  @endif
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
                                  <!-- @foreach ($errors->get('jenis_harta_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                              </div>

                          </div>

                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                            </div>
                            <div class="col-md-4">
                              <input class="form-control bg-light" type="text" id="pemilik_harta"  placeholder="Nama Pemilik" value="{{ $info->pemilik_harta  }}" >
                              <!-- @foreach ($errors->get('pemilik_harta_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>
                            <div class="col-md-4">
                                <select id="select_hubungan" class="custom-select  bg-light" >
                                    <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                    <option value="Sendiri" {{ $info->hubungan_pemilik   == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                    <option value="Anak" {{ $info->hubungan_pemilik   == "Anak" ? 'selected' : '' }}>Anak</option>
                                    <option value="Isteri/Suami" {{ $info->hubungan_pemilik   == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                    <option value="Ibu/Ayah" {{ $info->hubungan_pemilik   == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                    <option value="Lain-lain" {{ $info->hubungan_pemilik   == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                                <!-- @foreach ($errors->get('select_hubungan_.*') as $messages)
                                 @foreach($messages as $message)
                                   <div class="alert alert-danger">{{ $message }}</div>
                                 @endforeach
                                @endforeach -->
                            </div>
                            <br>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="maklumat_harta"  placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ $info->maklumat_harta  }}" autocomplete="nope" >
                              <!-- @foreach ($errors->get('maklumat_harta_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Tarikh Pemilikan Harta</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="date" id="tarikh_pemilikan_harta"  value="{{ $info->tarikh_pemilikan_harta  }}" >
                              <!-- @foreach ($errors->get('tarikh_pemilikan_harta_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                            </div>
                            <div class="col-md-4">
                              <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" id="bilangan"  placeholder="Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ $info->bilangan  }}" autocomplete="nope" >
                              <!-- @foreach ($errors->get('bilangan_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>
                            <div class="col-md-4">
                              <input class="form-control bg-light" type="text" id="unit_bilangan" onkeypress=""  placeholder="Sila Masukkan Unit (Meter Persegi , Ekar , CC)" value="{{ $info->unit_bilangan  }}" autocomplete="nope">
                              <!-- @foreach ($errors->get('unit_bilangan_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Nilai Perolehan Harta (RM)</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" id="nilai_perolehan"  placeholder="Nilai Perolehan Harta (RM)" value="{{ $info->nilai_perolehan  }}" >
                              <!-- @foreach ($errors->get('nilai_perolehan_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach -->
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                            </div>
                            <div class="col-md-8">
                                <select id="cara_perolehan" class="custom-select  bg-light"  onchange="showCaraPerolehan1()" >
                                    <option value="" selected disabled hidden>Cara Perolehan</option>
                                    <option value="Dipusakai" {{ $info->cara_perolehan   == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                    <option value="Dibeli" {{ $info->cara_perolehan   == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                    <option value="Dihadiahkan" {{ $info->cara_perolehan   == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                    <option value="Lain-lain" {{ $info->cara_perolehan   == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                                <!-- @foreach ($errors->get('cara_perolehan_.*') as $messages)
                                 @foreach($messages as $message)
                                   <div class="alert alert-danger">{{ $message }}</div>
                                 @endforeach
                                @endforeach -->
                            </div>

                            </div>
                            <br>

                            <div id="nama_pemilikan_asal_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required"> Dari Siapa Harta Diperolehi</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="nama_pemilikan_asal"  placeholder="Nama Pemilik Sebelum" value="{{ $info->nama_pemilikan_asal  }}">
                                  <!-- @foreach ($errors->get('nama_pemilikan_asal_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
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
                                  <input class="form-control bg-light" type="text" id="lain_lain"  value="{{ $info->lain_lain  }}">
                                  <!-- @foreach ($errors->get('lain_lain_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
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
                                  <select id="cara_belian" class="custom-select  bg-light"  onchange="showCaraBelian1()" >
                                      <option value="" selected disabled hidden>Cara Pembelian Harta</option>
                                      <option value="Pinjaman" {{ $info->cara_belian   == "Pinjaman" ? 'selected' : '' }}>Pinjaman</option>
                                      <option value="Tunai" {{ $info->cara_belian   == "Tunai" ? 'selected' : '' }}>Tunai</option>
                                      <option value="Pelupusan" {{ $info->cara_belian   == "Pelupusan" ? 'selected' : '' }}>Pelupusan</option>
                                  </select>
                                  <!-- @foreach ($errors->get('cara_belian_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                            </div>

                            <div id="tunai_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required"> Nyatakan nilai belian tunai</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="tunai" name="tunai" onkeypress="return onlyNumberKey(event)" value="{{ $info->tunai }}" autocomplete="off">
                                  <!-- @error('lain_lain_')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror -->
                                 <!-- @foreach ($errors->get('tunai_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach -->
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
                                  <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="jumlah_pinjaman"  value="{{ $info->jumlah_pinjaman  }}">
                                  <!-- @foreach ($errors->get('jumlah_pinjaman_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">ii)	Institusi memberi pinjaman</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="institusi_pinjaman"  value="{{ $info->institusi_pinjaman  }}">
                                  <!-- @foreach ($errors->get('institusi_pinjaman_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iii)	Tempoh bayaran balik</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="tempoh_bayar_balik"  value="{{ $info->tempoh_bayar_balik  }}">
                                  <!-- @foreach ($errors->get('tempoh_bayar_balik_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iv) Ansuran bulanan </p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="ansuran_bulanan"  value="{{ $info->ansuran_bulanan  }}">
                                  <!-- @foreach ($errors->get('ansuran_bulanan_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">v)	Tarikh ansuran pertama</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="date" id="tarikh_ansuran_pertama"  value="{{ $info->tarikh_ansuran_pertama  }}">
                                  <!-- @foreach ($errors->get('tarikh_ansuran_pertama_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="">vi)	Keterangan lain, Sila Nyatakan</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="keterangan_lain" value="{{ old('keterangan_lain')}}" autocomplete="off">
<!--
                                 @foreach ($errors->get('keterangan_lain_.*') as $messages)
                                  @foreach($messages as $message)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @endforeach
                                 @endforeach
                                </div> -->

                              </div>
                            </div>
                          </div>
                          <br>


                            <div id="pelupusan_container" style="display: none;">
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">i)	Jenis Harta</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="jenis_harta_pelupusan"  value="{{ $info->jenis_harta_pelupusan  }}">
                                  <!-- @foreach ($errors->get('jenis_harta_pelupusan_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">ii) Alamat</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="alamat_asset"  value="{{ $info->alamat_asset  }}">
                                  <!-- @foreach ($errors->get('alamat_asset_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iii) No Pendaftaran Harta</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="text" id="no_pendaftaran"  value="{{ $info->no_pendaftaran  }}">
                                  <!-- @foreach ($errors->get('no_pendaftaran_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">iv) Harga Jualan</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="harga_jualan"  value="{{ $info->harga_jualan  }}">
                                  <!-- @foreach ($errors->get('harga_jualan_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                  <p class="required">v)	Tarikh lupus</p>
                                </div>
                                <div class="col-md-8">
                                  <input class="form-control bg-light" type="date" id="tarikh_lupus"  value="{{ $info->tarikh_lupus  }}">
                                  <!-- @foreach ($errors->get('tarikh_lupus_.*') as $messages)
                                   @foreach($messages as $message)
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @endforeach
                                  @endforeach -->
                                </div>

                              </div>
                            </div>
                            </div>

                            <script type="text/javascript">
                            function showCaraPerolehan1(){
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
                            function showCaraBelian1(){
                              var cara_belian = $('#cara_belian').val();

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
                              if(cara_belian == "Tunai"){
                                document.getElementById('tunai_container').style.display ="block";
                              }
                              else{
                                document.getElementById('tunai_container').style.display ="none";
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
                        <br>
                      </div>
                      <br>

                <div class="card rounded-lg">
                    <div class="card-body">
                      <div class="card-title" style="text-align: center;">Keterangan Mengenai Harta</div>
                      <!-- Table -->
                      <div class="table-responsive">
                        @foreach ($errors->all() as $message)
                          <div class="alert alert-danger">
                              {{ $message }}
                          </div>
                        @endforeach
                          <table class="table table-bordered css-serial" id="table_keterangan">
                              <thead>
                                  <tr class="text-center">
                                      <th width="3%"><p class="mb-0">Nombor</p></th>
                                      <th width="5%"><p class="mb-0">Jenis Harta</p></th>
                                      <th width="5%"><p class="mb-0">Pemilik Harta</p></th>
                                      <th width="10%"><p class="mb-0">Tarikh Pemilikan Harta</p></th>
                                      <th colspan="2" width="30%"><p class="mb-0">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p></th>
                                      <th width="12%"><p class="mb-0">Nilai Perolehan Harta (RM)</p></th>
                                      <th width="5%"><p class="mb-0">Tindakan</p></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $i=0; ?>
                                  @foreach($hartaB as $data)
                                  <tr>
                                      <td><p class="mb-0 " style="text-align: center;" id="harta_table_id{{$data->id}}"></p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="jenis_harta_table{{$data->id}}">{{$data->jenis_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="pemilik_harta_table{{$data->id}}">{{$data->pemilik_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="tarikh_pemilikan_harta_table{{$data->id}}">{{$data->tarikh_pemilikan_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="bilangan_table{{$data->id}}">{{$data->bilangan}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="unit_bilangan_table{{$data->id}}">{{$data->unit_bilangan}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="nilai_perolehan_table{{$data->id}}">{{$data->nilai_perolehan}}</p></td>
                                      <!-- <td><a href="{{route('hartaB.delete',$data->id)}}"><i class="fas fa-trash-alt"></i></td> -->
                                      <td style="align:center">
                                        <a class="btn btn-success mr-1" id="editHarta{{$data->id}}" onClick="clearData({{$data->id}});updateData({{$data->id}});"><i class="fa fa-pencil-alt" ></i></a>
                                        <a class="btn btn-danger mr-1" onClick="removeJumlahPinjaman({{$data->id}});removeData(this,'{{$data->id}}'); return false;"><i class="fa fa-trash" ></i></a>
                                      </td>
                                  </tr>
                                  <?php $i++; ?>
                                    @endforeach

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
                        @if($info->pinjaman_perumahan_pegawai)
                        <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai" name="pinjaman_perumahan_pegawai" value="{{$info->pinjaman_perumahan_pegawai}}" >
                        @else
                          @if(old('pinjaman_perumahan_pegawai'))
                          <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai" name="pinjaman_perumahan_pegawai" value="{{old('pinjaman_perumahan_pegawai')}}" >
                          @else
                          <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai" name="pinjaman_perumahan_pegawai" value=0 >
                          @endif
                        @endif
                        <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_perumahan_pegawai" value="{{ $info->pinjaman_perumahan_pegawai}}"> -->

                      </div>
                      @error('pinjaman_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        @if($info->bulanan_perumahan_pegawai)
                        <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai" name="bulanan_perumahan_pegawai" value="{{$info->bulanan_perumahan_pegawai}}" >
                        @else
                          @if(old('bulanan_perumahan_pegawai'))
                          <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai" name="bulanan_perumahan_pegawai" value="{{old('bulanan_perumahan_pegawai')}}" >
                          @else
                          <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai" name="bulanan_perumahan_pegawai" value=0 >
                          @endif
                        @endif

                      </div>
                      @error('bulanan_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          @if($info->pinjaman_perumahan_pasangan)
                          <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan" name="pinjaman_perumahan_pasangan" value="{{$info->pinjaman_perumahan_pasangan}}" >
                          @else
                            @if(old('pinjaman_perumahan_pasangan'))
                            <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan" name="pinjaman_perumahan_pasangan" value="{{old('pinjaman_perumahan_pasangan')}}" >
                            @else
                            <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan" name="pinjaman_perumahan_pasangan" value=0 >
                            @endif
                          @endif
                          <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_perumahan_pasangan" value="{{ $info->pinjaman_perumahan_pasangan}}"> -->
                        </div>
                        @error('pinjaman_perumahan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          @if($info->bulanan_perumahan_pasangan)
                          <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan" name="bulanan_perumahan_pasangan" value="{{$info->bulanan_perumahan_pasangan}}" >
                          @else
                            @if(old('bulanan_perumahan_pasangan'))
                            <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan" name="bulanan_perumahan_pasangan" value="{{old('bulanan_perumahan_pasangan')}}" >
                            @else
                            <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan" name="bulanan_perumahan_pasangan" value=0 >
                            @endif
                          @endif
                          <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_perumahan_pasangan" value="{{ $info->bulanan_perumahan_pasangan}}"> -->
                      </div>
                      @error('bulanan_perumahan_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--PINJAMAN KENDERAAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>ii) Jumlah Pinjaman Kenderaan</p>
                      </div>
                      <div class="col-md-2">
                        @if($info->pinjaman_kenderaan_pegawai)
                        <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai" name="pinjaman_kenderaan_pegawai" value="{{$info->pinjaman_kenderaan_pegawai}}" >
                        @else
                          @if(old('pinjaman_kenderaan_pegawai'))
                          <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai" name="pinjaman_kenderaan_pegawai" value="{{old('pinjaman_kenderaan_pegawai')}}" >
                          @else
                          <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai" name="pinjaman_kenderaan_pegawai" value=0 >
                          @endif
                        @endif
                        <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_kenderaan_pegawai" value="{{ $info->pinjaman_kenderaan_pegawai}}"> -->
                      </div>
                      @error('pinjaman_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        @if($info->bulanan_kenderaan_pegawai)
                        <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai" name="bulanan_kenderaan_pegawai" value="{{$info->bulanan_kenderaan_pegawai}}" >
                        @else
                          @if(old('bulanan_kenderaan_pegawai'))
                          <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai" name="bulanan_kenderaan_pegawai" value="{{old('bulanan_kenderaan_pegawai')}}" >
                          @else
                          <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai" name="bulanan_kenderaan_pegawai" value=0 >
                          @endif
                        @endif
                        <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_kenderaan_pegawai" value="{{ $info->bulanan_kenderaan_pegawai}}"> -->
                      </div>
                      @error('bulanan_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          @if($info->pinjaman_kenderaan_pasangan)
                          <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan" name="pinjaman_kenderaan_pasangan" value="{{$info->pinjaman_kenderaan_pasangan}}" >
                          @else
                            @if(old('pinjaman_kenderaan_pasangan'))
                            <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan" name="pinjaman_kenderaan_pasangan" value="{{old('pinjaman_kenderaan_pasangan')}}" >
                            @else
                            <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan" name="pinjaman_kenderaan_pasangan" value=0 >
                            @endif
                          @endif
                          <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_kenderaan_pasangan" value="{{ $info->pinjaman_kenderaan_pasangan}}"> -->
                        </div>
                        @error('pinjaman_kenderaan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          @if($info->bulanan_kenderaan_pasangan)
                          <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan" name="bulanan_kenderaan_pasangan" value="{{$info->bulanan_kenderaan_pasangan}}" >
                          @else
                            @if(old('bulanan_kenderaan_pasangan'))
                            <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan" name="bulanan_kenderaan_pasangan" value="{{old('bulanan_kenderaan_pasangan')}}" >
                            @else
                            <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan" name="bulanan_kenderaan_pasangan" value=0 >
                            @endif
                          @endif
                          <!-- <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_kenderaan_pasangan" value="{{ $info->bulanan_kenderaan_pasangan}}"> -->
                      </div>
                      @error('bulanan_kenderaan_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--CUKAI PENDAPATAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iii) Cukai Pendapatan</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_cukai_pegawai" value="{{ $info->jumlah_cukai_pegawai}}">
                      </div>
                      @error('jumlah_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_cukai_pegawai" value="{{ $info->bulanan_cukai_pegawai}}">
                      </div>
                      @error('bulanan_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="jumlah_cukai_pasangan" value="{{ $info->jumlah_cukai_pasangan}}">
                        </div>
                        @error('jumlah_cukai_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_cukai_pasangan" value="{{ $info->bulanan_cukai_pasangan}}">
                      </div>
                      @error('bulanan_cukai_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--PINJAMAN KOPERASI -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iv) Pinjaman Koperasi</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" onkeyup="findTotalPinjamanPegawai()" onkeypress="return onlyNumberKey(event)" name="jumlah_koperasi_pegawai" value="{{ $info->jumlah_koperasi_pegawai}}" id="jumlah_koperasi_pegawai">
                      </div>
                      @error('jumlah_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" onkeyup="findTotalBulananPegawai()" onkeypress="return onlyNumberKey(event)" name="bulanan_koperasi_pegawai" value="{{ $info->bulanan_koperasi_pegawai}}" id="bulanan_koperasi_pegawai">
                      </div>
                      @error('bulanan_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" onkeyup="findTotalPinjamanPasangan()" onkeypress="return onlyNumberKey(event)" name="jumlah_koperasi_pasangan" value="{{ $info->jumlah_koperasi_pasangan}}" id="jumlah_koperasi_pasangan">
                        </div>
                        @error('jumlah_koperasi_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" onkeyup="findTotalBulananPasangan()" onkeypress="return onlyNumberKey(event)" name="bulanan_koperasi_pasangan" value="{{ $info->bulanan_koperasi_pasangan}}" id="bulanan_koperasi_pasangan">
                      </div>
                    </div>
                    <br>

                    <!--LAIN2 PINJAMAN -->
                    <input type="hidden" name="counter" value="0" id="counter1">
                    @if($listPinjamanB->isEmpty())
                    <div class="row">
                      <div class="col-md-3">
                        <p>v) Lain-Lain Pinjaman</p>
                      </div>
                    </div>
                    <div class="table_lain" id="table_lain">
                    <div class="row">
                      <div class="col-md-3">
                        <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman"  value="{{ old('lain_lain_pinjaman[]')}}">
                      </div>
                      @error('lain_lain_pinjaman[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_pegawai[]" value="{{ old('pinjaman_pegawai[]')}}">
                      </div>
                      @error('pinjaman_pegawai[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_pegawai[]" value="{{ old('bulanan_pegawai[]')}}">
                      </div>
                      @error('bulanan_pegawai[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_pasangan[]" value="{{ old('pinjaman_pasangan[]')}}">
                        </div>
                        @error('pinjaman_pasangan[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_pasangan[]" value="{{ old('bulanan_pasangan[]')}}">
                      </div>
                      @error('bulanan_pasangan[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-1">
                        <button class="add_field_button" id="add_pinjaman_button">Tambah</button>
                    </div>
                    </div>
                    <br>
                    </div>
                    @else
                    <!--LAIN2 PINJAMAN -->

                    <div class="row">
                      <div class="col-md-3">
                        <p>v) Lain-Lain Pinjaman</p>
                      </div>
                    </div>
                    <input type="hidden" name="counter_pinjaman" value="{{$count_pinjaman}}" id="counter_pinjaman">

                    <div class="table_lain" id="table_lain">
                      @foreach($listPinjamanB as $pinjaman)
                      <div class="row">
                        <div class="col-md-3">
                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ $pinjaman->lain_lain_pinjaman}}">
                        </div>
                        @error('lain_lain_pinjaman[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_pegawai[]" value="{{ $pinjaman->pinjaman_pegawai}}">
                        </div>
                        @error('pinjaman_pegawai[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_pegawai[]" value="{{ $pinjaman->bulanan_pegawai}}">
                        </div>
                        @error('bulanan_pegawai[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                          <div class="col-md-2">
                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="pinjaman_pasangan[]" value="{{$pinjaman->pinjaman_pasangan}}">
                          </div>
                          @error('pinjaman_pasangan[]')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                          <div class="col-md-2">
                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" name="bulanan_pasangan[]" value="{{ $pinjaman->bulanan_pasangan}}">
                        </div>
                        @error('bulanan_pasangan[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                       @if($loop->last)
                        <div class="col-md-1">
                          <button class="add_field_button" id="add_pinjaman_button">Tambah</button>
                      </div>
                      @endif
                      </div>
                      <br>
                      @endforeach
                      </div>

                      @endif
                  </div>
                </div>
              </div>
          </div>
          @endif

          <div id="harta_container" style="display: none;">
            <div class="row">
              <div class="col-12 mt-4">

                   <div class="card rounded-lg">
                       <div class="card-body">

                      <div class="row">
                        <div class="col-md-4">
                          <p><b> KEMASKINI HARTA</b></p>
                        </div>
                      </div>

                      <input class="form-control bg-light" type="hidden" id="id_harta_hidden" >

                      <div class="row">
                          <div class="col-md-4">
                            <p class="required">Jenis Harta</p>
                          </div>
                          <div class="col-md-8">
                            <input id="jenis_harta_edit" list="harta" class="custom-select  bg-light" name="jenis_harta" value="{{ old('jenis_harta')}}" placeholder="Sila masukan harta" autocomplete="off">
                                <datalist id="harta">
                                  @foreach($jenisHarta as $jenisharta)
                                  @if($jenisharta->status_jenis_harta == "Aktif")
                                  <option value="{{$jenisharta->jenis_harta}}">{{$jenisharta->jenis_harta}}</option>
                                  @endif
                                  @endforeach
                                </datalist>
                                <option value="" selected disabled hidden>Jenis Harta</option>
                              </input>
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
                          <input class="form-control bg-light" type="text" id="pemilik_harta_edit"  placeholder="Nama Pemilik" value="{{ $info->pemilik_harta  }}">
                          @foreach ($errors->get('pemilik_harta_.*') as $messages)
                           @foreach($messages as $message)
                             <div class="alert alert-danger">{{ $message }}</div>
                           @endforeach
                          @endforeach
                        </div>
                        <div class="col-md-4">
                            <select id="hubungan_pemilik_edit" class="custom-select  bg-light" >
                                <!-- <option value="" {{ $info->hubungan_pemilik   == "" ? '' : 'selected disabled hidden' }} >Hubungan dengan Pemilik</option> -->
                                <option value="Sendiri" {{ $info->hubungan_pemilik == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                <option value="Anak" {{ $info->hubungan_pemilik == "Anak" ? 'selected' : '' }}>Anak</option>
                                <option value="Isteri/Suami" {{ $info->hubungan_pemilik == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                <option value="Ibu/Ayah" {{ $info->hubungan_pemilik == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                <option value="Lain-lain" {{ $info->hubungan_pemilik == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                            @foreach ($errors->get('select_hubungan_.*') as $messages)
                             @foreach($messages as $message)
                               <div class="alert alert-danger">{{ $message }}</div>
                             @endforeach
                            @endforeach
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" id="maklumat_harta_edit"  placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ $info->maklumat_harta  }}" autocomplete="nope">
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
                          <input class="form-control bg-light" type="date" id="tarikh_pemilikan_harta_edit"  value="{{ $info->tarikh_pemilikan_harta  }}" >
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
                          <p class="required">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                        </div>
                        <div class="col-md-4">
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" id="bilangan_edit"  placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ $info->bilangan  }}" autocomplete="nope">
                          @foreach ($errors->get('bilangan_.*') as $messages)
                           @foreach($messages as $message)
                             <div class="alert alert-danger">{{ $message }}</div>
                           @endforeach
                          @endforeach
                        </div>
                        <div class="col-md-4">
                          <input class="form-control bg-light" type="text" id="unit_bilangan_edit" onkeypress="" placeholder="Sila Masukkan Unit (Meter Persegi , Ekar , CC)" value="{{ $info->unit_bilangan  }}" autocomplete="nope">
                          @foreach ($errors->get('unit_bilangan_.*') as $messages)
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
                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event)" id="nilai_perolehan_edit"  placeholder="Nilai Perolehan Harta (RM)" value="{{ $info->nilai_perolehan  }}" >
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
                            <select id="cara_perolehan_edit" class="custom-select  bg-light"  onchange="showCaraPerolehan()" >
                                <option value="" selected disabled hidden>Cara Perolehan</option>
                                <option value="Dipusakai" {{ $info->cara_perolehan   == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                <option value="Dibeli" {{ $info->cara_perolehan   == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                <option value="Dihadiahkan" {{ $info->cara_perolehan   == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                <option value="Lain-lain" {{ $info->cara_perolehan   == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                            @foreach ($errors->get('cara_perolehan_.*') as $messages)
                             @foreach($messages as $message)
                               <div class="alert alert-danger">{{ $message }}</div>
                             @endforeach
                            @endforeach
                        </div>

                        </div>
                        <br>


                        <div id="nama_pemilikan_asal_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required"> Dari Siapa Harta Diperolehi</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="nama_pemilikan_asal_edit"  placeholder="Nama Pemilik Sebelum" value="{{ $info->nama_pemilikan_asal  }}">
                              @foreach ($errors->get('nama_pemilikan_asal_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                          <br>
                        </div>

                        <div id="lain-lain_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required"> Nyatakan,</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="lain_lain_edit"  value="{{ $info->lain_lain  }}">
                              @foreach ($errors->get('lain_lain_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                          <br>
                        </div>

                        <div id="cara_belian_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required"> Cara Pembelian Harta</p>
                            </div>
                            <div class="col-md-8">
                              <select id="cara_belian_edit" class="custom-select  bg-light"  onchange="showCaraBelian()" >
                                  <option value="" selected disabled hidden>Cara Pembelian Harta</option>
                                  <option value="Pinjaman" {{ $info->cara_belian   == "Pinjaman" ? 'selected' : '' }}>Pinjaman</option>
                                  <option value="Pelupusan" {{ $info->cara_belian   == "Pelupusan" ? 'selected' : '' }}>Pelupusan</option>
                                  <option value="Tunai" {{ $info->cara_belian   == "Tunai" ? 'selected' : '' }}>Tunai</option>
                              </select>
                              @foreach ($errors->get('cara_belian_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                          <br>
                        </div>

                        <div id="tunai_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required"> Nyatakan nilai belian tunai</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="tunai_edit" onkeypress="return onlyNumberKey(event)" value="{{ $info->tunai }}" autocomplete="off">
                              <!-- @error('lain_lain_')
                                 <div class="alert alert-danger">{{ $message }}</div>
                             @enderror -->
                             @foreach ($errors->get('tunai_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>

                          </div>
                          <br>
                        </div>

                        <div id="pinjaman_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">i) Jumlah Pinjaman</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="jumlah_pinjaman_edit"  value="{{ $info->jumlah_pinjaman  }}">
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
                              <input class="form-control bg-light" type="text" id="institusi_pinjaman_edit"  value="{{ $info->institusi_pinjaman  }}">
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
                              <input class="form-control bg-light" type="text" id="tempoh_bayar_balik_edit"  value="{{ $info->tempoh_bayar_balik  }}">
                              @foreach ($errors->get('tempoh_bayar_balik_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">iv) Ansuran bulanan </p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="ansuran_bulanan_edit"  value="{{ $info->ansuran_bulanan  }}">
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
                              <input class="form-control bg-light" type="date" id="tarikh_ansuran_pertama_edit"  value="{{ $info->tarikh_ansuran_pertama  }}">
                              @foreach ($errors->get('tarikh_ansuran_pertama_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                              <p class="">vi)	Keterangan lain, Sila Nyatakan</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="keterangan_lain_edit" value="{{ $info->keterangan_lain  }}" autocomplete="off">

                             @foreach ($errors->get('keterangan_lain_.*') as $messages)
                              @foreach($messages as $message)
                                <div class="alert alert-danger">{{ $message }}</div>
                              @endforeach
                             @endforeach
                            </div>

                          </div>
                        </div>

                        <div id="pelupusan_container_edit" style="display: none;">
                          <div class="row">
                            <div class="col-md-4">
                              <p class="required">i)	Jenis Harta</p>
                            </div>
                            <div class="col-md-8">
                              <input class="form-control bg-light" type="text" id="jenis_harta_pelupusan_edit"  value="{{ $info->jenis_harta_pelupusan  }}">
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
                              <input class="form-control bg-light" type="text" id="alamat_asset_edit"  value="{{ $info->alamat_asset  }}">
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
                              <input class="form-control bg-light" type="text" id="no_pendaftaran_edit"  value="{{ $info->no_pendaftaran  }}">
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
                              <input class="form-control bg-light" onkeypress="return onlyNumberKey(event)" type="text" id="harga_jualan_edit"  value="{{ $info->harga_jualan  }}">
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
                              <input class="form-control bg-light" type="date" id="tarikh_lupus_edit"  value="{{ $info->tarikh_lupus  }}">
                              @foreach ($errors->get('tarikh_lupus_.*') as $messages)
                               @foreach($messages as $message)
                                 <div class="alert alert-danger">{{ $message }}</div>
                               @endforeach
                              @endforeach
                            </div>

                          </div>
                        </div>
                        </div>

                        <script type="text/javascript">
                        function showCaraPerolehan(){
                          var cara_peroleh = $('#cara_perolehan_edit').val();

                          if(cara_peroleh == "Dipusakai" || cara_peroleh == "Dihadiahkan"){
                            document.getElementById('nama_pemilikan_asal_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('nama_pemilikan_asal_container_edit').style.display ="none";
                          }

                          if(cara_peroleh == "Dibeli"){
                            document.getElementById('cara_belian_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('cara_belian_container_edit').style.display ="none";
                          }

                          if(cara_peroleh == "Lain-lain"){
                            document.getElementById('lain-lain_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('lain-lain_container_edit').style.display ="none";
                          }

                        }
                        </script>

                        <script type="text/javascript">
                        function showCaraBelian(){
                          var cara_belian = $('#cara_belian_edit').val();

                          if(cara_belian == "Pinjaman"){
                            document.getElementById('pinjaman_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('pinjaman_container_edit').style.display ="none";
                          }

                          if(cara_belian == "Pelupusan"){
                            document.getElementById('pelupusan_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('pelupusan_container_edit').style.display ="none";
                          }
                          if(cara_belian == "Tunai"){
                            document.getElementById('tunai_container_edit').style.display ="block";
                          }
                          else{
                            document.getElementById('tunai_container_edit').style.display ="none";
                          }


                        }
                        </script>

                      <div class="row">
                          <div class="col-md-5">

                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary" type="button" value="" id="kemaskiniHarta" onclick="DataUpdate(this.value);calculatePinjamanPerumahan_edit();clearContainer(this.value);">Kemaskini</button>
                          </div>
                      </div>
                      <br>
                    <br>
                  </div>
                  <br>
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

            </div>
            </form>
          </div>
          <br><br><br>

           <!--script-->
           <script type="text/javascript">
           function updateData(e){
               document.getElementById('harta_container').style.display ="block";
               @foreach($hartaB as $data)

               if({{$data->id}} == e){
                 // console.log("{{$data->hubungan_pemilik}}");
                 document.getElementById("id_harta_hidden").value = "{{$data->id}}";
                 document.getElementById("kemaskiniHarta").value = "{{$data->id}}";
                 document.getElementById("jenis_harta_edit").value = "{{$data->jenis_harta}}";
                 document.getElementById("pemilik_harta_edit").value = "{{$data->pemilik_harta}}";

                 // $("hubungan_pemilik_edit select").val("{{$data->hubungan_pemilik}}");
                 document.getElementById('hubungan_pemilik_edit').value = '{{$data->hubungan_pemilik}}';
                 // document.getElementById("hubungan_pemilik_edit").value = "{{$data->select_hubungan}}";

                 document.getElementById("maklumat_harta_edit").value = "{{$data->maklumat_harta}}";
                 document.getElementById("tarikh_pemilikan_harta_edit").value = "{{$data->tarikh_pemilikan_harta}}";
                 document.getElementById("bilangan_edit").value = "{{$data->bilangan}}";
                 document.getElementById("unit_bilangan_edit").value = "{{$data->unit_bilangan}}";
                 document.getElementById("nilai_perolehan_edit").value = "{{$data->nilai_perolehan}}";
                 document.getElementById("cara_perolehan_edit").value = "{{$data->cara_perolehan}}";
                 if("{{$data->cara_perolehan}}" == "Dipusakai" || "{{$data->cara_perolehan}}" == "Dihadiahkan"){
                   document.getElementById("nama_pemilikan_asal_container_edit").style="display: block;";
                   document.getElementById("nama_pemilikan_asal_edit").value = "{{$data->nama_pemilikan_asal}}";
                 }
                 else if("{{$data->cara_perolehan}}" == "Lain-lain"){
                   document.getElementById("lain-lain_container_edit").style="display: block;";
                   document.getElementById("lain_lain_edit").value = "{{$data->lain_lain}}";
                }
                else if("{{$data->cara_perolehan}}" == "Dibeli"){
                  document.getElementById("cara_belian_container_edit").style="display: block;";
                  document.getElementById("cara_belian_edit").value = "{{$data->cara_belian}}";
                  if("{{$data->cara_belian}}" == "Pinjaman"){
                      document.getElementById("pinjaman_container_edit").style="display: block;";
                      document.getElementById("jumlah_pinjaman_edit").value = "{{$data->jumlah_pinjaman}}";
                      document.getElementById("institusi_pinjaman_edit").value = "{{$data->institusi_pinjaman}}";
                      document.getElementById("tempoh_bayar_balik_edit").value = "{{$data->tempoh_bayar_balik}}";
                      document.getElementById("ansuran_bulanan_edit").value = "{{$data->ansuran_bulanan}}";
                      document.getElementById("tarikh_ansuran_pertama_edit").value = "{{$data->tarikh_ansuran_pertama}}";
                      document.getElementById("keterangan_lain_edit").value = "{{$data->keterangan_lain}}";

                  }
                  else if("{{$data->cara_belian}}" == "Pelupusan"){
                    document.getElementById("pelupusan_container_edit").style="display: block;";
                    document.getElementById("jenis_harta_pelupusan_edit").value = "{{$data->jenis_harta_pelupusan}}";
                    document.getElementById("alamat_asset_edit").value = "{{$data->alamat_asset}}";
                    document.getElementById("no_pendaftaran_edit").value = "{{$data->no_pendaftaran}}";
                    document.getElementById("harga_jualan_edit").value = "{{$data->harga_jualan}}";
                    document.getElementById("tarikh_lupus_edit").value = "{{$data->tarikh_lupus}}";
                  }
                  else if("{{$data->cara_belian}}" == "Tunai"){
                    document.getElementById("tunai_container_edit").style="display: block;";
                    document.getElementById("tunai_edit").value="{{$data->tunai}}";
                  }

                }
               }
               @endforeach

            }
          </script>

          <script>
             function clearData(e){
               @foreach($hartaB as $data)
               if({{$data->id}} == e){
               $("#tarikh_pemilikan_harta_edit").val("")
               $("#jenis_harta_edit").prop('selectedIndex', 0);
               $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
               $("#cara_perolehan_edit").prop('selectedIndex', 0);
               $("#cara_belian_edit").prop('selectedIndex', 0);
               $("#tarikh_lupus_edit").val("")
               $("#tarikh_ansuran_pertama_edit").val("")


               document.getElementById("jenis_harta_edit").value = "";
               document.getElementById("pemilik_harta_edit").value = "";
               document.getElementById("maklumat_harta_edit").value = "";
               document.getElementById("bilangan_edit").value = "";
               document.getElementById("unit_bilangan_edit").value = "";
               document.getElementById("nilai_perolehan_edit").value = "";
               document.getElementById("nama_pemilikan_asal_edit").value = "";
               document.getElementById("jumlah_pinjaman_edit").value = "";
               document.getElementById("institusi_pinjaman_edit").value = "";
               document.getElementById("cara_belian_container_edit").style="display: none;";
               document.getElementById("nama_pemilikan_asal_container_edit").style="display: none;";
               document.getElementById("lain-lain_container_edit").style="display: none;";
               document.getElementById("pinjaman_container_edit").style="display: none;";
               document.getElementById("pelupusan_container_edit").style="display: none;";
               document.getElementById("tunai_container_edit").style="display: none;";
               document.getElementById("tempoh_bayar_balik_edit").value = "";
               document.getElementById("ansuran_bulanan_edit").value = "";
               document.getElementById("keterangan_lain").value = "";
               document.getElementById("jenis_harta_pelupusan_edit").value = "";
               document.getElementById("alamat_asset_edit").value = "";
               document.getElementById("no_pendaftaran_edit").value = "";
               document.getElementById("harga_jualan_edit").value = "";
               document.getElementById("lain_lain_edit").value = "";
               document.getElementById("tunai_edit").value = "";
             }
             @endforeach
           }

           </script>

           <script>
              function clearContainer(e){
                @foreach($hartaB as $data)
                if({{$data->id}} == e){
                $("#tarikh_pemilikan_harta_edit").val("")
                $("#jenis_harta_edit").prop('selectedIndex', 0);
                $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
                $("#cara_perolehan_edit").prop('selectedIndex', 0);
                $("#cara_belian_edit").prop('selectedIndex', 0);
                $("#tarikh_lupus_edit").val("")
                $("#tarikh_ansuran_pertama_edit").val("")


                document.getElementById("jenis_harta_edit").value = "";
                document.getElementById("pemilik_harta_edit").value = "";
                document.getElementById("maklumat_harta_edit").value = "";
                document.getElementById("bilangan_edit").value = "";
                document.getElementById("unit_bilangan_edit").value = "";
                document.getElementById("nilai_perolehan_edit").value = "";
                document.getElementById("nama_pemilikan_asal_edit").value = "";
                document.getElementById("jumlah_pinjaman_edit").value = "";
                document.getElementById("institusi_pinjaman_edit").value = "";
                document.getElementById("cara_belian_container_edit").style="display: none;";
                document.getElementById("nama_pemilikan_asal_container_edit").style="display: none;";
                document.getElementById("lain-lain_container_edit").style="display: none;";
                document.getElementById("pinjaman_container_edit").style="display: none;";
                document.getElementById("pelupusan_container_edit").style="display: none;";
                document.getElementById("tunai_container_edit").style="display: none;";
                document.getElementById("tempoh_bayar_balik_edit").value = "";
                document.getElementById("ansuran_bulanan_edit").value = "";
                document.getElementById("keterangan_lain_edit").value = "";
                document.getElementById("jenis_harta_pelupusan_edit").value = "";
                document.getElementById("alamat_asset_edit").value = "";
                document.getElementById("no_pendaftaran_edit").value = "";
                document.getElementById("harga_jualan_edit").value = "";
                document.getElementById("lain_lain_edit").value = "";
                document.getElementById("tunai_edit").value = "";
              }
              @endforeach
              document.getElementById('harta_container').style.display ="none";
            }

            </script>

           <script>
           function DataUpdate(e){
             console.log(e)
             @foreach($hartaB as $data)
             if({{$data->id}} == e){
             // update table
               document.getElementById("jenis_harta_table"+e).value = document.getElementById("jenis_harta_edit").value;
               document.getElementById("pemilik_harta_table"+e).innerHTML  = document.getElementById("pemilik_harta_edit").value;
               // document.getElementById("tarikh_pemilikan_harta_table"+e).value = "{{$data->tarikh_pemilikan_harta}}";
               document.getElementById("tarikh_pemilikan_harta_table"+e).innerHTML = document.getElementById("tarikh_pemilikan_harta_edit").value;
               // document.getElementById("bilangan_table"+e).value = "{{$data->bilangan}}";
               document.getElementById("bilangan_table"+e).innerHTML = document.getElementById("bilangan_edit").value;
               document.getElementById("unit_bilangan_table"+e).innerHTML = document.getElementById("unit_bilangan_edit").value;

               // document.getElementById("unit_bilangan_table"+e).value = "{{$data->unit_bilangan}}";
               document.getElementById("nilai_perolehan_table"+e).innerHTML = document.getElementById("nilai_perolehan_edit").value;

            // update hidden input
            document.getElementById("jenis_harta"+e).value = document.getElementById("jenis_harta_edit").value;
            document.getElementById("pemilik_harta"+e).value = document.getElementById("pemilik_harta_edit").value;
            document.getElementById("select_hubungan"+e).value = document.getElementById("hubungan_pemilik_edit").value;
            document.getElementById("maklumat_harta"+e).value = document.getElementById("maklumat_harta_edit").value;
            document.getElementById("tarikh_pemilikan_harta"+e).value = document.getElementById("tarikh_pemilikan_harta_edit").value;
            document.getElementById("bilangan"+e).value = document.getElementById("bilangan_edit").value;
            document.getElementById("unit_bilangan"+e).value = document.getElementById("unit_bilangan_edit").value;
            document.getElementById("nilai_perolehan"+e).value = document.getElementById("nilai_perolehan_edit").value;
            document.getElementById("cara_perolehan"+e).value = document.getElementById("cara_perolehan_edit").value;
            if(document.getElementById("cara_perolehan_edit").value == "Dipusakai" || document.getElementById("cara_perolehan_edit").value == "Dihadiahkan" ){
              document.getElementById("nama_pemilikan_asal"+e).value = document.getElementById("nama_pemilikan_asal_edit").value;
            }
            else if(document.getElementById("cara_perolehan_edit").value == "Lain-lain"){
              document.getElementById("lain_lain"+e).value = document.getElementById("lain_lain_edit").value;
            }
            else if(document.getElementById("cara_perolehan_edit").value == "Dibeli"){
              document.getElementById("cara_belian"+e).value = document.getElementById("cara_belian_edit").value;

                if(document.getElementById("cara_belian_edit").value == "Pinjaman"){
                  document.getElementById("jumlah_pinjaman"+e).value =   document.getElementById("jumlah_pinjaman_edit").value;
                  document.getElementById("institusi_pinjaman"+e).value = document.getElementById("institusi_pinjaman_edit").value;
                  document.getElementById("tempoh_bayar_balik"+e).value = document.getElementById("tempoh_bayar_balik_edit").value;
                  document.getElementById("ansuran_bulanan"+e).value = document.getElementById("ansuran_bulanan_edit").value;
                  document.getElementById("keterangan_lain"+e).value = document.getElementById("keterangan_lain_edit").value;

                }
                else if(document.getElementById("cara_belian_edit").value == "Pelupusan"){
                  document.getElementById("jenis_harta_pelupusan"+e).value =   document.getElementById("jenis_harta_pelupusan_edit").value;
                  document.getElementById("alamat_asset"+e).value = document.getElementById("alamat_asset_edit").value;
                  document.getElementById("no_pendaftaran"+e).value = document.getElementById("no_pendaftaran_edit").value;
                  document.getElementById("harga_jualan"+e).value = document.getElementById("harga_jualan_edit").value;
                  document.getElementById("tarikh_lupus"+e).value = document.getElementById("tarikh_lupus_edit").value;
                }
                else if(document.getElementById("cara_belian_edit").value == "Tunai"){
                  document.getElementById("tunai"+e).value =   document.getElementById("tunai_edit").value;

                }
            }

          }
        @endforeach
        }
           </script>



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
                 ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)" name="pinjaman_pegawai[]" id="pinjaman_pegawai['+
                 counter+
                 ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)" name="bulanan_pegawai[]" id="bulanan_pegawai['+
                 counter+
                 ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)" name="pinjaman_pasangan[]" id="pinjaman_pasangan['+
                 counter+
                 ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event)" name="bulanan_pasangan[]" id="bulanan_pasangan['+
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
                  ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" onchange="return copyCat('+counter_dividen+')" onkeypress="return onlyNumberKey(event)" name="dividen_1_pegawai[]" id="dividen_1_pegawai['+
                  counter_dividen+
                  ']" placeholder="Dividen Pegawai"></div></div><input type="hidden" onchange="return copyCat('+counter_dividen+')" name="counter" id="counter_for_dividen" value="'+
                  counter_dividen+
                  '"><div class="col-md-4 mt-2 mt-md-0" id="dividen"><input class="form-control bg-light" id="dividen_1_pasangan['+
                  counter_dividen+
                  ']" onkeypress="return onlyNumberKey(event)" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" id="dividen_pasangan" onchange="return copyCat('+counter_dividen+')"></div><div class="col-md-1"><a onClick="removeDividen(this,'+
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

           function keterangan(){
            var jenis_harta = document.getElementById("jenis_harta").value;
            var pemilik_harta = document.getElementById("pemilik_harta").value;
            var select_hubungan = document.getElementById("select_hubungan").value;
            var maklumat_harta = document.getElementById("maklumat_harta").value;
            var tarikh_pemilikan_harta = document.getElementById("tarikh_pemilikan_harta").value;
            var bilangan = document.getElementById("bilangan").value;
            var unit_bilangan = document.getElementById("unit_bilangan").value;
            var nilai_perolehan = document.getElementById("nilai_perolehan").value;
            var cara_perolehan = document.getElementById("cara_perolehan").value;
            var nama_pemilikan_asal = document.getElementById("nama_pemilikan_asal").value;
            var lain_lain = document.getElementById("lain_lain").value;
            var cara_belian = document.getElementById("cara_belian").value;
            var tunai = document.getElementById("tunai").value;
            var jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
            var institusi_pinjaman = document.getElementById("institusi_pinjaman").value;
            var tempoh_bayar_balik = document.getElementById("tempoh_bayar_balik").value;
            var ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
            var tarikh_ansuran_pertama = document.getElementById("tarikh_ansuran_pertama").value;
            var keterangan_lain = document.getElementById("keterangan_lain").value;
            var jenis_harta_pelupusan = document.getElementById("jenis_harta_pelupusan").value;
            var alamat_asset = document.getElementById("alamat_asset").value;
            var no_pendaftaran = document.getElementById("no_pendaftaran").value;
            var harga_jualan = document.getElementById("harga_jualan").value;
            var tarikh_lupus = document.getElementById("tarikh_lupus").value;

            var counter_keterangan = document.getElementById("counter_keterangan").value;
            var increment_keterangan = document.getElementById("increment_keterangan").value;
            increment_keterangan++;
            counter_keterangan++;
            //tambah table
            $("#table_keterangan").append(
              '<tr><td></td><td><p class="mb-0 " style="text-align: center;">' +
              jenis_harta +
              '</td><td><p class="mb-0 " style="text-align: center;">' +
              pemilik_harta +
              '</td><td><p class="mb-0 " style="text-align: center;">' +
              tarikh_pemilikan_harta +
              '</td><td><p class="mb-0 " style="text-align: center;">' +
              bilangan +
              '</td><td><p class="mb-0 " style="text-align: center;">' +
              unit_bilangan +
              '</td><td><p class="mb-0 " style="text-align: center;">' +
              nilai_perolehan +
              '</td><td><a onClick="removeJumlahPinjaman('+ increment_keterangan  +');removeData(this,'+ increment_keterangan  +'); return false;" class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a></td></tr>'
            );

            jenis_harta_to_append = '<input type="hidden" id="jenis_harta'+ increment_keterangan +'" name="jenis_harta_[]"  value="'+ jenis_harta +'" readonly>';
            pemilik_harta_to_append = '<input type="hidden" id="pemilik_harta'+ increment_keterangan +'" name="pemilik_harta_[]"  value="'+ pemilik_harta +'" readonly>';
            select_hubungan_to_append = '<input type="hidden" id="select_hubungan'+ increment_keterangan +'" name="select_hubungan_[]"  value="'+ select_hubungan +'" readonly>';
            maklumat_harta_to_append = '<input type="hidden" id="maklumat_harta'+ increment_keterangan +'" name="maklumat_harta_[]"  value="'+ maklumat_harta +'" readonly>';
            tarikh_pemilikan_harta_to_append = '<input type="hidden" id="tarikh_pemilikan_harta'+ increment_keterangan +'" name="tarikh_pemilikan_harta_[]"  value="'+ tarikh_pemilikan_harta +'" readonly>';
            bilangan_to_append = '<input type="hidden" id="bilangan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)" name="bilangan_[]"  value="'+ bilangan +'" readonly>';
            unit_bilangan_to_append = '<input type="hidden" id="unit_bilangan'+ increment_keterangan +'" onkeypress="" name="unit_bilangan_[]"  value="'+ unit_bilangan +'" readonly>'
            nilai_perolehan_to_append = '<input type="hidden" id="nilai_perolehan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)" name="nilai_perolehan_[]"  value="'+ nilai_perolehan +'" readonly>';
            cara_perolehan_to_append = '<input type="hidden" id="cara_perolehan'+ increment_keterangan +'" name="cara_perolehan_[]"  value="'+ cara_perolehan +'" readonly>';
            nama_pemilikan_asal_to_append = '<input type="hidden" id="nama_pemilikan_asal'+ increment_keterangan +'" name="nama_pemilikan_asal_[]"  value="'+ nama_pemilikan_asal +'" readonly>';
            jumlah_pinjaman_to_append = '<input type="hidden" id="jumlah_pinjaman'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)" name="jumlah_pinjaman_[]"  value="'+ jumlah_pinjaman +'" readonly>';
            institusi_pinjaman_to_append = '<input type="hidden" id="institusi_pinjaman'+ increment_keterangan +'" name="institusi_pinjaman_[]"  value="'+ institusi_pinjaman +'" readonly>';
            tempoh_bayar_balik_to_append = '<input type="hidden" id="tempoh_bayar_balik'+ increment_keterangan +'" name="tempoh_bayar_balik_[]"  value="'+ tempoh_bayar_balik +'" readonly>';
            ansuran_bulanan_to_append = '<input type="hidden" id="ansuran_bulanan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)" name="ansuran_bulanan_[]"  value="'+ ansuran_bulanan +'" readonly>';
            tarikh_ansuran_pertama_to_append = '<input type="hidden" id="tarikh_ansuran_pertama'+ increment_keterangan +'" name="tarikh_ansuran_pertama_[]"  value="'+ tarikh_ansuran_pertama +'" readonly>';
            keterangan_lain_to_append = '<input type="hidden" id="keterangan_lain'+ increment_keterangan +'" name="keterangan_lain_[]"  value="'+ keterangan_lain +'" readonly>';
            jenis_harta_pelupusan_to_append = '<input type="hidden" id="jenis_harta_pelupusan'+ increment_keterangan +'" name="jenis_harta_pelupusan_[]"  value="'+ jenis_harta_pelupusan +'" readonly>';
            alamat_asset_to_append = '<input type="hidden" id="alamat_asset'+ increment_keterangan +'" name="alamat_asset_[]"  value="'+ alamat_asset +'" readonly>';
            no_pendaftaran_to_append = '<input type="hidden" id="no_pendaftaran'+ increment_keterangan +'" name="no_pendaftaran_[]"  value="'+ no_pendaftaran +'" readonly>';
            harga_jualan_to_append = '<input type="hidden" id="harga_jualan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event)" name="harga_jualan_[]"  value="'+ harga_jualan +'" readonly>';
            tarikh_lupus_to_append = '<input type="hidden" id="tarikh_lupus'+ increment_keterangan +'" name="tarikh_lupus_[]"  value="'+ tarikh_lupus +'" readonly>';
            lain_lain_to_append = '<input type="hidden" id="lain_lain'+ increment_keterangan +'" name="lain_lain_[]"  value="'+ lain_lain +'" readonly>';
            tunai_to_append = '<input type="hidden" id="tunai'+ increment_keterangan +'" name="tunai_[]"  value="'+ tunai +'" readonly>';
            cara_belian_to_append = '<input type="hidden" id="cara_belian'+ increment_keterangan +'" name="cara_belian_[]"  value="'+ cara_belian +'" readonly>';


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
            $("#hidden_input").append(unit_bilangan_to_append);
            $("#hidden_input").append(nilai_perolehan_to_append);
            $("#hidden_input").append(cara_perolehan_to_append);
            $("#hidden_input").append(nama_pemilikan_asal_to_append);
            $("#hidden_input").append(jumlah_pinjaman_to_append);
            $("#hidden_input").append(institusi_pinjaman_to_append);
            $("#hidden_input").append(tempoh_bayar_balik_to_append);
            $("#hidden_input").append(ansuran_bulanan_to_append);
            $("#hidden_input").append(tarikh_ansuran_pertama_to_append);
            $("#hidden_input").append(keterangan_lain_to_append);
            $("#hidden_input").append(jenis_harta_pelupusan_to_append);
            $("#hidden_input").append(alamat_asset_to_append);
            $("#hidden_input").append(no_pendaftaran_to_append);
            $("#hidden_input").append(harga_jualan_to_append);
            $("#hidden_input").append(tarikh_lupus_to_append);
            $("#hidden_input").append(lain_lain_to_append);
            $("#hidden_input").append(tunai_to_append);
            $("#hidden_input").append(cara_belian_to_append);


            //reset form
            $("#tarikh_pemilikan_harta").val("")
            $("#jenis_harta").prop('selectedIndex', 0);
            // $("#select_hubungan").prop('selectedIndex', 0);
            $("#cara_perolehan").prop('selectedIndex', 0);
            // $("#cara_belian").prop('selectedIndex', 0);
            $("#tarikh_lupus").val("")
            $("#tarikh_ansuran_pertama").val("")


            // document.getElementById("jenis_harta").value = "";
            document.getElementById("pemilik_harta").value = "";
            document.getElementById("maklumat_harta").value = "";
            document.getElementById("bilangan").value = "";
            document.getElementById("unit_bilangan").value = "";
            document.getElementById("nilai_perolehan").value = "";
            document.getElementById("nama_pemilikan_asal").value = "";
            // document.getElementById("jumlah_pinjaman").value = "";
            document.getElementById("institusi_pinjaman").value = "";
            document.getElementById("cara_belian_container").style="display: none;";
            document.getElementById("nama_pemilikan_asal_container").style="display: none;";
            document.getElementById("lain-lain_container").style="display: none;";
            document.getElementById("pinjaman_container").style="display: none;";
            document.getElementById("pelupusan_container").style="display: none;";
            document.getElementById("tempoh_bayar_balik").value = "";
            document.getElementById("keterangan_lain").value = "";

            // document.getElementById("ansuran_bulanan").value = "";
            document.getElementById("jenis_harta_pelupusan").value = "";
            document.getElementById("alamat_asset").value = "";
            document.getElementById("no_pendaftaran").value = "";
            document.getElementById("harga_jualan").value = "";
            document.getElementById("lain_lain").value = "";
            document.getElementById("tunai").value = "";



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
           $('#unit_bilangan'+counter+'').remove();
           $('#nilai_perolehan'+counter+'').remove();
           $('#cara_perolehan'+counter+'').remove();
           $('#nama_pemilikan_asal'+counter+'').remove();
           $('#lain_lain'+counter+'').remove();
           $('#cara_belian'+counter+'').remove();
           $('#nama_pemilikan_asal'+counter+'').remove();
           $('#jumlah_pinjaman'+counter+'').remove();
           $('#institusi_pinjaman'+counter+'').remove();
           $('#tempoh_bayar_balik'+counter+'').remove();
           $('#ansuran_bulanan'+counter+'').remove();
           $('#tarikh_ansuran_pertama'+counter+'').remove();
           $('#keterangan_lain'+counter+'').remove();
           $('#jenis_harta_pelupusan'+counter+'').remove();
           $('#alamat_asset'+counter+'').remove();
           $('#no_pendaftaran'+counter+'').remove();
           $('#harga_jualan'+counter+'').remove();
           $('#tarikh_lupus'+counter+'').remove();
           $('#tunai'+counter+'').remove();



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
             cara_belian= document.getElementById("cara_belian").value;
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

                     $("#select_hubungan").prop('selectedIndex', 0);
                     document.getElementById("jenis_harta").value = "";
                     document.getElementById("ansuran_bulanan").value = "";
                     document.getElementById("jumlah_pinjaman").value = "";
                     document.getElementById("cara_belian").value = "";
                     // $("#cara_belian").prop('selectedIndex', 0);
                     // document.getElementById('pinjaman_perumahan_pasangan').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                     // document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                     document.getElementById('pinjaman_perumahan_pasangan').value =  +parseFloat(jumlah_pinjaman).toFixed(2);
                     document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(ansuran_bulanan).toFixed(2);
                   }

                   else{
                     console.log('masuk');
                     pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pegawai').value;
                     jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                     TotalValue = parseFloat(pinjaman_rumah_semasa).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                     pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pegawai').value;
                     ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                     TotalValue_bulanan = parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);

                     document.getElementById("jenis_harta").value = "";
                     document.getElementById("ansuran_bulanan").value = "";
                     document.getElementById("jumlah_pinjaman").value = "";
                     // $("#cara_belian").prop('selectedIndex', 0);
                     document.getElementById("cara_belian").value = "";
                     $("#select_hubungan").prop('selectedIndex', 0);
                     // document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                     // document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                     document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(jumlah_pinjaman).toFixed(2);
                     document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(ansuran_bulanan).toFixed(2);
                   }
                 }
                 else if (jenis_harta == "Kenderaan") {

                   if(pasangan == "Isteri/Suami"){
                     //pinjaman_perumahan_pasangan
                     pinjaman_kenderaan_pegawai = document.getElementById('pinjaman_kenderaan_pasangan').value;
                     jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                     TotalValue = parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                     pinjaman_bulanan_kenderaan_semasa = document.getElementById('bulanan_kenderaan_pasangan').value;
                     ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                     TotalValue_bulanan = parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);

                     $("#select_hubungan").prop('selectedIndex', 0);
                     document.getElementById("jenis_harta").value = "";
                     document.getElementById("ansuran_bulanan").value = "";
                     document.getElementById("jumlah_pinjaman").value = "";
                     // $("#cara_belian").prop('selectedIndex', 0);
                     document.getElementById("cara_belian").value = "";
                     $("#select_hubungan").prop('selectedIndex', 0);
                     // document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                     // document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                     document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(jumlah_pinjaman).toFixed(2);
                     document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(ansuran_bulanan).toFixed(2);

                   }


               else{
                 pinjaman_kenderaan_pegawai = document.getElementById('pinjaman_kenderaan_pegawai').value;
                 jumlah_pinjaman = document.getElementById("jumlah_pinjaman").value;
                 TotalValue = parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + parseFloat(jumlah_pinjaman).toFixed(2);

                 pinjaman_bulanan_kenderaan_semasa = document.getElementById('bulanan_kenderaan_pegawai').value;
                 ansuran_bulanan = document.getElementById("ansuran_bulanan").value;
                 TotalValue_bulanan = parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + parseFloat(ansuran_bulanan).toFixed(2);

                 document.getElementById("jenis_harta").value = "";
                 document.getElementById("ansuran_bulanan").value = "";
                 document.getElementById("jumlah_pinjaman").value = "";
                 // $("#cara_belian").prop('selectedIndex', 0);
                 document.getElementById("cara_belian").value = "";
                 $("#select_hubungan").prop('selectedIndex', 0);
                 // document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(pinjaman_kenderaan_pegawai).toFixed(2) + +parseFloat(jumlah_pinjaman).toFixed(2);
                 // document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa).toFixed(2) + +parseFloat(ansuran_bulanan).toFixed(2);

                 document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(jumlah_pinjaman).toFixed(2);
                 document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(ansuran_bulanan).toFixed(2);

               }
             }
             document.getElementById("cara_belian").value = "";
           }
           else{
             // $("#cara_belian").prop('selectedIndex', 0);
             document.getElementById("cara_belian").value = "";
             $("#select_hubungan").prop('selectedIndex', 0);
             document.getElementById("jenis_harta").value = "";
             document.getElementById("ansuran_bulanan").value = "";
             document.getElementById("jumlah_pinjaman").value = "";
           }
           var sendiri_kenderaan_ansuran_bulanan_value = 0;
           var sendiri_kenderaan_jumlah_pinjaman_value = 0;
           var pasangan_kenderaan_ansuran_bulanan_value = 0;
           var pasangan_kenderaan_jumlah_pinjaman_value = 0;

           var sendiri_rumah_ansuran_bulanan_value = 0;
           var sendiri_rumah_jumlah_pinjaman_value = 0;
           var pasangan_rumah_ansuran_bulanan_value = 0;
           var pasangan_rumah_jumlah_pinjaman_value = 0;

           var select_hubungan_to_calculate_value;
           var jenis_harta_to_calculate_value;

           var ansuran_bulanan_to_calculate = document.getElementsByName('ansuran_bulanan_[]');
           var jumlah_pinjaman_to_calculate = document.getElementsByName('jumlah_pinjaman_[]');
           var select_hubungan_to_calculate = document.getElementsByName('select_hubungan_[]');
           var jenis_harta_to_calculate = document.getElementsByName('jenis_harta_[]');
           var cara_belian_to_calculate = document.getElementsByName('cara_belian_[]');

           for (var i = 0; i < jenis_harta_to_calculate.length; i++) {
               var a = ansuran_bulanan_to_calculate[i];
               var b = jumlah_pinjaman_to_calculate[i];
               var c = jenis_harta_to_calculate[i];
               var d = select_hubungan_to_calculate[i];
               var e = cara_belian_to_calculate[i];


               if(d.value == "Sendiri"){
                 if(e.value =="Pinjaman"){
                   if(c.value == "Kenderaan"){
                     sendiri_kenderaan_ansuran_bulanan_value = parseFloat(sendiri_kenderaan_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                     sendiri_kenderaan_jumlah_pinjaman_value = parseFloat(sendiri_kenderaan_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                   }
                   else if(c.value == "Rumah"){
                     sendiri_rumah_ansuran_bulanan_value = parseFloat(sendiri_rumah_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                     sendiri_rumah_jumlah_pinjaman_value = parseFloat(sendiri_rumah_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                   }
                 }
               }
               else if(d.value == "Isteri/Suami"){
                if(e.value =="Pinjaman"){
                 if(c.value == "Kenderaan"){
                   pasangan_kenderaan_ansuran_bulanan_value = parseFloat(pasangan_kenderaan_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                   pasangan_kenderaan_jumlah_pinjaman_value = parseFloat(pasangan_kenderaan_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                 }
                 else if(c.value == "Rumah"){
                   pasangan_rumah_ansuran_bulanan_value = parseFloat(pasangan_rumah_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                   pasangan_rumah_jumlah_pinjaman_value = parseFloat(pasangan_rumah_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                 }
               }
                                                        }

           }
           document.getElementById('pinjaman_kenderaan_pegawai').value = parseFloat(sendiri_kenderaan_jumlah_pinjaman_value).toFixed(2);
           document.getElementById('bulanan_kenderaan_pegawai').value = parseFloat(sendiri_kenderaan_ansuran_bulanan_value).toFixed(2);
           document.getElementById('pinjaman_kenderaan_pasangan').value = parseFloat(pasangan_kenderaan_jumlah_pinjaman_value).toFixed(2);
           document.getElementById('bulanan_kenderaan_pasangan').value = parseFloat(pasangan_kenderaan_ansuran_bulanan_value).toFixed(2);

         }
    </script>
    <!-- edit harta -->
      <script type="text/javascript">
      function calculatePinjamanPerumahan_edit(){
        var TotalValue_edit = 0;
        var TotalValue_bulanan_edit = 0;

        jenis_harta_edit = document.getElementById("jenis_harta_edit").value;
        pasangan_edit = document.getElementById("hubungan_pemilik_edit").value;
        cara_belian_edit = document.getElementById("cara_belian_edit").value;

        if(cara_belian_edit == "Pinjaman"){
          console.log('pinjaman');
            if(jenis_harta_edit == "Rumah"){
              console.log('rumah');
              console.log(pasangan_edit);
              if(pasangan_edit == "Isteri/Suami"){
                console.log('masuk rumah isteri');
                //pinjaman_perumahan_pasangan
                pinjaman_rumah_semasa_edit = document.getElementById('pinjaman_perumahan_pasangan').value;
                jumlah_pinjaman_edit = document.getElementById("jumlah_pinjaman_edit").value;
                TotalValue_edit = parseFloat(pinjaman_rumah_semasa_edit).toFixed(2) + parseFloat(jumlah_pinjaman_edit).toFixed(2);

                pinjaman_bulanan_rumah_semasa_edit = document.getElementById('bulanan_perumahan_pasangan').value;
                ansuran_bulanan_edit = document.getElementById("ansuran_bulanan_edit").value;
                TotalValue_bulanan_edit = parseFloat(pinjaman_bulanan_rumah_semasa_edit).toFixed(2) + parseFloat(ansuran_bulanan_edit).toFixed(2);

                $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
                document.getElementById("jenis_harta_edit").value = "";
                document.getElementById("ansuran_bulanan_edit").value = "";
                document.getElementById("jumlah_pinjaman_edit").value = "";
                document.getElementById("cara_belian_edit").value = "";
                // $("#cara_belian").prop('selectedIndex', 0);
                // document.getElementById('pinjaman_perumahan_pasangan').value = +parseFloat(pinjaman_rumah_semasa_edit).toFixed(2) + +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                // document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa_edit).toFixed(2) + +parseFloat(ansuran_bulanan_edit).toFixed(2);

                document.getElementById('pinjaman_perumahan_pasangan').value =  +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                document.getElementById('bulanan_perumahan_pasangan').value =  +parseFloat(ansuran_bulanan_edit).toFixed(2);
              }

              else{
                console.log('masuk');
                pinjaman_rumah_semasa_edit = document.getElementById('pinjaman_perumahan_pegawai').value;
                jumlah_pinjaman_edit = document.getElementById("jumlah_pinjaman_edit").value;
                TotalValue_edit = parseFloat(pinjaman_rumah_semasa_edit).toFixed(2) + parseFloat(jumlah_pinjaman_edit).toFixed(2);

                pinjaman_bulanan_rumah_semasa_edit = document.getElementById('bulanan_perumahan_pegawai').value;
                ansuran_bulanan_edit = document.getElementById("ansuran_bulanan_edit").value;
                TotalValue_bulanan_edit = parseFloat(pinjaman_bulanan_rumah_semasa_edit).toFixed(2) + parseFloat(ansuran_bulanan_edit).toFixed(2);

                // document.getElementById("jenis_harta_edit").value = "";
                // document.getElementById("ansuran_bulanan_edit").value = "";
                // document.getElementById("jumlah_pinjaman_edit").value = "";
                // // $("#cara_belian").prop('selectedIndex', 0);
                // document.getElementById("cara_belian_edit").value = "";
                // $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
                // document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(pinjaman_rumah_semasa_edit).toFixed(2) + +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                // document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa_edit).toFixed(2) + +parseFloat(ansuran_bulanan_edit).toFixed(2);
                document.getElementById('pinjaman_perumahan_pegawai').value = +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                document.getElementById('bulanan_perumahan_pegawai').value = +parseFloat(ansuran_bulanan_edit).toFixed(2);

              }
            }
            else if (jenis_harta_edit == "Kenderaan") {

              if(pasangan_edit == "Isteri/Suami"){
                //pinjaman_perumahan_pasangan
                pinjaman_kenderaan_pegawai_edit = document.getElementById('pinjaman_kenderaan_pasangan').value;
                jumlah_pinjaman_edit = document.getElementById("jumlah_pinjaman_edit").value;
                TotalValue_edit = parseFloat(pinjaman_kenderaan_pegawai_edit).toFixed(2) + parseFloat(jumlah_pinjaman_edit).toFixed(2);

                pinjaman_bulanan_kenderaan_semasa_edit = document.getElementById('bulanan_kenderaan_pasangan').value;
                ansuran_bulanan_edit = document.getElementById("ansuran_bulanan_edit").value;
                TotalValue_bulanan_edit = parseFloat(pinjaman_bulanan_kenderaan_semasa_edit).toFixed(2) + parseFloat(ansuran_bulanan_edit).toFixed(2);

                // $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
                // document.getElementById("jenis_harta_edit").value = "";
                // document.getElementById("ansuran_bulanan_edit").value = "";
                // document.getElementById("jumlah_pinjaman_edit").value = "";
                // // $("#cara_belian").prop('selectedIndex', 0);
                // document.getElementById("cara_belian_edit").value = "";
                // $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
                // document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(pinjaman_kenderaan_pegawai_edit).toFixed(2) + +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                // document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa_edit).toFixed(2) + +parseFloat(ansuran_bulanan_edit).toFixed(2);

                document.getElementById('pinjaman_kenderaan_pasangan').value = +parseFloat(jumlah_pinjaman_edit).toFixed(2);
                document.getElementById('bulanan_kenderaan_pasangan').value = +parseFloat(ansuran_bulanan_edit).toFixed(2);
              }

          else{
            pinjaman_kenderaan_pegawai_edit = document.getElementById('pinjaman_kenderaan_pegawai').value;
            jumlah_pinjaman_edit = document.getElementById("jumlah_pinjaman_edit").value;
            TotalValue_edit = parseFloat(pinjaman_kenderaan_pegawai_edit).toFixed(2) + parseFloat(jumlah_pinjaman_edit).toFixed(2);

            pinjaman_bulanan_kenderaan_semasa_edit = document.getElementById('bulanan_kenderaan_pegawai').value;
            // pinjaman_bulanan_kenderaan_semasa_edit = {{$info->bulanan_kenderaan_pegawai}};

            ansuran_bulanan_edit = document.getElementById("ansuran_bulanan_edit").value;
            TotalValue_bulanan_edit = parseFloat(pinjaman_bulanan_kenderaan_semasa_edit).toFixed(2) + parseFloat(ansuran_bulanan_edit).toFixed(2);

            // document.getElementById("jenis_harta_edit").value = "";
            // document.getElementById("ansuran_bulanan_edit").value = "";
            // document.getElementById("jumlah_pinjaman_edit").value = "";
            // // $("#cara_belian").prop('selectedIndex', 0);
            // document.getElementById("cara_belian_edit").value = "";
            // $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
            // console.log('ansuran_bulanan_edit',parseFloat(ansuran_bulanan_edit).toFixed(2) );
            // console.log('pinjaman_bulanan_kenderaan_semasa_edit',parseFloat(pinjaman_bulanan_kenderaan_semasa_edit).toFixed(2) );

            // document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(pinjaman_kenderaan_pegawai_edit).toFixed(2) + +parseFloat(jumlah_pinjaman_edit).toFixed(2);
            document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(jumlah_pinjaman_edit).toFixed(2);
            // document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(pinjaman_bulanan_kenderaan_semasa_edit).toFixed(2) + +parseFloat(ansuran_bulanan_edit).toFixed(2);
            document.getElementById('bulanan_kenderaan_pegawai').value =  +parseFloat(ansuran_bulanan_edit).toFixed(2);

          }
        }
        // document.getElementById("cara_belian_edit").value = "";
      }
      else{
        // $("#cara_belian").prop('selectedIndex', 0);
        // document.getElementById("cara_belian_edit").value = "";
        // $("#hubungan_pemilik_edit").prop('selectedIndex', 0);
        // document.getElementById("jenis_harta_edit").value = "";
        // document.getElementById("ansuran_bulanan_edit").value = "";
        // document.getElementById("jumlah_pinjaman_edit").value = "";
      }

        var sendiri_kenderaan_ansuran_bulanan_value = 0;
        var sendiri_kenderaan_jumlah_pinjaman_value = 0;
        var pasangan_kenderaan_ansuran_bulanan_value = 0;
        var pasangan_kenderaan_jumlah_pinjaman_value = 0;

        var sendiri_rumah_ansuran_bulanan_value = 0;
        var sendiri_rumah_jumlah_pinjaman_value = 0;
        var pasangan_rumah_ansuran_bulanan_value = 0;
        var pasangan_rumah_jumlah_pinjaman_value = 0;

        var select_hubungan_to_calculate_value;
        var jenis_harta_to_calculate_value;

        var ansuran_bulanan_to_calculate = document.getElementsByName('ansuran_bulanan_[]');
        var jumlah_pinjaman_to_calculate = document.getElementsByName('jumlah_pinjaman_[]');
        var select_hubungan_to_calculate = document.getElementsByName('select_hubungan_[]');
        var jenis_harta_to_calculate = document.getElementsByName('jenis_harta_[]');
        var cara_belian_to_calculate = document.getElementsByName('cara_belian_[]');

        for (var i = 0; i < jenis_harta_to_calculate.length; i++) {
            var a = ansuran_bulanan_to_calculate[i];
            var b = jumlah_pinjaman_to_calculate[i];
            var c = jenis_harta_to_calculate[i];
            var d = select_hubungan_to_calculate[i];
            var e = cara_belian_to_calculate[i];


            if(d.value == "Sendiri"){
              if(e.value =="Pinjaman"){
                if(c.value == "Kenderaan"){
                  sendiri_kenderaan_ansuran_bulanan_value = parseFloat(sendiri_kenderaan_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                  sendiri_kenderaan_jumlah_pinjaman_value = parseFloat(sendiri_kenderaan_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                }
                else if(c.value == "Rumah"){
                  sendiri_rumah_ansuran_bulanan_value = parseFloat(sendiri_rumah_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                  sendiri_rumah_jumlah_pinjaman_value = parseFloat(sendiri_rumah_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                }
              }
            }
            else if(d.value == "Isteri/Suami"){
              if(e.value =="Pinjaman"){
                if(c.value == "Kenderaan"){
                  pasangan_kenderaan_ansuran_bulanan_value = parseFloat(pasangan_kenderaan_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                  pasangan_kenderaan_jumlah_pinjaman_value = parseFloat(pasangan_kenderaan_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                }
                else if(c.value == "Rumah"){
                  pasangan_rumah_ansuran_bulanan_value = parseFloat(pasangan_rumah_ansuran_bulanan_value) + +parseFloat(a.value).toFixed(2);
                  pasangan_rumah_jumlah_pinjaman_value = parseFloat(pasangan_rumah_jumlah_pinjaman_value) + +parseFloat(b.value).toFixed(2);
                }
              }
            }

        }
        document.getElementById('pinjaman_kenderaan_pegawai').value = parseFloat(sendiri_kenderaan_jumlah_pinjaman_value).toFixed(2);
        document.getElementById('bulanan_kenderaan_pegawai').value = parseFloat(sendiri_kenderaan_ansuran_bulanan_value).toFixed(2);
        document.getElementById('pinjaman_kenderaan_pasangan').value = parseFloat(pasangan_kenderaan_jumlah_pinjaman_value).toFixed(2);
        document.getElementById('bulanan_kenderaan_pasangan').value = parseFloat(pasangan_kenderaan_ansuran_bulanan_value).toFixed(2);
    }
  </script>
    <script>
          function removeJumlahPinjaman(e){
              jenis_harta = document.getElementById("jenis_harta"+ e +"").value;
              console.log(jenis_harta);
              pasangan = document.getElementById("select_hubungan"+ e +"").value;
              console.log(pasangan);
              if(jenis_harta == "Rumah"){

                if(pasangan == "Isteri/Suami"){
                  pinjaman_rumah_semasa = document.getElementById('pinjaman_perumahan_pasangan').value;
                  jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                  pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_perumahan_pasangan').value;
                  ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                  document.getElementById('pinjaman_perumahan_pasangan').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                  document.getElementById('bulanan_perumahan_pasangan').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                }
                else {
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
                else {
                  pinjaman_rumah_semasa = document.getElementById('pinjaman_kenderaan_pegawai').value;
                  jumlah_pinjaman = document.getElementById("jumlah_pinjaman"+ e +"").value;
                  pinjaman_bulanan_rumah_semasa = document.getElementById('bulanan_kenderaan_pegawai').value;
                  ansuran_bulanan = document.getElementById("ansuran_bulanan"+ e +"").value;

                  document.getElementById('pinjaman_kenderaan_pegawai').value = +parseFloat(pinjaman_rumah_semasa).toFixed(2) - +parseFloat(jumlah_pinjaman).toFixed(2);
                  document.getElementById('bulanan_kenderaan_pegawai').value = +parseFloat(pinjaman_bulanan_rumah_semasa).toFixed(2) - +parseFloat(ansuran_bulanan).toFixed(2);
                }
              }
            }
        </script>
        @foreach($hartaB as $data)
        <script type="text/javascript">
          $("#editHarta{{$data->id}}").click(function() {
              $('html, body').animate({
                  scrollTop: $("#harta_container").offset().top
              }, 2000);
          });
        </script>
        @endforeach

@endsection
