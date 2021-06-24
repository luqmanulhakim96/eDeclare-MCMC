@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran G: Permohonan bagi mendapatkan kebenaran untuk memohon dan memiliki saham</h5>
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
                               <form action="{{route('g.update', $info->id)}}" method="post">
                                @csrf

                                <div id="hidden_dividen" name="hidden_dividen">

                                </div>

                                <div id="hidden_pinjaman" name="hidden_pinjaman">

                                </div>
                                <div id="hidden_saham" name="hidden_saham">

                                </div>

                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$info->nama_pegawai }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$info->kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$info->jabatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Lantikan Ke Perkhidmatan Sekarang</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="date" id="datefield" class="form-control bg-light" name="tarikh_lantikan" placeholder="Tarikh Lantikan Ke Perkhidmatan Sekarang" value="{{ $info->tarikh_lantikan }}" >
                                              @error('tarikh_lantikan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <!-- <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Nama Perkhidmatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" name="nama_perkhidmatan" placeholder="Nama Perkhidmatan" value="{{ $info->nama_perkhidmatan  }}" >
                                              @error('nama_perkhidmatan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                  </div> -->
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="hidden" name="gelaran" value="{{$info->gelaran}}">{{$info->gelaran}}

                                           </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                                {{$info->alamat_tempat_bertugas }}
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
                                             <input type="hidden" name="nama_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->NOKNAME}}
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
                                             <input type="hidden" name="nama_anak" value="{{$maklumat_anak->NOKNAME}}">{{$maklumat_anak->NOKNAME}}
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
                                              {{number_format((float)$info->gaji,2,'.','')}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ $info->gaji_pasangan  }}">
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
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ $info->jumlah_imbuhan  }}">
                                              @error('jumlah_imbuhan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $info->jumlah_imbuhan_pasangan  }}">
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
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="sewa" placeholder="Sewa Pegawai" value="{{ $info->sewa  }}" >
                                              @error('sewa')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $info->sewa_pasangan  }}" >
                                          @error('sewa_pasangan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                      </div>
                                      @if($listDividenG->isEmpty())
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
                                                <input class="form-control bg-light"  onkeypress="return onlyNumberKey(event,this)" name="dividen_1_pegawai[]" id="dividen0" placeholder="Dividen Pegawai"  value="{{ old('dividen_1_pegawai[]')}}">
                                            </div>
                                            @error('dividen_1_pegawai[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light"  onkeypress="return onlyNumberKey(event,this)" name="dividen_1_pasangan[]" id="dividen0" placeholder="Dividen Pasangan"  value="{{ old('dividen_1_pasangan[]')}}">
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
                                          <input type="hidden" name="counter_dividen" value="{{count($listDividenG)}}" id="counter_dividen">
                                          @foreach($listDividenG as $dividen)
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
                                                    <input class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)"  name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{$dividen->dividen_1_pegawai}}">
                                                    @error('dividen_1_pegawai[]')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                   @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2 mt-md-0">
                                                <input class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)"  name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{ $dividen->dividen_1_pasangan}}">
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

                                      <!-- Tanggungan -->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>4. TANGGUNGAN / ANSURAN BULANAN ATAS HUTANG / PINJAMAN</b></p>
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
                                          <p>i) Jumlah Pinjaman Perumahan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_perumahan_pegawai" value="{{ $info->pinjaman_perumahan_pegawai  }}">
                                          @error('pinjaman_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_perumahan_pegawai" value="{{ $info->bulanan_perumahan_pegawai  }}">
                                          @error('bulanan_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_perumahan_pasangan" value="{{ $info->pinjaman_perumahan_pasangan  }}">
                                            @error('pinjaman_perumahan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_perumahan_pasangan" value="{{ $info->bulanan_perumahan_pasangan  }}">
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
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_kenderaan_pegawai" value="{{ $info->pinjaman_kenderaan_pegawai  }}">
                                          @error('pinjaman_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_kenderaan_pegawai" value="{{ $info->bulanan_kenderaan_pegawai  }}">
                                          @error('bulanan_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_kenderaan_pasangan" value="{{ $info->pinjaman_kenderaan_pasangan  }}">
                                            @error('pinjaman_kenderaan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                         </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_kenderaan_pasangan" value="{{ $info->bulanan_kenderaan_pasangan  }}">
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
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_cukai_pegawai" value="{{ $info->jumlah_cukai_pegawai  }}">
                                          @error('jumlah_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_cukai_pegawai" value="{{ $info->bulanan_cukai_pegawai  }}">
                                          @error('bulanan_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                       </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_cukai_pasangan" value="{{ $info->jumlah_cukai_pasangan  }}">
                                            @error('jumlah_cukai_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                         </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_cukai_pasangan" value="{{ $info->bulanan_cukai_pasangan  }}">
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
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_koperasi_pegawai" value="{{ $info->jumlah_koperasi_pegawai  }}">
                                          @error('jumlah_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_koperasi_pegawai" value="{{ $info->bulanan_koperasi_pegawai  }}">
                                          @error('bulanan_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="jumlah_koperasi_pasangan" value="{{ $info->jumlah_koperasi_pasangan  }}">
                                            @error('jumlah_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_koperasi_pasangan" value="{{ $info->bulanan_koperasi_pasangan  }}">
                                            @error('bulanan_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                      </div>
                                      <br>
                                      @if($listPinjamanG->isEmpty())
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
                                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman"  value="{{ old('lain_lain_pinjaman[]')}}">
                                        </div>
                                        @error('lain_lain_pinjaman[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pegawai[]" value="{{ old('pinjaman_pegawai[]')}}">
                                        </div>
                                        @error('pinjaman_pegawai[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pegawai[]" value="{{ old('bulanan_pegawai[]')}}">
                                        </div>
                                        @error('bulanan_pegawai[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pasangan[]" value="{{ old('pinjaman_pasangan[]')}}">
                                          </div>
                                          @error('pinjaman_pasangan[]')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pasangan[]" value="{{ old('bulanan_pasangan[]')}}">
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
                                      <input type="hidden" name="counter" value="0" id="counter1">

                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>v) Lain-Lain Pinjaman</p>
                                        </div>
                                      </div>
                                      <div class="table_lain" id="table_lain">
                                      @foreach($listPinjamanG as $pinjaman)
                                      <div class="row">
                                        <div class="col-md-3">
                                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ $pinjaman->lain_lain_pinjaman}}">
                                        </div>
                                        @error('lain_lain_pinjaman[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pegawai[]" value="{{ $pinjaman->pinjaman_pegawai}}">
                                        </div>
                                        @error('pinjaman_pegawai[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pegawai[]" value="{{ $pinjaman->bulanan_pegawai}}">
                                        </div>
                                        @error('bulanan_pegawai[]')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pasangan[]" value="{{$pinjaman->pinjaman_pasangan}}">
                                          </div>
                                          @error('pinjaman_pasangan[]')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pasangan[]" value="{{ $pinjaman->bulanan_pasangan}}">
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
                        <div class="row">
                          <div class="col-12 mt-4">
                               <div class="card rounded-lg">
                                   <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. BUTIR-BUTIR TANAH YANG TELAH DIBERIMILIK OLEH KERAJAAN DI MANA MANA TEMPAT DI MALAYSIA</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Tanah Pertanian</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light"name="luas_pertanian" placeholder="Luas" value="{{ $info->luas_pertanian  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light"name="lot_pertanian" placeholder="No. Lot" value="{{ $info->lot_pertanian  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_pertanian" placeholder="Mukim" value="{{ $info->mukim_pertanian  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_pertanian" placeholder="Negeri" value="{{ $info->negeri_pertanian  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Tanah Perumahan</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas_perumahan"placeholder="Luas" value="{{ $info->luas_perumahan  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot_perumahan" placeholder="No. Lot" value="{{ $info->lot_perumahan  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_perumahan" placeholder="Mukim" value="{{ $info->mukim_perumahan  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_perumahan" placeholder="Negeri" value="{{ $info->negeri_perumahan  }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Tarikh Diperolehi</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="date" class="form-control bg-light" name="tarikh_diperolehi" placeholder="Luas" value="{{ $info->tarikh_diperolehi  }}">
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
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>6. BUTIR-BUTIR TANAH ATAU SAHAM YANG DIPOHON</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Jenis-jenis</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                <select id="jenis" class="custom-select bg-light" name="jenis" onchange="showJenis()" >
                                                    <option value="" selected disabled hidden>Pilih jenis</option>
                                                    <option value="Semua" {{ $info->jenis   == "Semua" ? 'selected' : '' }} >Tanah dan Saham</option>
                                                    <option value="Tanah" {{ $info->jenis   == "Tanah" ? 'selected' : '' }} >Tanah</option>
                                                    <option value="Saham" {{ $info->jenis   == "Saham" ? 'selected' : '' }} >Saham</option>

                                                </select>
                                              </div>
                                          </div>
                                      </div>
                                      @if($info->luas != null)
                                      <div id="tanah_container" style="display: block;">
                                        @else
                                        <div id="tanah_container" style="display: none;">
                                      @endif
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Butir- butir lengkap mengenai tanah Kerajaan yang hendak dipohon dan dimiliki: </b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas" placeholder="Luas" value="{{ $info->luas  }}" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot" placeholder="No. Lot" value="{{ $info->lot  }}" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim" placeholder="Mukim" value="{{ $info->mukim  }}" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri" placeholder="Negeri" value="{{ $info->negeri  }}" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Jenis Tanah</p>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="radio" id="pertanian" name="jenis_tanah" value="pertanian" {{ $info->jenis_tanah == "pertanian" ? 'checked' : '' }}>
                                                <label for="pertanian" >Tanah Pertanian</label><br>
                                            <input type="radio" id="perumahan" name="jenis_tanah" value="perumahan" {{ $info->jenis_tanah == "perumahan" ? 'checked' : '' }}>
                                                <label for="perumahan">Tanah Perumahan</label><br>
                                          </div>
                                      </div>
                                      <br>
                                    </div>
                                    @if($info->nama_syarikat != null)
                                    <div id="saham_container" style="display: block;">
                                    @else
                                    <div id="saham_container" style="display: none;">
                                    @endif
                                      <div class="row">
                                        <div class="col-md-8">
                                        <p><b>ii) Butir- butir saham yang dipohon </b></p>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nama Syarikat</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="nama_syarikat" placeholder="Nama Syarikat" value="{{ $info->nama_syarikat  }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Modal Berbayar (Paid Up Capital)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" name="modal_berbayar" placeholder="Modal Berbayar (Paid Up Capital)" value="{{ $info->modal_berbayar  }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Jumlah Unit Nilai Saham Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" name="jumlah_unit_saham" placeholder="Jumlah Unit" value="{{ $info->jumlah_unit_saham  }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nilai Saham</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" name="nilai_saham" placeholder="Nilai Saham" value="{{ $info->nilai_saham  }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="sumber_kewangan" placeholder="Sumber Kewangan" value="{{ $info->sumber_kewangan  }}" >
                                            </div>
                                        </div>
                                    </div>
                                  </div>

                                    <div class="row">
                                      <div class="col-md-8">
                                        <p><b>iii) Jika melibatkan pinjaman, Nyatakan: </b></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <p><b>Nama Institusi </b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Alamat Institusi</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Ansuran Bulanan</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Tarikh Ansuran Pertama</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Tempoh Pinjaman</b></p>
                                      </div>
                                    </div>
                                    @if($listPinjaman->isEmpty())
                                    <input type="hidden"  value="0" id="counter_saham">
                                    <div class="saham" id="saham">
                                      <div class="row">
                                        <div class="col-md-2">
                                          <input type="text" class="form-control bg-light" id="institusi" name="institusi[]" placeholder="Nama Institusi" value="{{ old('institusi[]')}}">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" class="form-control bg-light" id="alamat_institusi" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ old('alamat_institusi[]')}}">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" id="ansuran_bulanan" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ old('ansuran_bulanan[]')}}">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="date" class="form-control bg-light" id="tarikh_ansuran" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ old('tarikh_ansuran[]')}}">
                                        </div>
                                        <div class="col-md-2">
                                          <input type="text" class="form-control bg-light" id="tempoh_pinjaman" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ old('tempoh_pinjaman[]')}}">
                                        </div>
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_saham_button">Tambah</button>
                                      </div>
                                      </div>
                                      <br>
                                  </div>
                                    @else
                                    @foreach($listPinjaman as $data)
                                  <input type="hidden" name="counter_saham" value="0" id="counter_saham">
                                  <div class="saham" id="saham">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" id="institusi" name="institusi[]" placeholder="Nama Institusi" value="{{ $data->institusi  }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" id="alamat_institusi" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ $data->alamat_institusi  }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" id="ansuran_bulanan" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ $data->ansuran_bulanan  }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="date" class="form-control bg-light" id="tarikh_ansuran" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ $data->tarikh_ansuran  }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" id="tempoh_pinjaman" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ $data->tempoh_pinjaman  }}">
                                      </div>
                                      @if($loop->last)
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_saham_button">Tambah</button>
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
                      <br>
                      <div class="row">
                        <div class="col-md-1" align="right">
                          <input type="checkbox" name="pengakuan" value="pengakuan pegawai" >
                        </div>
                        <div class="col-md-11">
                            <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
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
                       <br><br><br><br>



            <!--script-->

            <script type="text/javascript">
              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              var wrapper   		= $("#saham"); //Fields wrapper
              var add_button      = $("#add_saham_button"); //Add button ID
              var counter_saham = document.getElementById("counter_saham").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter_saham++;
                  console.log(counter_saham);

                  $(wrapper).append('<div id="saham'+counter_saham+'"  class="row"><div class="col-md-2"><input type="text" class="form-control bg-light" name="institusi[]" onchange="return copyCatSaham('+counter_saham+')" id="institusi['+
                  counter_saham+']" placeholder="Nama Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="alamat_institusi[]" onchange="return copyCatSaham('+counter_saham+')" id="alamat_institusi['+
                  counter_saham+']" placeholder="Alamat Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" onkeypress="return onlyNumberKey(event,this)" name="ansuran_bulanan[]" onchange="return copyCatSaham('+counter_saham+')" id="ansuran_bulanan['+
                  counter_saham+']" placeholder="Ansuran Bulanan"></div><div class="col-md-2"><input type="date" class="form-control bg-light" name="tarikh_ansuran[]" onchange="return copyCatSaham('+counter_saham+')" id="tarikh_ansuran['+
                  counter_saham+']" placeholder="Tarikh Ansuran Pertama"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="tempoh_pinjaman[]" onchange="return copyCatSaham('+counter_saham+')" id="tempoh_pinjaman['+
                  counter_saham+']" placeholder="Tempoh Pinjaman"></div><div class="col-md-1"><a onClick="removeDataSaham(this,'+counter_saham+' ); return false;" id ="delsaham'+counter_saham+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

              });
            });

            function removeDataSaham(e,counter_saham){
            //$(e).parents('div'+counter+'').remove();
            console.log('masuk');
              $('#saham'+counter_saham+'').remove();
              $('#saham_hidden'+counter_saham+'').remove();
              $('#delsaham'+counter_saham+'').remove();
             //  var counter = document.getElementById("counter").value;
             //  counter--;
             // doctype.getElementById("counter").value = counter;
            }

            function copyCatSaham(e){
               // console.log("MASUK MASUK");
               // console.log(e);
               var institusi = document.getElementById("institusi["+e+"]").value;

               var alamat_institusi = document.getElementById("alamat_institusi["+e+"]").value;
               var ansuran_bulanan = document.getElementById("ansuran_bulanan["+e+"]").value;
               var tarikh_ansuran = document.getElementById("tarikh_ansuran["+e+"]").value;
               var tempoh_pinjaman = document.getElementById("tempoh_pinjaman["+e+"]").value;


               console.log(alamat_institusi);
               document.getElementById("institusi_hidden["+e+"]").value = institusi;
               document.getElementById("alamat_institusi_hidden["+e+"]").value = alamat_institusi;
               document.getElementById("ansuran_bulanan_hidden["+e+"]").value = ansuran_bulanan;
               document.getElementById("tarikh_ansuran_hidden["+e+"]").value = tarikh_ansuran;
               document.getElementById("tempoh_pinjaman_hidden["+e+"]").value = tempoh_pinjaman;

             }
            </script>

            <script type="text/javascript">
              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              var wrapper   		= $("#hidden_saham"); //Fields wrapper
              var add_button      = $("#add_saham_button"); //Add button ID
              var counter_saham = document.getElementById("counter_saham").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter_saham++;
                  console.log(counter_saham);

                  $(wrapper).append('<div id="saham_hidden'+counter_saham+'"  class="row"><div class="col-md-2"><input type="hidden" class="form-control bg-light" name="institusi[]" id="institusi_hidden['+
                  counter_saham+']" placeholder="Nama Institusi"></div><div class="col-md-2"><input type="hidden" class="form-control bg-light" name="alamat_institusi[]" id="alamat_institusi_hidden['+
                  counter_saham+']" placeholder="Alamat Institusi"></div><div class="col-md-2"><input type="hidden" class="form-control bg-light" name="ansuran_bulanan[]" id="ansuran_bulanan_hidden['+
                  counter_saham+']" placeholder="Ansuran Bulanan"></div><div class="col-md-2"><input type="hidden" class="form-control bg-light" name="tarikh_ansuran[]" id="tarikh_ansuran_hidden['+
                  counter_saham+']" placeholder="Tarikh Ansuran Pertama"></div><div class="col-md-2"><input type="hidden" class="form-control bg-light" name="tempoh_pinjaman[]" id="tempoh_pinjaman_hidden['+
                  counter_saham+']" placeholder="Tempoh Pinjaman"></div></div>'); //add input box

              });
            });
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
                  ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pegawai[]" id="pinjaman_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pegawai[]" id="bulanan_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pasangan[]" id="pinjaman_pasangan['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" onchange="return copyCatPinjaman('+counter+')" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pasangan[]" id="bulanan_pasangan['+
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
                  ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pegawai[]" id="pinjaman_pegawai_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pegawai[]" id="bulanan_pegawai_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" onkeypress="return onlyNumberKey(event,this)" name="pinjaman_pasangan[]" id="pinjaman_pasangan_hidden['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="hidden" onkeypress="return onlyNumberKey(event,this)" name="bulanan_pasangan[]" id="bulanan_pasangan_hidden['+
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
                   ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" onchange="return copyCat('+counter_dividen+')" onkeypress="return onlyNumberKey(event,this)" name="dividen_1_pegawai[]" id="dividen_1_pegawai['+
                   counter_dividen+
                   ']" placeholder="Dividen Pegawai"></div></div><input type="hidden" onchange="return copyCat('+counter_dividen+')" name="counter" id="counter_for_dividen" value="'+
                   counter_dividen+
                   '"><div class="col-md-4 mt-2 mt-md-0" id="dividen"><input class="form-control bg-light" id="dividen_1_pasangan[]" onkeypress="return onlyNumberKey(event,this)" name="dividen_1_pasangan['+
                   counter_dividen+
                   ']" placeholder="Dividen Pasangan" id="dividen_pasangan" onchange="return copyCat('+counter_dividen+')"></div></div>'); //add input box

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

             <script type="text/javascript">
            function showJenis(){
              var jenis= $('#jenis').val();
              console.log(jenis,'jenis');

              if(jenis == "Tanah"){
                document.getElementById('tanah_container').style.display ="block";
              }
              else{
                document.getElementById('tanah_container').style.display ="none";
              }

              if(jenis == "Saham"){
                document.getElementById('saham_container').style.display ="block";
              }
              else{
                document.getElementById('saham_container').style.display ="none";
              }

              if(jenis == "Semua"){
                document.getElementById('tanah_container').style.display ="block";
                document.getElementById('saham_container').style.display ="block";
              }
              // else{
              //   document.getElementById('tanah_container').style.display ="none";
              //   document.getElementById('saham_container').style.display ="none";
              // }



            }
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
             document.getElementById("datefield").setAttribute("max", today);

            </script>
@endsection
