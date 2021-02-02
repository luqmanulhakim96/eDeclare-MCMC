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
                   <div class="row">
                   <div class="col-md-10"></div>
                     <div class="col-md-2" align="right">
                       <a class="btn btn-primary btn-icon m-2" href="{{ route('user.harta.formBprint', $listHarta->id) }}"><i class="fas fa-print"></i>Cetak</a>
                     </div>
                   </div>
                      <div class="card rounded-lg">

                          <div class="card-body">
                              <form action="" method="get">


                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{$listHarta ->formbs->name }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{$listHarta->kad_pengenalan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <b>{{$listHarta ->formbs->jawatan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <b>{{$listHarta ->jabatan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{$listHarta ->formbs->alamat_tempat_bertugas }}</b>
                                          </div>
                                      </div>
                                  </div>

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
                                                            {{$maklumat_pasangan->NOKNAME}}
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
                                            <div align="center">
                                                {{$listHarta->gaji }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ old('gaji_pasangan')}}"> -->
                                            {{ $listHarta ->gaji_pasangan }}
                                        </div>
                                      </div>
                                    </br>
                                    <!-- imbuhan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0" >
                                            <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div align="center">
                                                <!-- <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan')}}"> -->
                                                {{ $listHarta ->jumlah_imbuhan }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ old('jumlah_imbuhan_pasangan')}}"> -->
                                            {{ $listHarta ->jumlah_imbuhan_pasangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <!-- sewa -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> iii) Sewa Rumah/Kedai</p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div align="center">
                                                <!-- <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ old('sewa')}}"> -->
                                                {{ $listHarta ->sewa }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ old('sewa_pasangan')}}"> -->
                                            {{ $listHarta ->sewa_pasangan }}
                                        </div>
                                      </div>
                                      <!-- dividen -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> iv) Dividen</p>
                                        </div>
                                      </div>

                                      @foreach($listDividenB as $data)
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                                <!-- <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ old('dividen_1[]')}}"> -->
                                                {{ $data ->dividen_1 }}

                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">

                                                <!-- <input class="form-control bg-light" type="text" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{ old('dividen_1_pegawai[]')}}"> -->
                                                {{ $data ->dividen_1_pegawai }}

                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{ old('dividen_1_pasangan[]')}}"> -->
                                                {{ $data ->dividen_1_pasangan }}
                                        </div>
                                      </div>
                                    <br>
                                      @endforeach


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
                                        <div class="col-md-3" >
                                          <p>i) Jumlah Pinjaman Perumahan</p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" value="{{ old('pinjaman_perumahan_pegawai')}}"> -->
                                          {{ $listHarta ->pinjaman_perumahan_pegawai }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ old('bulanan_perumahan_pegawai')}}"> -->
                                          {{ $listHarta ->bulanan_perumahan_pegawai }}
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ old('pinjaman_perumahan_pasangan')}}"> -->
                                            {{ $listHarta ->pinjaman_perumahan_pasangan }}
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ old('bulanan_perumahan_pasangan')}}"> -->
                                            {{ $listHarta ->bulanan_perumahan_pasangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KENDERAAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>ii) Jumlah Pinjaman Kenderaan</p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ old('pinjaman_kenderaan_pegawai')}}"> -->
                                          {{ $listHarta ->pinjaman_kenderaan_pegawai }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ old('bulanan_kenderaan_pegawai')}}"> -->
                                          {{ $listHarta ->bulanan_kenderaan_pegawai }}
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ old('pinjaman_kenderaan_pasangan')}}"> -->
                                            {{ $listHarta ->pinjaman_kenderaan_pasangan }}
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ old('bulanan_kenderaan_pasangan')}}"> -->
                                            {{ $listHarta ->bulanan_kenderaan_pasangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <!--CUKAI PENDAPATAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iii) Cukai Pendapatan</p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" value="{{ old('jumlah_cukai_pegawai')}}"> -->
                                          {{ $listHarta ->jumlah_cukai_pegawai }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ old('bulanan_cukai_pegawai')}}"> -->
                                          {{ $listHarta ->bulanan_cukai_pegawai }}
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ old('jumlah_cukai_pasangan')}}"> -->
                                            {{ $listHarta ->jumlah_cukai_pasangan }}
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ old('bulanan_cukai_pasangan')}}"> -->
                                            {{ $listHarta ->bulanan_cukai_pasangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KOPERASI -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iv) Pinjaman Koperasi</p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_koperasi_pegawai" value="{{ old('jumlah_koperasi_pegawai')}}"> -->
                                          {{ $listHarta ->jumlah_koperasi_pegawai }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai" value="{{ old('bulanan_koperasi_pegawai')}}"> -->
                                          {{ $listHarta ->bulanan_koperasi_pegawai }}
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan" value="{{ old('jumlah_koperasi_pasangan')}}"> -->
                                            {{ $listHarta ->jumlah_koperasi_pasangan }}
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan" value="{{ old('bulanan_koperasi_pasangan')}}"> -->
                                            {{ $listHarta ->bulanan_koperasi_pasangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>v) Lain-Lain Pinjaman</p>
                                        </div>
                                      </div>

                                      @foreach($listPinjamanB as $datas)
                                      <div class="row">
                                        <div class="col-md-3">
                                          <!-- <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ old('lain_lain_pinjaman[]')}}"> -->
                                          {{ $datas ->lain_lain_pinjaman }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" value="{{ old('pinjaman_pegawai[]')}}"> -->
                                          {{ $datas ->pinjaman_pegawai }}
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ old('bulanan_pegawai[]')}}"> -->
                                          {{ $datas ->bulanan_pegawai }}
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{ old('pinjaman_pasangan[]')}}"> -->
                                            {{ $datas ->pinjaman_pasangan }}
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ old('bulanan_pasangan[]')}}"> -->
                                            {{ $datas ->bulanan_pasangan }}
                                        </div>

                                      </div>
                                      <br>
                                      @endforeach

                                      <!--JUMLAH PINJAMAN -->

                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-md-12">
                                            <table class="table table-bordered">
                                              <th width="5%">ID</th>
                                              <th width="5%">Jenis Harta</th>
                                              <th width="5%">Pemilik Harta</th>
                                              <th width="5%">Hubungan Pemilik</th>
                                              <th width="5%">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</th>
                                              <th width="5%">Tarikh Pemilikan Harta</th>
                                              <th width="5%">Bilangan / Ekar / kaki Persegi / Unit</th>
                                              <th width="5%">Nilai Perolehan Harta (RM)</th>
                                              <th width="5%">Cara Perolehan Harta</th>

                                              @foreach($hartaB as $data)
                                              <tr>
                                                <td>{{ $data ->id }}</td>
                                                <td>{{ $data ->jenis_harta }}</td>
                                                <td>{{ $data ->pemilik_harta }}</td>
                                                <td>{{ $data ->hubungan_pemilik }}</td>
                                                <td>{{ $data ->maklumat_harta }}</td>
                                                <td>{{ $data ->tarikh_pemilikan_harta }}</td>
                                                <td>{{ $data ->bilangan}}</td>
                                                <td>{{ $data ->nilai_perolehan}}</td>
                                                <td>{{ $data ->cara_perolehan}}</td>
                                              </tr>
                                              @endforeach
                                            </table>
                                          </div>
                                      </div>
                                      <br>
                                      @foreach($hartaB as $data)
                                        @if($data->cara_perolehan == "Dipusakai"||$data->cara_perolehan == "Dihadiahkan")
                                        <div class="row">
                                          <div class="col-md-4">
                                            <p>Dari Siapa Harta Diperolehi ({{$data->id}})</p>
                                          </div>
                                        <div class="col-md-4">
                                            {{ $data ->nama_pemilikan_asal }}
                                        </div>
                                      </div>
                                      <br>
                                      @elseif($data->cara_perolehan == "Lain-lain")
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Nyatakan lain lain ({{$data->id}})</p>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $data ->lain_lain }}
                                        </div>
                                      </div>
                                      <br>
                                      @elseif($data->cara_perolehan == "Dibeli")
                                          @if($data->cara_belian == "Pinjaman")
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya ({{$data->id}})</b></p>
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
                                                <!-- <input class="form-control bg-light" type="text" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman')}}"> -->
                                                {{ $data ->jumlah_pinjaman }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>ii)	Institusi memberi pinjaman</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="institusi_pinjaman" value="{{ old('institusi_pinjaman')}}"> -->
                                                {{ $data ->institusi_pinjaman }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>iii)	Tempoh bayaran balik</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="tempoh_bayar_balik" value="{{ old('tempoh_bayar_balik')}}"> -->
                                                {{ $data ->tempoh_bayar_balik }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>iv) Ansuran bulanan </p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="ansuran_bulanan" value="{{ old('ansuran_bulanan')}}"> -->
                                                {{ $data ->ansuran_bulanan }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>v)	Tarikh ansuran pertama</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="date" name="tarikh_ansuran_pertama" value="{{ old('tarikh_ansuran_pertama')}}"> -->
                                                {{ $data ->tarikh_ansuran_pertama }}
                                              </div>
                                            </div>
                                            <br>
                                            @else if($data->cara_belian == "Pelupusan")
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p><b>b) Hasil Pelupusan Harta, Nyatakan ({{$data->id}})</b></p>
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>i)	Jenis Harta</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="jenis_harta_pelupusan" value="{{ old('jenis_harta_pelupusan')}}"> -->
                                                {{ $data ->jenis_harta_pelupusan }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>ii) Alamat</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="alamat_asset" value="{{ old('alamat_asset')}}"> -->
                                                {{ $data ->alamat_asset }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>iii) No Pendaftaran Harta</p>
                                              </div>
                                              <div class="col-md-8">
                                                <!-- <input class="form-control bg-light" type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran')}}"> -->
                                                {{ $data ->no_pendaftaran }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>iv) Harga Jualan</p>
                                              </div>
                                              <div class="col-md-8">
                                                {{ $data ->harga_jualan }}
                                              </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <p>v)	Tarikh lupus</p>
                                              </div>
                                              <div class="col-md-8">
                                                {{ $data ->tarikh_lupus }}
                                              </div>
                                            </div>
                                            @endif
                                      @endif
                                      @endforeach
                                      <br>
                                      <br>
                                        <a class="btn btn-primary mt-4"href="{{url()->previous() }}">Kembali</a>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
