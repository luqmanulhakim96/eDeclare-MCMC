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
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta ->nama_pegawai }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta ->kad_pengenalan }}
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
                                          <p>Tarikh Lantikan Ke Perkhidmatan Sekarang</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <!-- <input type="date" class="form-control bg-light" name="tarikh_lantikan" placeholder="Tarikh Lantikan Ke Perkhidmatan Sekarang" value="{{ old('tarikh_lantikan')}}"> -->
                                              {{ $listHarta ->tarikh_lantikan }}
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <!-- <input type="text" class="form-control bg-light" name="gelaran" placeholder="Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan" value="{{ old('gelaran')}}"> -->
                                              {{ $listHarta ->gelaran }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
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
                                        <div class="col-md-4" align="center">

                                          {{ $listHarta ->gaji }}

                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ old('gaji_pasangan')}}"> -->
                                            {{ $listHarta ->gaji_pasangan }}
                                        </div>
                                      </div>
                                    </br>
                                    <!-- imbuhan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">

                                              <!-- <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan')}}"> -->
                                              {{ $listHarta ->jumlah_imbuhan }}

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
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">

                                              <!-- <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ old('sewa')}}"> -->
                                              {{ $listHarta ->sewa }}

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

                                      @foreach($listDividenG as $data)
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0" >
                                            <div class="input-group">
                                              <!-- <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{ old('dividen_1[]')}}"> -->
                                              {{ $data ->dividen_1 }}
                                            </div>
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

                                      <!-- jumlah pendapatan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                          <b>{{ $listHarta ->pendapatan_pegawai }}</b>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ old('pendapatan_pasangan')}}"> -->
                                          <b>{{ $listHarta ->pendapatan_pasangan }}</b>
                                        </div>
                                      </div>
                                      <br>

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
                                      <!--PINJAMAN PERUMAHAN -->
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
                                      <!--LAIN2 PINJAMAN -->
                                      <input type="hidden" name="counter" value="0" id="counter">

                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>v) Lain-Lain Pinjaman</p>
                                        </div>
                                      </div>

                                      @foreach($listPinjamanG as $datas)
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
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai" value="{{ old('jumlah_pinjaman_pegawai')}}"> -->
                                          {{ $listHarta ->jumlah_pinjaman_pegawai }}

                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai" value="{{ old('jumlah_pinjaman_pegawai')}}"> -->
                                          {{ $listHarta ->jumlah_bulanan_pegawai }}

                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan" value="{{ old('jumlah_pinjaman_pegawai')}}"> -->
                                            {{ $listHarta ->jumlah_pinjaman_pasangan }}

                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" value="{{ old('jumlah_pinjaman_pegawai')}}"> -->
                                            {{ $listHarta ->jumlah_bulanan_pasangan }}

                                        </div>
                                      </div>
                                      <br>
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
                                                  <!-- <input type="text" class="form-control bg-light"name="luas_pertanian" placeholder="Luas" value="{{ old('luas_pertanian')}}"> -->
                                                  {{ $listHarta ->luas_pertanian }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light"name="lot_pertanian" placeholder="No. Lot" value="{{ old('lot_pertanian')}}"> -->
                                                  {{ $listHarta ->lot_pertanian }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="mukim_pertanian" placeholder="Mukim" value="{{ old('mukim_pertanian')}}"> -->
                                                  {{ $listHarta ->mukim_pertanian }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="negeri_pertanian" placeholder="Negeri" value="{{ old('negeri_pertanian')}}"> -->
                                                  {{ $listHarta ->negeri_pertanian }}

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
                                                  <!-- <input type="text" class="form-control bg-light" name="luas_perumahan"placeholder="Luas" value="{{ old('luas_perumahan')}}"> -->
                                                  {{ $listHarta ->luas_perumahan }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="lot_perumahan" placeholder="No. Lot" value="{{ old('lot_perumahan')}}"> -->
                                                  {{ $listHarta ->lot_perumahan }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="mukim_perumahan" placeholder="Mukim" value="{{ old('mukim_perumahan')}}"> -->
                                                  {{ $listHarta ->mukim_perumahan }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="negeri_perumahan" placeholder="Negeri" value="{{ old('negeri_perumahan')}}"> -->
                                                  {{ $listHarta ->negeri_perumahan }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Tarikh Diperolehi</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="date" class="form-control bg-light" name="tarikh_diperolehi" placeholder="Luas" value="{{ old('tarikh_diperolehi')}}"> -->
                                                  {{ $listHarta ->tarikh_diperolehi }}

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
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="luas" placeholder="Luas" value="{{ old('luas')}}"> -->
                                                  {{ $listHarta ->luas }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="lot" placeholder="No. Lot" value="{{ old('lot')}}"> -->
                                                  {{ $listHarta ->lot }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="mukim" placeholder="Mukim" value="{{ old('mukim')}}"> -->
                                                  {{ $listHarta ->mukim }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <!-- <input type="text" class="form-control bg-light" name="negeri" placeholder="Negeri" value="{{ old('negeri')}}"> -->
                                                  {{ $listHarta ->negeri }}

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Jenis Tanah</p>
                                          </div>
                                          <div class="col-md-8">
                                            <!-- <input type="radio" id="pertanian" name="jenis_tanah" value="pertanian" {{ old('jenis_tanah') == "pertanian" ? 'selected' : '' }}>
                                                <label for="pertanian">Tanah Pertanian</label><br>
                                            <input type="radio" id="perumahan" name="jenis_tanah" value="perumahan" {{ old('jenis_tanah') == "perumahan" ? 'selected' : '' }}>
                                                <label for="perumahan">Tanah Perumahan</label><br> -->
                                                {{ $listHarta ->jenis_tanah }}

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
                                          <p>Nama Syarikat</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control bg-light" name="nama_syarikat" placeholder="Nama Syarikat" value="{{ old('nama_syarikat')}}"> -->
                                                {{ $listHarta ->nama_syarikat }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Modal Berbayar (Paid Up Capital)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control bg-light" name="modal_berbayar" placeholder="Modal Berbayar (Paid Up Capital)" value="{{ old('modal_berbayar')}}"> -->
                                                {{ $listHarta ->modal_berbayar }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Jumlah Unit Nilai Saham Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-bg-light" name="jumlah_unit_saham" placeholder="Jumlah Unit" value="{{ old('jumlah_unit_saham')}}"> -->
                                                {{ $listHarta ->jumlah_unit_saham }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Nilai Saham</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control bg-light" name="nilai_saham" placeholder="Nilai Saham" value="{{ old('nilai_saham')}}"> -->
                                                {{ $listHarta ->nilai_saham }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control bg-light" name="sumber_kewangan" placeholder="Sumber Kewangan" value="{{ old('sumber_kewangan')}}"> -->
                                                {{ $listHarta ->sumber_kewangan }}

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

                                  @foreach($listPinjaman as $data1)
                                    <div class="row">
                                      <div class="col-md-2">
                                        <!-- <input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi" value="{{ old('institusi[]')}}"> -->
                                        {{ $data1 ->institusi }}
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <input type="text" class="form-control bg-light" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ old('alamat_institusi[]')}}"> -->
                                        {{ $data1 ->alamat_institusi }}
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <input type="text" class="form-control bg-light" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ old('ansuran_bulanan[]')}}"> -->
                                        {{ $data1 ->ansuran_bulanan }}
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <input type="date" class="form-control bg-light" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ old('tarikh_ansuran[]')}}"> -->
                                        {{ $data1 ->tarikh_ansuran }}
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <input type="text" class="form-control bg-light" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ old('tempoh_pinjaman[]')}}"> -->
                                        {{ $data1 ->tempoh_pinjaman }}
                                      </div>

                                    </div>
                                    <br>
                                    @endforeach

                                    <br>
                                  </div>
                                  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="page-body p-4 text-dark">
                                      <div class="row">
                                        <div class="col-md-2">
                                            <p>Ulasan Admin</p>
                                         </div>
                                         <div class="col-md-8">
                                           <p>{{ $listHarta->ulasan_admin }} </p><p>( {{ $listHarta->nama_admin }} , {{ $listHarta->no_admin }} )</p><br>
                                         </div>
                                       </div>
                                       <div class="row">
                                         <div class="col-md-2">
                                             <p>Ulasan Ketua Jabatan Integriti</p>
                                          </div>
                                          <div class="col-md-8">
                                            <p>{{ $listHarta->ulasan_hod}} </p><p>( {{ $listHarta->nama_hod }} , {{ $listHarta->no_hod }} )</p><br>
                                          </div>
                                        </div>
                                      <form action="{{route('ulasanHODivG.update', $listHarta->id)}}" method="post">
                                       @csrf
                                      <div class="row">
                                        <div class="col-md-2">
                                            <p>Nama</p>
                                         </div>
                                         <div class="col-md-8">
                                           <input type="text" class="form-control bg-light" name="nama_hodiv" value="{{Auth::user()->name }}" readonly><br>
                                         </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-2">
                                             <p>No Staff</p>
                                           </div>
                                           <div class="col-md-8">
                                             @foreach($staffinfo as $ic)
                                               <input type="text" class="form-control bg-light" name="no_hodiv" value="{{$ic->STAFFNO}}" readonly><br>
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
                                               <p>Ulasan Ketua Bahagian</p>
                                             </div>
                                               <div class="col-md-8">
                                                    <textarea class="form-control bg-light" name="ulasan_hodiv" rows="4" cols="50" placeholder="Ulasan Ketua Bahagian"></textarea><br>


                                                    <input type="radio" id="diterima" name="status" value="Proses ke Ketua Jabatan Integriti">
                                                        <label for="Proses ke Ketua Jabatan Integriti">Proses ke Ketua Jabatan Integriti</label><br>

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
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                              <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                              </div>
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
               </div>
           </div>
         </div>
     </div>


@endsection
