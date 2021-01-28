@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran E: Permohonan bagi mendapatkan kebenaran untuk memohon dan memiliki saham</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                               <form action="{{route('g.submit')}}" method="post" enctype="multipart/form-data">
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
                                              <input type="hidden" name="kad_pengenalan" value="{Auth::user()->kad_pengenalan }}">{{Auth::user()->kad_pengenalan }}
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
                                              <input type="hidden" name="jabatan" value="{{$jabatan->OLEVEL4NAME}}">{{$jabatan->OLEVEL4NAME}}
                                            @endforeach
                                            <!-- <input type="hidden" name="jabatan" value="{{Auth::user()->jabatan }}">{{Auth::user()->jabatan }} -->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Lantikan Ke Perkhidmatan Sekarang</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="date" id="datefield" class="form-control bg-light" name="tarikh_lantikan" placeholder="Tarikh Lantikan Ke Perkhidmatan Sekarang" value="{{old('tarikh_lantikan')}}" >
                                              @error('tarikh_lantikan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Nama Perkhidmatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" name="nama_perkhidmatan" placeholder="Nama Perkhidmatan" value="{{ old('nama_perkhidmatan')}}" required>
                                              @error('nama_perkhidmatan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" name="gelaran" placeholder="Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan" value="{{ old('gelaran')}}" required>
                                              @error('gelaran')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="alamat_tempat_bertugas" value="{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($maklumat_pasangan->isEmpty())
                    @else
                    <div class="row">
                      <div class="col-12 mt-4">
                           <div class="card rounded-lg">
                               <div class="card-body">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($last_data_formb)
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
                                            <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ $last_data_formb->gaji_pasangan}}">
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
                                                <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ $last_data_formb->jumlah_imbuhan}}">
                                                @error('jumlah_imbuhan')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $last_data_formb->jumlah_imbuhan_pasangan}}">
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
                                                <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ $last_data_formb->sewa}}">
                                                @error('sewa')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $last_data_formb->sewa_pasangan}}">
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
                                      @foreach($dividen_user as $dividen)
                                      <input type="hidden" name="counter_dividen" value="0" id="counter_dividen">
                                      <div id="dividen_field">
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ $dividen->dividen_1 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" oninput="findTotalDividenPegawai()" name="dividen_1_pegawai[0]" placeholder="Dividen Pegawai" id="dividen0"  value="{{$dividen->dividen_1_pegawai}}">
                                                @error('dividen_1_pegawai[0]')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" oninput="findTotalDividenPasangan()" name="dividen_1_pasangan[0]" placeholder="Dividen Pasangan" id="dividen0"  value="{{ $dividen->dividen_1_pasangan}}">
                                            @error('dividen_1_pasangan[0]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_dividen_button">Tambah</button>
                                      </div>
                                      </div>
                                      <br>
                                      </div>
                                      @endforeach


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
                                          <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" value="{{ $last_data_formb->pinjaman_perumahan_pegawai}}">
                                          @error('pinjaman_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ $last_data_formb->bulanan_perumahan_pegawai}}">
                                          @error('bulanan_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ $last_data_formb->pinjaman_perumahan_pasangan}}">
                                            @error('pinjaman_perumahan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ $last_data_formb->bulanan_perumahan_pasangan}}">
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
                                          <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ $last_data_formb->pinjaman_kenderaan_pegawai}}">
                                          @error('pinjaman_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ $last_data_formb->bulanan_kenderaan_pegawai}}">
                                          @error('bulanan_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ $last_data_formb->pinjaman_kenderaan_pasangan}}">
                                            @error('pinjaman_kenderaan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ $last_data_formb->bulanan_kenderaan_pasangan}}">
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
                                          <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" value="{{ $last_data_formb->jumlah_cukai_pegawai}}">
                                          @error('jumlah_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ $last_data_formb->bulanan_cukai_pegawai}}">
                                          @error('bulanan_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ $last_data_formb->jumlah_cukai_pasangan}}">
                                            @error('jumlah_cukai_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ $last_data_formb->bulanan_cukai_pasangan}}">
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
                                          <input class="form-control bg-light" onkeyup="findTotalPinjamanPegawai()" name="jumlah_koperasi_pegawai" value="{{ $last_data_formb->jumlah_koperasi_pegawai}}" id="jumlah_koperasi_pegawai">
                                          @error('jumlah_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" onkeyup="findTotalBulananPegawai()" name="bulanan_koperasi_pegawai" value="{{ $last_data_formb->bulanan_koperasi_pegawai}}" id="bulanan_koperasi_pegawai">
                                          @error('bulanan_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" onkeyup="findTotalPinjamanPasangan()" name="jumlah_koperasi_pasangan" value="{{ $last_data_formb->jumlah_koperasi_pasangan}}" id="jumlah_koperasi_pasangan">
                                            @error('jumlah_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" onkeyup="findTotalBulananPasangan()" name="bulanan_koperasi_pasangan" value="{{ $last_data_formb->bulanan_koperasi_pasangan}}" id="bulanan_koperasi_pasangan">
                                            @error('bulanan_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <!--LAIN2 PINJAMAN -->
                                      <input type="hidden" name="counter" value="0" id="counter">

                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>v) Lain-Lain Pinjaman</p>
                                        </div>
                                      </div>
                                      @foreach($pinjaman_user as $pinjaman)
                                      <div class="table_lain" id="table_lain">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ $pinjaman->lain_lain_pinjaman}}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" value="{{ $pinjaman->pinjaman_pegawai}}">
                                          @error('pinjaman_pegawai[]')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ $pinjaman->bulanan_pegawai}}">
                                          @error('bulanan_pegawai[]')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{$pinjaman->pinjaman_pasangan}}">
                                            @error('pinjaman_pasangan[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ $pinjaman->bulanan_pasangan}}">
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
                                      @endforeach
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
                                                  <input type="text" class="form-control bg-light"name="luas_pertanian" placeholder="Luas" value="{{ old('luas_pertanian')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light"name="lot_pertanian" placeholder="No. Lot" value="{{ old('lot_pertanian')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_pertanian" placeholder="Mukim" value="{{ old('mukim_pertanian')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_pertanian" placeholder="Negeri" value="{{ old('negeri_pertanian')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>ii) Tanah Perumahan</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas_perumahan"placeholder="Luas" value="{{ old('luas_perumahan')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot_perumahan" placeholder="No. Lot" value="{{ old('lot_perumahan')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_perumahan" placeholder="Mukim" value="{{ old('mukim_perumahan')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_perumahan" placeholder="Negeri" value="{{ old('negeri_perumahan')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Tarikh Diperolehi</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="date" class="form-control bg-light" name="tarikh_diperolehi" placeholder="Luas" value="{{ old('tarikh_diperolehi')}}">
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
                                          <p><b>i) Butir- butir lengkap mengenai tanah Kerajaan yang hendak dipohon dan dimiliki: </b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas" placeholder="Luas" value="{{ old('luas')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot" placeholder="No. Lot" value="{{ old('lot')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim" placeholder="Mukim" value="{{ old('mukim')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri" placeholder="Negeri" value="{{ old('negeri')}}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Jenis Tanah</p>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="radio" id="pertanian" name="jenis_tanah" value="pertanian" {{ old('jenis_tanah') == "pertanian" ? 'selected' : '' }}>
                                                <label for="pertanian">Tanah Pertanian</label><br>
                                            <input type="radio" id="perumahan" name="jenis_tanah" value="perumahan" {{ old('jenis_tanah') == "perumahan" ? 'selected' : '' }}>
                                                <label for="perumahan">Tanah Perumahan</label><br>
                                          </div>
                                      </div>
                                      <br>
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
                                                <input type="text" class="form-control bg-light" name="nama_syarikat" placeholder="Nama Syarikat" value="{{ old('nama_syarikat')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Modal Berbayar (Paid Up Capital)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="modal_berbayar" placeholder="Modal Berbayar (Paid Up Capital)" value="{{ old('modal_berbayar')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Jumlah Unit Nilai Saham Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="jumlah_unit_saham" placeholder="Jumlah Unit" value="{{ old('jumlah_unit_saham')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nilai Saham</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="nilai_saham" placeholder="Nilai Saham" value="{{ old('nilai_saham')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="sumber_kewangan" placeholder="Sumber Kewangan" value="{{ old('sumber_kewangan')}}" required>
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

                                  <input type="hidden" name="counter_saham" value="0" id="counter_saham">
                                  <div class="saham" id="saham">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi" value="{{ old('institusi[]')}}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ old('alamat_institusi[]')}}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ old('ansuran_bulanan[]')}}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="date" class="form-control bg-light" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ old('tarikh_ansuran[]')}}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ old('tempoh_pinjaman[]')}}">
                                      </div>
                                      <div class="col-md-1">
                                        <button class="add_field_button" id="add_saham_button">Tambah</button>
                                    </div>
                                    </div>
                                    <br>
                                </div></div>
                            </div>
                        </div>
                    </div>
                    @else
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
                        <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ old('gaji_pasangan')}}">
                        @error('gaji_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <br>


                <!-- imbuhan -->
                  <div class="row">
                    <div class="col-md-3 mt-2 mt-md-0">
                        <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan')}}">
                          @error('jumlah_imbuhan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                      <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ old('jumlah_imbuhan_pasangan')}}">
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
                          <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ old('sewa')}}">
                          @error('sewa')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                      <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ old('sewa_pasangan')}}">
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
                  <input type="hidden" name="counter_dividen" value="0" id="counter_dividen1">
                  <div id="dividen_field">
                  <div class="row">
                    <div class="col-md-3 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ old('dividen_1[]')}}">

                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{ old('dividen_1_pegawai[]')}}">
                          @error('dividen_1_pegawai[]')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                       </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                      <input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{ old('dividen_1_pasangan[]')}}">
                      @error('dividen_1_pasangan[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <div class="col-md-1">
                      <button class="add_field_button1" id="add_dividen_button1">Tambah</button>
                  </div>
                  </div>
                  <br>
                  </div>


                  <script type="text/javascript">

                    $(document).ready(function() {
                    // var max_fields      = 10; //maximum input boxes allowed
                    var wrapper   		= $("#dividen_field1"); //Fields wrapper
                    var add_button      = $("#add_dividen_button1"); //Add button ID
                    var counter_dividen = document.getElementById("counter_dividen1").value;

                    $(add_button).click(function(e){ //on add input button click
                      e.preventDefault();
                        counter_dividen++;
                        console.log(counter_dividen);

                        $(wrapper).append('<div id="dividen_add1'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1['+
                        counter_dividen+
                        ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1_pegawai['+
                        counter_dividen+
                        ']" placeholder="Dividen Pegawai"></div></div><div class="col-md-4 mt-2 mt-md-0"><input class="form-control bg-light" type="text" name="dividen_1_pasangan['+
                        counter_dividen+
                        ']" placeholder="Dividen Pasangan"></div><div class="col-md-1"><a onClick="removeDividen1(this,'+
                        counter_dividen+
                        ' ); return false;" id ="button1'+counter_dividen+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                    });
                  });

                  function removeDividen1(e,counter_dividen){
                    // $(e).parents('div'+counter_pndptn+'').remove();
                  console.log('masuk');
                    $('#dividen_add1'+counter_dividen+'').remove();
                    $('#button1'+counter_dividen+'').remove();
                  //   var counter = document.getElementById("counter").value;
                  //   counter--;
                  // doctype.getElementById("counter").value = counter;
                  }

                  </script>

                  <!-- lain-lain -->
                  <!-- <input type="hidden" name="counter_pndptn" value="0" id="counter_pndptn">
                  <div class="lain_pendapatan" id="lain_pendapatan">
                  <div class="row">
                    <div class="col-md-3 mt-2 mt-md-0">
                        <p> v) Lain-Lain</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="lain3[]" placeholder="Nyatakan Lain-Lain" value="{{ session()->get('asset.lain3[]') }}">
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="lain3_pegawai[]" value="{{ session()->get('asset.lain3_pegawai[]') }}">
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                      <input class="form-control bg-light" type="text" name="lain3_pasangan[]" value="{{ session()->get('asset.lain3_pasangan[]') }}">
                    </div>
                    <div class="col-md-1">
                      <button class="add_field_button" id="add_pendapatan_button">Add</button>
                  </div>
                  </div>
                  <br>
                  </div>



                  <script type="text/javascript">

                    $(document).ready(function() {
                    // var max_fields      = 10; //maximum input boxes allowed
                    var wrapper   		= $("#lain_pendapatan"); //Fields wrapper
                    var add_button      = $("#add_pendapatan_button"); //Add button ID
                    var counter_pndptn = document.getElementById("counter_pndptn").value;

                    $(add_button).click(function(e){ //on add input button click
                      e.preventDefault();
                        counter_pndptn++;

                        $(wrapper).append('<div id="div'+counter_pndptn+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="lain3['+
                        counter_pndptn+
                        ']" placeholder="Nyatakan Lain-Lain"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="lain3_pegawai['+
                        counter_pndptn+
                        ']"></div></div><div class="col-md-4 mt-2 mt-md-0"><input class="form-control bg-light" type="text" name="lain3_pasangan['+
                        counter_pndptn+
                        ']"></div><div class="col-md-1"><a onClick="removeData1(this,'+
                        counter_pndptn+
                        ' ); return false;" id ="gg'+counter_pndptn+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                    });
                  });

                  function removeData1(e,counter_pndptn){
                    // $(e).parents('div'+counter_pndptn+'').remove();
                  console.log('masuk');
                    $('#div'+counter_pndptn+'').remove();
                    $('#gg'+counter_pndptn+'').remove();
                  //   var counter = document.getElementById("counter").value;
                  //   counter--;
                  // doctype.getElementById("counter").value = counter;
                  }

                  </script> -->

                  <!-- jumlah pendapatan -->
                  <!-- <div class="row">
                    <div class="col-md-3 mt-2 mt-md-0">
                      <p><b>JUMLAH</b></p>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="input-group">
                          <input class="form-control bg-light" type="text" name="pendapatan_pegawai" value="{{ old('pendapatan_pegawai')}}">
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                      <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ old('pendapatan_pasangan')}}">
                    </div>
                  </div> -->
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
                      <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" value="{{ old('pinjaman_perumahan_pegawai')}}">
                      @error('pinjaman_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ old('bulanan_perumahan_pegawai')}}">
                      @error('bulanan_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ old('pinjaman_perumahan_pasangan')}}">
                        @error('pinjaman_perumahan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ old('bulanan_perumahan_pasangan')}}">
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
                      <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ old('pinjaman_kenderaan_pegawai')}}">
                      @error('pinjaman_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ old('bulanan_kenderaan_pegawai')}}">
                      @error('bulanan_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ old('pinjaman_kenderaan_pasangan')}}">
                        @error('pinjaman_kenderaan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ old('bulanan_kenderaan_pasangan')}}">
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
                      <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" value="{{ old('jumlah_cukai_pegawai')}}">
                      @error('jumlah_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ old('bulanan_cukai_pegawai')}}">
                      @error('bulanan_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ old('jumlah_cukai_pasangan')}}">
                        @error('jumlah_cukai_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ old('bulanan_cukai_pasangan')}}">
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
                      <input class="form-control bg-light" type="text" name="jumlah_koperasi_pegawai" value="{{ old('jumlah_koperasi_pegawai')}}">
                      @error('jumlah_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai" value="{{ old('bulanan_koperasi_pegawai')}}">
                      @error('bulanan_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan" value="{{ old('jumlah_koperasi_pasangan')}}">
                        @error('jumlah_koperasi_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan" value="{{ old('bulanan_koperasi_pasangan')}}">
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
                  <div class="table_lain" id="table_lain1">
                  <div class="row">
                    <div class="col-md-3">
                      <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ old('lain_lain_pinjaman[]')}}">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" value="{{ old('pinjaman_pegawai[]')}}">
                      @error('pinjaman_pegawai[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ old('bulanan_pegawai[]')}}">
                      @error('bulanan_pegawai[]')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{ old('pinjaman_pasangan[]')}}">
                        @error('pinjaman_pasangan[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ old('bulanan_pasangan[]')}}">
                        @error('bulanan_pasangan[]')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                    <div class="col-md-1">
                      <button class="add_field_button1" id="add_pinjaman_button1">Tambah</button>
                  </div>
                  </div>
                  <br>
                  </div>

                  <!--script-->
                  <script type="text/javascript">
                    $(document).ready(function() {
                    // var max_fields      = 10; //maximum input boxes allowed
                    var wrapper   		= $("#table_lain1"); //Fields wrapper
                    var add_button      = $("#add_pinjaman_button1"); //Add button ID
                    var counter = document.getElementById("counter1").value;

                    $(add_button).click(function(e){ //on add input button click
                      e.preventDefault();
                        counter++;

                        $(wrapper).append('<div id="divi1'+counter+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="text" name="lain_lain_pinjaman['+
                        counter+
                        ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pegawai['+
                        counter+
                        ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pegawai['+
                        counter+
                        ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pasangan['+
                        counter+
                        ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pasangan['+
                        counter+
                        ']"></div><div class="col-md-1"><a onClick="removeData1(this,'+
                        counter+
                        ' ); return false;" id ="del1'+counter+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                    });
                  });

                  function removeData1(e,counter){
                  //$(e).parents('div'+counter+'').remove();
                  console.log('masuk');
                    $('#divi1'+counter+'').remove();
                    $('#del1'+counter+'').remove();
                   //  var counter = document.getElementById("counter").value;
                   //  counter--;
                   // doctype.getElementById("counter").value = counter;
                  }
                  </script>

                  <!--JUMLAH PINJAMAN -->
                  <!-- <div class="row">
                    <div class="col-md-3">
                      <p><b>JUMLAH</b></p>
                    </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai" value="{{ old('jumlah_pinjaman_pegawai')}}">
                    </div>
                    <div class="col-md-2">
                      <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai" value="{{ old('jumlah_pinjaman_pegawai')}}">
                    </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan" value="{{ old('jumlah_pinjaman_pegawai')}}">
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" value="{{ old('jumlah_pinjaman_pegawai')}}">
                    </div>
                  </div> -->
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
                              <input type="text" class="form-control bg-light"name="luas_pertanian" placeholder="Luas" value="{{ old('luas_pertanian')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>No.Lot</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light"name="lot_pertanian" placeholder="No. Lot" value="{{ old('lot_pertanian')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Mukim</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="mukim_pertanian" placeholder="Mukim" value="{{ old('mukim_pertanian')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Negeri</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="negeri_pertanian" placeholder="Negeri" value="{{ old('negeri_pertanian')}}">
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <p><b>ii) Tanah Perumahan</b></p>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Luas</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="luas_perumahan"placeholder="Luas" value="{{ old('luas_perumahan')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>No.Lot</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="lot_perumahan" placeholder="No. Lot" value="{{ old('lot_perumahan')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Mukim</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="mukim_perumahan" placeholder="Mukim" value="{{ old('mukim_perumahan')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Negeri</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="negeri_perumahan" placeholder="Negeri" value="{{ old('negeri_perumahan')}}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p>Tarikh Diperolehi</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="date" class="form-control bg-light" id="datefield1" name="tarikh_diperolehi" placeholder="Luas" value="{{ old('tarikh_diperolehi')}}">
                          </div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-4">
                      <p><b>6. BUTIR-BUTIR TANAH ATAU SAHAM YANG DIPOHON</b></p>
                    </div>
                  </div>
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
                              <input type="text" class="form-control bg-light" name="luas" placeholder="Luas" value="{{ old('luas')}}">
                          </div>
                      </div>
                      @error('luas')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p class="required">No.Lot</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="lot" placeholder="No. Lot" value="{{ old('lot')}}">
                          </div>
                      </div>
                      @error('lot')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p class="required">Mukim</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="mukim" placeholder="Mukim" value="{{ old('mukim')}}">
                          </div>
                      </div>
                      @error('mukim')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p class="required">Negeri</p>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <input type="text" class="form-control bg-light" name="negeri" placeholder="Negeri" value="{{ old('negeri')}}">
                          </div>
                      </div>
                      @error('negeri')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                        <p class="required">Jenis Tanah</p>
                      </div>
                      <div class="col-md-8">
                        <input type="radio" name="jenis_tanah" value="" checked="checked" disable hidden>
                        <input type="radio" id="pertanian" name="jenis_tanah" value="pertanian" {{ old('jenis_tanah') == "pertanian" ? 'selected' : '' }}>
                            <label for="pertanian">Tanah Pertanian</label><br>
                        <input type="radio" id="perumahan" name="jenis_tanah" value="perumahan" {{ old('jenis_tanah') == "perumahan" ? 'selected' : '' }}>
                            <label for="perumahan">Tanah Perumahan</label><br>
                      </div>
                      @error('jenis_tanah')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <br>
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
                            <input type="text" class="form-control bg-light" name="nama_syarikat" placeholder="Nama Syarikat" value="{{ old('nama_syarikat')}}" >
                        </div>
                    </div>
                    @error('nama_syarikat')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <p class="required">Modal Berbayar (Paid Up Capital)</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control bg-light" name="modal_berbayar" placeholder="Modal Berbayar (Paid Up Capital)" value="{{ old('modal_berbayar')}}" >
                        </div>
                    </div>
                    @error('modal_berbayar')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <p class="required">Jumlah Unit Nilai Saham Sumber Kewangan</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control bg-light" name="jumlah_unit_saham" placeholder="Jumlah Unit" value="{{ old('jumlah_unit_saham')}}" >
                        </div>
                    </div>
                    @error('jumlah_unit_saham')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <p class="required">Nilai Saham</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control bg-light" name="nilai_saham" placeholder="Nilai Saham" value="{{ old('nilai_saham')}}" >
                        </div>
                    </div>
                    @error('nilai_saham')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <p class="required">Sumber Kewangan</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control bg-light" name="sumber_kewangan" placeholder="Sumber Kewangan" value="{{ old('sumber_kewangan')}}" >
                        </div>
                    </div>
                    @error('sumber_kewangan')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
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

              <input type="hidden" name="counter_saham" value="0" id="counter_saham1">
              <div class="saham" id="saham1">
                <div class="row">
                  <div class="col-md-2">
                    <input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi" value="{{ old('institusi[]')}}">
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control bg-light" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ old('alamat_institusi[]')}}">
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control bg-light" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ old('ansuran_bulanan[]')}}">
                  </div>
                  <div class="col-md-2">
                    <input type="date" class="form-control bg-light" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ old('tarikh_ansuran[]')}}">
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control bg-light" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ old('tempoh_pinjaman[]')}}">
                  </div>
                  <div class="col-md-1">
                    <button class="add_field_button1" id="add_saham_button1">Tambah</button>
                </div>
                </div>
                <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
                                    <br>
                                    <div class="row">
                                      <div class="col-md-1" align="right">
                                        <input type="checkbox" name="pengakuan" value="pengakuan pegawai" required>
                                      </div>
                                      <div class="col-md-11">
                                          <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC</b></label><br>
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
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                  <button type="submit" class="btn btn-primary" name="save">Ya</button>
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
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                              </form>
                          </div>
                          </div>
                      </div>
               </div>
           </div>



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

                 $(wrapper).append('<div id="saham'+counter_saham+'"  class="row"><div class="col-md-2"><input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="alamat_institusi['+
                 counter_saham+']" placeholder="Alamat Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="ansuran_bulanan['+
                 counter_saham+']" placeholder="Ansuran Bulanan"></div><div class="col-md-2"><input type="date" class="form-control bg-light" name="tarikh_ansuran['+
                 counter_saham+']" placeholder="Tarikh Ansuran Pertama"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="tempoh_pinjaman['+
                 counter_saham+']" placeholder="Tempoh Pinjaman"></div><div class="col-md-1"><a onClick="removeDataSaham(this,'+counter_saham+' ); return false;" id ="delsaham'+counter_saham+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

             });
           });

           function removeDataSaham(e,counter_saham){
           //$(e).parents('div'+counter+'').remove();
           console.log('masuk');
             $('#saham'+counter_saham+'').remove();
             $('#delsaham'+counter_saham+'').remove();
            //  var counter = document.getElementById("counter").value;
            //  counter--;
            // doctype.getElementById("counter").value = counter;
           }
           </script>
           <script type="text/javascript">
             $(document).ready(function() {
             // var max_fields      = 10; //maximum input boxes allowed
             var wrapper   		= $("#saham1"); //Fields wrapper
             var add_button      = $("#add_saham_button1"); //Add button ID
             var counter_saham = document.getElementById("counter_saham1").value;

             $(add_button).click(function(e){ //on add input button click
               e.preventDefault();
                 counter_saham++;
                 console.log(counter_saham);

                 $(wrapper).append('<div id="saham1'+counter_saham+'"  class="row"><div class="col-md-2"><input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="alamat_institusi['+
                 counter_saham+']" placeholder="Alamat Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="ansuran_bulanan['+
                 counter_saham+']" placeholder="Ansuran Bulanan"></div><div class="col-md-2"><input type="date" class="form-control bg-light" name="tarikh_ansuran['+
                 counter_saham+']" placeholder="Tarikh Ansuran Pertama"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="tempoh_pinjaman['+
                 counter_saham+']" placeholder="Tempoh Pinjaman"></div><div class="col-md-1"><a onClick="removeDataSaham1(this,'+counter_saham+' ); return false;" id ="delsaham1'+counter_saham+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

             });
           });

           function removeDataSaham(e,counter_saham){
           //$(e).parents('div'+counter+'').remove();
           console.log('masuk');
             $('#saham1'+counter_saham+'').remove();
             $('#delsaham1'+counter_saham+'').remove();
            //  var counter = document.getElementById("counter").value;
            //  counter--;
            // doctype.getElementById("counter").value = counter;
           }
           </script>
@endsection
