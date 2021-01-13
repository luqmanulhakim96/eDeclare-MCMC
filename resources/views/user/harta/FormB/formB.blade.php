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
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('b.submit')}}" method="POST">
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
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="hidden" name="jabatan" value="{{Auth::user()->jabatan }}">{{Auth::user()->jabatan }}
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
                                              @if($maklumat_pasangan->NOKNAME != null)
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
                                              <input type="hidden" name="umur_anak" value="{{Auth::user()->umur_anak }}">{{Auth::user()->umur_anak }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->ICNEW != NULL)
                                                <input type="hidden" name="ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}}
                                                @else
                                                -
                                                @endif
                                            </div>
                                        </div>
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
                                              @foreach($salary as $gaji)
                                                <input type="hidden" name="gaji" value="{{$gaji->SALARY}}">{{$gaji->SALARY}}
                                              @endforeach
                                            </div>
                                        </div>

                                        @if($last_data_formb)
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
                                     <input type="hidden" name="counter_harta" value="0" id="counter_harta">

                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                                        </div>
                                      </div>
                                      <div class="table_harta" id="table_harta">

                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Jenis Harta</p>
                                          </div>
                                          <div class="col-md-8">
                                            <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta" value="{{ old('jenis_harta')}}" required>
                                                <option value="" selected disabled hidden>Jenis Harta</option>

                                                @foreach($jenisHarta as $jenisharta)
                                                @if($jenisharta->status_jenis_harta == "Aktif")

                                                <option value="{{$jenisharta->jenis_harta}}" {{ old('jenis_harta') =="$jenisharta->jenis_harta" ? 'selected' :'' }}>{{$jenisharta->jenis_harta}}</option>
                                                @endif
                                                @endforeach

                                                </select>
                                          </div>
                                          @error('jenis_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>

                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta')}}" >
                                        </div>
                                        <div class="col-md-4">
                                            <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik" value="{{ old('hubungan_pemilik')}}" placeholder="Hubungan dengan Pemilik">

                                                <option selected hidden></option>
                                                <option value="Sendiri" {{ old('hubungan_pemilik') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                                <option value="Anak" {{ old('hubungan_pemilik') == "Anak" ? 'selected' : '' }}>Anak</option>
                                                <option value="Isteri/Suami" {{ old('hubungan_pemilik') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                                <option value="Ibu/Ayah" {{ old('hubungan_pemilik') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                                <option value="Lain-lain" {{ old('hubungan_pemilik') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                        @error('hubungan_pemilik')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('maklumat_harta')}}" >
                                        </div>
                                        @error('maklumat_harta')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" id="datefield" type='date' name="tarikh_pemilikan_harta" value="{{ old('tarikh_pemilikan_harta')}}" >
                                        </div>
                                        @error('tarikh_pemilikan_harta')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="bilangan" placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ old('bilangan')}}" >
                                        </div>
                                        @error('bilangan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nilai Perolehan Harta (RM)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_perolehan" placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan')}}" >
                                        </div>
                                        @error('nilai_perolehan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Cara Dan Dari Siapa Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select id="cara_perolehan" class="custom-select  bg-light" name="cara_perolehan" >
                                                <option value="" selected disabled hidden>Cara Perolehan</option>
                                                <option value="" selected hidden></option>
                                                <option value="Dipusakai" {{ old('cara_perolehan') == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                                <option value="Dibeli" {{ old('cara_perolehan') == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                                <option value="Dihadiahkan" {{ old('cara_perolehan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                                <option value="Lain-lain" {{ old('cara_perolehan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                        @error('cara_perolehan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                        <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_perolehan" value="{{ session()->get('asset.cara_perolehan') }}">
                                        </div> -->
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ old('nama_pemilikan_asal')}}">
                                        </div>
                                        @error('nama_pemilikan_asal')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required"><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>a)	Jika Pinjaman, Nyatakan</b></p>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>i) Jumlah Pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman')}}">
                                          @error('jumlah_pinjaman')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii)	Institusi memberi pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="institusi_pinjaman" value="{{ old('institusi_pinjaman')}}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii)	Tempoh bayaran balik</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="tempoh_bayar_balik" value="{{ old('tempoh_bayar_balik')}}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Ansuran bulanan </p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="ansuran_bulanan" value="{{ old('ansuran_bulanan')}}">
                                          @error('ansuran_bulanan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh ansuran pertama</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" id="datefield1" type="date" name="tarikh_ansuran_pertama" value="{{ old('tarikh_ansuran_pertama')}}">
                                          @error('tarikh_ansuran_pertama')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>b) Hasil Pelupusan Harta, Nyatakan</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>i)	Jenis Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jenis_harta_pelupusan" value="{{ old('jenis_harta_pelupusan')}}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii) Alamat</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="alamat_asset" value="{{ old('alamat_asset')}}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii) No Pendaftaran Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran')}}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Harga Jualan</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="harga_jualan" value="{{ old('harga_jualan')}}">
                                          @error('harga_jualan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh lupus</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" id="datefield2" type="date" name="tarikh_lupus" value="{{ old('tarikh_lupus')}}">
                                          @error('tarikh_lupus')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <!-- <div class="col-md-1">
                                        <button class="add_field_button" id="add_harta_button">Tambah</button>
                                    </div> -->
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="col-md-4 mt-2 mt-md-0">
                        <div class="col-md-4 mt-2 mt-md-0">
                            <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ old('gaji_pasangan')}}">
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
                                <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan')}}">
                            </div>
                            @error('jumlah_imbuhan')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
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
                                <input class="form-control bg-light" oninput="findTotalDividenPegawai()" name="dividen_1_pegawai[0]" placeholder="Dividen Pegawai" id="dividen0" value="{{ old('dividen_1_pegawai[]')}}">
                                @error('dividen_1_pegawai[0]')
                                   <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mt-2 mt-md-0">
                            <input class="form-control bg-light" oninput="findTotalDividenPasangan()" name="dividen_1_pasangan[0]" placeholder="Dividen Pasangan" id="dividen_pasangan0" value="{{ old('dividen_1_pasangan[]')}}">
                            @error('dividen_1_pasangan[0]')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="col-md-1">
                          <button class="add_field_button1" id="add_dividen_button1">Tambah</button>
                      </div>
                      </div>
                      <br>
                      </div>

                      <!-- jumlah pendapatan -->
                      <!-- <div class="row">
                        <div class="col-md-3 mt-2 mt-md-0">
                          <p><b>JUMLAH</b></p>
                        </div>
                        <div class="col-md-4 mt-2 mt-md-0">
                            <div class="input-group">
                                <input class="form-control bg-light" type="text" name="pendapatan_pegawai" id="total_dividen_pegawai" >
                            </div>
                        </div>
                        <div class="col-md-4 mt-2 mt-md-0">
                            <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ old('pendapatan_pasangan')}}" id="total_dividen_pasangan" >
                        </div>
                      </div> -->
                      <!-- <br>

                      <script>
                          function findTotalDividenPegawai(){
                              //cari length array dulu
                              // var arr = $('#dividen[0').val();
                              var arr = $('#counter_for_dividen').val();

                              console.log( "ni dividen before",arr);

                              arr=parseFloat(arr);
                              console.log( "ni dividen",arr);
                              var total_dividen_pegawai=0.00;
                              total_dividen_pegawai=parseFloat(total_dividen_pegawai);
                              console.log("ni panjang",arr.length);

                             for(var i=0; i<arr.length; i++) {
                               console.log( "dividen",arr[i].value);
                               if(parseFloat(arr[i].value))
                                total_dividen_pegawai += parseFloat(arr[i].value);
                             }
                             console.log(  "ni total", total_dividen_pegawai);
                             document.getElementById('total_dividen_pegawai').value = total_dividen_pegawai;
                           }
                           function findTotalDividenPasangan(){
                                 //cari length array dulu
                                 var arr = $('#dividen_pasangan').val();
                                 arr=parseInt(arr);
                                 console.log( arr);
                                 var total_dividen_pasangan=0.00;
                                 total_dividen_pasangan=parseFloat(total_dividen_pasangan);
                                 console.log( total_dividen_pasangan);

                                for(var i=0; i<arr.length; i++) {
                                  if(parseFloat(arr[i].value))
                                   total_dividen_pasangan += parseFloat(arr[i].value);

                              }
                            document.getElementById('total_dividen_pasangan').value = total_dividen_pasangan;
                          }
                      </script> -->
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
                          <input class="form-control bg-light" onkeyup="findTotalPinjamanPegawai()" name="jumlah_koperasi_pegawai" value="{{ old('jumlah_koperasi_pegawai')}}" id="jumlah_koperasi_pegawai">
                          @error('jumlah_koperasi_pegawai')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                        <div class="col-md-2">
                          <input class="form-control bg-light" onkeyup="findTotalBulananPegawai()" name="bulanan_koperasi_pegawai" value="{{ old('bulanan_koperasi_pegawai')}}" id="bulanan_koperasi_pegawai">
                          @error('bulanan_koperasi_pegawai')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                          <div class="col-md-2">
                            <input class="form-control bg-light" onkeyup="findTotalPinjamanPasangan()" name="jumlah_koperasi_pasangan" value="{{ old('jumlah_koperasi_pasangan')}}" id="jumlah_koperasi_pasangan">
                            @error('jumlah_koperasi_pasangan')
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                          </div>
                          <div class="col-md-2">
                            <input class="form-control bg-light" onkeyup="findTotalBulananPasangan()" name="bulanan_koperasi_pasangan" value="{{ old('bulanan_koperasi_pasangan')}}" id="bulanan_koperasi_pasangan">
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

                      <!--JUMLAH PINJAMAN -->
                      <!-- <div class="row">
                        <div class="col-md-3">
                          <p><b>JUMLAH</b></p>
                        </div>
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai" id="jumlah_pinjaman_pegawai" >
                        </div>
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai" id="jumlah_bulanan_pegawai" >
                        </div>
                          <div class="col-md-2">
                            <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan" id="jumlah_pinjaman_pasangan" >
                          </div>
                          <div class="col-md-2">
                            <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" id="jumlah_bulanan_pasangan" >
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
                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-4">
                          <p class="required">Jenis Harta</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="jenis_harta"  placeholder="Jenis Harta"  value="{{ old('jenis_harta')}}" required>
                        </div>
                      </div> -->

                      <div class="row">
                          <div class="col-md-4">
                            <p class="required">Jenis Harta</p>
                          </div>
                          <div class="col-md-8">
                            <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta" value="{{ old('jenis_harta')}}" >
                              <option selected hidden></option>

                                @foreach($jenisHarta as $jenisharta)
                                @if($jenisharta->status_jenis_harta == "Aktif")

                                <option value="{{$jenisharta->jenis_harta}}" {{ old('jenis_harta') =="$jenisharta->jenis_harta" ? 'selected' :'' }}>{{$jenisharta->jenis_harta}}</option>

                                @endif
                                @endforeach

                                </select>
                          </div>
                          @error('jenis_harta')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                      </div>

                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                        </div>
                        <div class="col-md-4">
                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta')}}" >
                        </div>
                        <div class="col-md-4">
                            <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik" value="{{ old('hubungan_pemilik')}}" placeholder="Hubungan dengan Pemilik">

                                <option selected hidden></option>
                                <option value="Sendiri" {{ old('hubungan_pemilik') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                <option value="Anak" {{ old('hubungan_pemilik') == "Anak" ? 'selected' : '' }}>Anak</option>
                                <option value="Isteri/Suami" {{ old('hubungan_pemilik') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                <option value="Ibu/Ayah" {{ old('hubungan_pemilik') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                <option value="Lain-lain" {{ old('hubungan_pemilik') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                        </div>
                        @error('hubungan_pemilik')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('maklumat_harta')}}" >
                        </div>
                        @error('maklumat_harta')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Tarikh Pemilikan Harta</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" id="datefield" type='date' name="tarikh_pemilikan_harta" value="{{ old('tarikh_pemilikan_harta')}}" >
                        </div>
                        @error('tarikh_pemilikan_harta')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="bilangan" placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ old('bilangan')}}" >
                        </div>
                        @error('bilangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Nilai Perolehan Harta (RM)</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="nilai_perolehan" placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan')}}" >
                        </div>
                        @error('nilai_perolehan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required">Cara Dan Dari Siapa Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                        </div>
                        <div class="col-md-4">
                            <select id="cara_perolehan" class="custom-select  bg-light" name="cara_perolehan" >
                                <option value="" selected disabled hidden>Cara Perolehan</option>
                                <option value="" selected hidden></option>
                                <option value="Dipusakai" {{ old('cara_perolehan') == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                <option value="Dibeli" {{ old('cara_perolehan') == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                <option value="Dihadiahkan" {{ old('cara_perolehan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                <option value="Lain-lain" {{ old('cara_perolehan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                        </div>
                        @error('cara_perolehan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <!-- <div class="col-md-4">
                          <input class="form-control bg-light" type="text" name="cara_perolehan" value="{{ session()->get('asset.cara_perolehan') }}">
                        </div> -->
                        <div class="col-md-4">
                          <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ old('nama_pemilikan_asal')}}">
                        </div>
                        @error('nama_pemilikan_asal')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="required"><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya</b></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <p><b>a)	Jika Pinjaman, Nyatakan</b></p>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>i) Jumlah Pinjaman</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman')}}">
                          @error('jumlah_pinjaman')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>ii)	Institusi memberi pinjaman</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="institusi_pinjaman" value="{{ old('institusi_pinjaman')}}">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>iii)	Tempoh bayaran balik</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="tempoh_bayar_balik" value="{{ old('tempoh_bayar_balik')}}">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>iv) Ansuran bulanan </p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="ansuran_bulanan" value="{{ old('ansuran_bulanan')}}">
                          @error('ansuran_bulanan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>v)	Tarikh ansuran pertama</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" id="datefield1" type="date" name="tarikh_ansuran_pertama" value="{{ old('tarikh_ansuran_pertama')}}">
                          @error('tarikh_ansuran_pertama')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p><b>b) Hasil Pelupusan Harta, Nyatakan</b></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <p>i)	Jenis Harta</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="jenis_harta_pelupusan" value="{{ old('jenis_harta_pelupusan')}}">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>ii) Alamat</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="alamat_asset" value="{{ old('alamat_asset')}}">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>iii) No Pendaftaran Harta</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran')}}">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>iv) Harga Jualan</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" type="text" name="harga_jualan" value="{{ old('harga_jualan')}}">
                          @error('harga_jualan')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-4">
                          <p>v)	Tarikh lupus</p>
                        </div>
                        <div class="col-md-8">
                          <input class="form-control bg-light" id="datefield2" type="date" name="tarikh_lupus" value="{{ old('tarikh_lupus')}}">
                          @error('tarikh_lupus')
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                      </div>
                    <!-- <div class="col-md-1">
                      <button class="add_field_button" id="add_harta_button">Tambah</button>
                  </div> -->
                  </div>
              </div>
          </div>
      </div>
      @endif
                    <br>
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

            <!--script-->
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
             document.getElementById("datefield1").setAttribute("max", today);

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
             document.getElementById("datefield2").setAttribute("max", today);

            </script>

            <script type="text/javascript">
              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              var wrapper   		= $("#table_lain"); //Fields wrapper
              var add_button      = $("#add_pinjaman_button"); //Add button ID
              var counter = document.getElementById("counter").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter++;

                  $(wrapper).append('<div id="divi'+counter+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="text" name="lain_lain_pinjaman['+
                  counter+
                  ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pegawai['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pasangan['+
                  counter+
                  ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pasangan['+
                  counter+
                  ']"></div><div class="col-md-1"><a onClick="removeData(this,'+
                  counter+
                  ' ); return false;" id ="del'+
                  counter+
                  '"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>');

              });
            });

            function removeData(e,counter){
            //$(e).parents('div'+counter+'').remove();
            console.log('masuk');
              $('#divi'+counter+'').remove();
              $('#del'+counter+'').remove();
             //  var counter = document.getElementById("counter").value;
             //  counter--;
             // doctype.getElementById("counter").value = counter;
            }
            </script>
            <script type="text/javascript">

              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              var wrapper   		= $("#dividen_field"); //Fields wrapper
              var add_button      = $("#add_dividen_button"); //Add button ID
              var counter_dividen = document.getElementById("counter_dividen").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter_dividen++;
                  console.log('dividencounter',counter_dividen);

                  $(wrapper).append('<div id="dividen_add'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1['+
                  counter_dividen+
                  ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" oninput="findTotalDividenPegawai()" name="dividen_1_pegawai['+
                  counter_dividen+
                  ']" placeholder="Dividen Pegawai"></div></div><input type="hidden" name="counter" id="counter_for_dividen" value="'+
                  counter_dividen+

                  '"><div class="col-md-4 mt-2 mt-md-0" id="dividen"><input class="form-control bg-light" oninput="findTotalDividenPasangan()" name="dividen_1_pasangan['+

                  counter_dividen+
                  ']" placeholder="Dividen Pasangan" id="dividen_pasangan"></div><div class="col-md-1"><a onClick="removeDividen(this,'+
                  counter_dividen+
                  ' ); return false;" id ="button'+counter_dividen+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

              });
            });

            function removeDividen(e,counter_dividen){
              // $(e).parents('div'+counter_pndptn+'').remove();
            console.log('masuk');
              $('#dividen_add'+counter_dividen+'').remove();
              $('#button'+counter_dividen+'').remove();
            //   var counter = document.getElementById("counter").value;
            //   counter--;
            // doctype.getElementById("counter").value = counter;
            }

            </script>

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
                  ' ); return false;" id ="del1'+
                  counter+
                  '"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>');

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
            <script type="text/javascript">

              $(document).ready(function() {
              // var max_fields      = 10; //maximum input boxes allowed
              var wrapper   		= $("#dividen_field1"); //Fields wrapper
              var add_button      = $("#add_dividen_button1"); //Add button ID
              var counter_dividen = document.getElementById("counter_dividen1").value;

              $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                  counter_dividen++;
                  console.log('dividencounter',counter_dividen);

                  $(wrapper).append('<div id="dividen_add1'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1['+
                  counter_dividen+
                  ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" oninput="findTotalDividenPegawai()" name="dividen_1_pegawai['+
                  counter_dividen+
                  ']" placeholder="Dividen Pegawai"></div></div><input type="hidden" name="counter" id="counter_for_dividen" value="'+
                  counter_dividen+

                  '"><div class="col-md-4 mt-2 mt-md-0" id="dividen"><input class="form-control bg-light" oninput="findTotalDividenPasangan()" name="dividen_1_pasangan['+

                  counter_dividen+
                  ']" placeholder="Dividen Pasangan" id="dividen_pasangan"></div><div class="col-md-1"><a onClick="removeDividen1(this,'+
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

            <!-- <script>
            function findTotalPinjamanPegawai(){
              //cari length array dulu
              var arr = $('#jumlah_koperasi_pegawai').val();
              arr=parseFloat(arr);
              console.log( "ni dividen",arr);
              var jumlah_pinjaman_pegawai=0.00;
              jumlah_pinjaman_pegawai=parseFloat(jumlah_pinjaman_pegawai);


             for(var i=0; i<arr.length; i++) {
               if(parseFloat(arr[i].value))
                jumlah_pinjaman_pegawai += parseFloat(arr[i].value);

             }console.log(  "ni total", jumlah_pinjaman_pegawai);
             document.getElementById('jumlah_pinjaman_pegawai').value = jumlah_pinjaman_pegawai;
           }

           function findTotalBulananPegawai(){
             //cari length array dulu
             var arr = $('#bulanan_koperasi_pegawai').val();
             arr=parseInt(arr);
             console.log( arr);
             var jumlah_bulanan_pegawai=0.00;
             jumlah_bulanan_pegawai=parseFloat(jumlah_bulanan_pegawai);
             console.log( jumlah_bulanan_pegawai);

            for(var i=0; i<arr.length; i++) {
              if(parseFloat(arr[i].value))
               jumlah_bulanan_pegawai += parseFloat(arr[i].value);

            }
            document.getElementById('jumlah_bulanan_pegawai').value = jumlah_bulanan_pegawai;
          }
            </script>
            <script>
            function findTotalPinjamanPasangan(){
              //cari length array dulu
              var arr = $('#jumlah_koperasi_pasangan').val();
              arr=parseFloat(arr);
              console.log( "ni dividen",arr);
              var jumlah_pinjaman_pasangan=0.00;
              jumlah_pinjaman_pasangan=parseFloat(jumlah_pinjaman_pasangan);


             for(var i=0; i<arr.length; i++) {
               if(parseFloat(arr[i].value))
                jumlah_pinjaman_pasangan += parseFloat(arr[i].value);

             }console.log(  "ni total", jumlah_pinjaman_pasangan);
             document.getElementById('jumlah_pinjaman_pasangan').value = jumlah_pinjaman_pasangan;
           }

           function findTotalBulananPasangan(){
             //cari length array dulu
             var arr = $('#bulanan_koperasi_pasangan').val();
             arr=parseInt(arr);
             console.log( arr);
             var jumlah_bulanan_pasangan=0.00;
             jumlah_bulanan_pasangan=parseFloat(jumlah_bulanan_pasangan);
             console.log( jumlah_bulanan_pasangan);

            for(var i=0; i<arr.length; i++) {
              if(parseFloat(arr[i].value))
               jumlah_bulanan_pasangan += parseFloat(arr[i].value);

            }
            document.getElementById('jumlah_bulanan_pasangan').value = jumlah_bulanan_pasangan;
          } -->
@endsection
