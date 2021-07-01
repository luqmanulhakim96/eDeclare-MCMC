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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lampiran</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ulasan</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="page-body p-4 text-dark">
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta ->formbs->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta->kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta ->jabatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta ->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>

                                  @if($maklumat_pasangan == null)
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
                                                {{number_format((float)$listHarta->gaji,2,'.','')}}
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
                                                <td>{{ $data ->bilangan}} {{ $data ->unit_bilangan}}</td>
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
                                    </div>
                                  </div>
                                   <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                     <div class="page-body p-4 text-dark">
                                       <div class="row">
                                         <div class="col-md-2">
                                             <p>Ulasan Admin</p>
                                          </div>
                                          <div class="col-md-8">
                                            <!-- <p>{{ $listHarta->ulasan_admin }} </p><p>( {{ $listHarta->nama_admin }} , {{ $listHarta->no_admin }} )</p><br> -->
                                            @foreach($ulasanAdmin as $data)
                                               @if($loop->last)
                                                 <p>{{ $data->ulasan_admin }} </p><p>( {{ $data->nama_admin }} , {{ $data->no_admin }} )</p><br>
                                               @endif
                                            @endforeach
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-2">
                                              <p>Ulasan Ketua Bahagian</p>
                                           </div>
                                           <div class="col-md-8">
                                             @if($ulasanHodiv ->isEmpty())
                                              Tiada
                                             @else
                                             @foreach($ulasanHodiv as $data)
                                                @if($loop->last)
                                                  <p>{{ $data->ulasan_hodiv }} </p><p>( {{ $data->nama_hodiv }} , {{ $data->no_hodiv }} )</p><br>
                                                @endif
                                             @endforeach
                                             @endif
                                           </div>
                                         </div>
                                       <form action="{{route('ulasanHODB.update', $listHarta->id)}}" method="post">
                                        @csrf
                                       <div class="row">
                                         <div class="col-md-2">
                                             <p>Nama</p>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control bg-light" name="nama_hod" value="{{Auth::user()->name }}" readonly><br>
                                          </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                              <p>No Staff</p>
                                            </div>
                                            <div class="col-md-8">
                                              @foreach($staffinfo as $ic)
                                                <input type="text" class="form-control bg-light" name="no_hod" value="{{$ic->STAFFNO}}" readonly><br>
                                              @endforeach
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                              <p>No Kad Pengenalan</p>
                                            </div>
                                            <div class="col-md-8">
                                              @foreach($staffinfo as $ic)
                                                <input type="text" class="form-control bg-light" name="kad_pengenalan" value="{{$ic->ICNUMBER}}" readonly><br>
                                              @endforeach
                                             </div>
                                        </div>
                                            <div class="row">
                                              <div class="col-md-2">
                                                <p>Ulasan Ketua Jabatan Integriti</p>
                                              </div>
                                                <div class="col-md-8">
                                                     <textarea maxlength="100" class="form-control bg-light" name="ulasan_hod" rows="4" cols="50" placeholder="Ulasan Ketua Jabatan Integriti"></textarea><br>

                                                     <input type="radio" id="diterima" name="status" value="Diterima">
                                                         <label for="Diterima">Diterima</label><br>
                                                     <input type="radio" id="tidak_diterima" name="status" value="Tidak Lengkap">
                                                         <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                                                      @if($listHarta->ulasan_hodiv == NULL)
                                                     <input type="radio" id="tidak_diterima" name="status" value="Proses ke Ketua Bahagian">
                                                         <label for="Proses ke Ketua Bahagian">Proses ke Ketua Bahagian</label><br>
                                                      @endif
                                                      @if($listHarta->ulasan_hodiv != NULL)
                                                     <input type="radio" id="tidak_diterima" name="status" value="Untuk Tindakan Jawatankuasa Tatatertib">
                                                         <label for="Untuk Tindakan Jawatankuasa Tatatertib">Untuk Tindakan Jawatankuasa Tatatertib</label><br>
                                                      @endif
                                                         <br>
                                                       <!-- button -->
                                                       <div class="col-md-2">
                                                         <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
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
                                                               <p align="center">Hantar untuk pengesahan?</p>
                                                               </div>
                                                               <div class="modal-footer">
                                                               <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                                               <button type="submit" class="btn btn-danger" name="publish">Ya</button>
                                                               </div>
                                                           </div>
                                                           </div>
                                                       </div>
                                                </div>
                                              </div>
                                              <br><br>
                                              <div class="row">
                                                @if($ulasanAdmin)
                                                    <div class="col-md-2">
                                                        <p>Sejarah Ulasan Admin</p>
                                                     </div>
                                                      @foreach($ulasanAdmin as $data)
                                                       <div class="col-md-3">
                                                        @if(!$loop->last)
                                                          <p>- {{ $data->ulasan_admin }} </p><p>( {{ $data->nama_admin }} , {{ $data->no_admin }} )</p><br>
                                                        @endif
                                                        </div>
                                                      @endforeach
                                                @endif
                                              </div>
                                              <hr>
                                              <div class="row">
                                                     @if($ulasanHOD)
                                                       <div class="col-md-2">
                                                           <p>Sejarah Ulasan HOD</p>
                                                        </div>
                                                          @foreach($ulasanHOD as $data)
                                                          <div class="col-md-3">
                                                            <p>- {{ $data->ulasan_hod }} </p>
                                                            <p>( {{ $data->nama_hod }} , {{ $data->no_hod }} )</p>
                                                          </div>
                                                          @endforeach
                                                    @endif
                                              </div>
                                          </form>
                                        </div>
                                     </div>
                               </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<br><br><br><br>
@endsection
