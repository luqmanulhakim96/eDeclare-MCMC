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
                                              <b>{{Auth::user()->name }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->kad_pengenalan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <b>{{Auth::user()->jawatan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->alamat_tempat_bertugas }}</b>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- keluarga -->
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
                                              <b>{{Auth::user()->nama_pasangan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>No.Kad Pengenalan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->kad_pengenalan_pasangan }}</b>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Pekerjaan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <b>{{Auth::user()->pekerjaan_pasangan }}</b>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <b>{{Auth::user()->nama_anak }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Umur Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <b>{{Auth::user()->umur_anak }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{Auth::user()->no_kad_pengenalan_anak }}
                                            </div>
                                        </div>
                                      </div>
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
                                                {{Auth::user()->gaji }}
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

                                      <!-- jumlah pendapatan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div align="center">
                                                <!-- <input class="form-control bg-light" type="text" name="pendapatan_pegawai" value="{{ old('pendapatan_pegawai')}}"> -->
                                                {{ $listHarta ->pendapatan_pegawai }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ old('pendapatan_pasangan')}}"> -->
                                            {{ $listHarta ->pendapatan_pasangan }}
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
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai"> -->
                                          <b>{{ $listHarta ->jumlah_pinjaman_pegawai }}</b>
                                        </div>
                                        <div class="col-md-2" align="center">
                                          <!-- <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai"> -->
                                          <b>{{ $listHarta ->jumlah_bulanan_pegawai }}</b>
                                        </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan"> -->
                                            <b>{{ $listHarta ->jumlah_pinjaman_pasangan }}</b>
                                          </div>
                                          <div class="col-md-2" align="center">
                                            <!-- <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" required> -->
                                            <b>{{ $listHarta ->jumlah_bulanan_pasangan }}</b>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Jenis Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="jenis_harta"  placeholder="Jenis Harta"  value="{{ old('jenis_harta')}}" required> -->
                                          {{ $listHarta ->jenis_harta }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-4">
                                          <!-- <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta')}}"> -->
                                          {{ $listHarta ->pemilik_harta }}
                                        </div>
                                        <div class="col-md-4">
                                            {{ $listHarta ->hubungan_pemilik }}
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('maklumat_harta')}}"> -->
                                          {{ $listHarta ->maklumat_harta }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="date" name="tarikh_pemilikan_harta" value="{{ old('tarikh_pemilikan_harta')}}"> -->
                                          {{ $listHarta ->tarikh_pemilikan_harta }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="bilangan" placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ old('bilangan')}}"> -->
                                          {{ $listHarta ->bilangan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Nilai Perolehan Harta (RM)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="nilai_perolehan" placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan')}}"> -->
                                          {{ $listHarta ->nilai_perolehan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Cara Dan Dari Siapa Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                                        </div>
                                        <div class="col-md-4">
                                            {{ $listHarta ->cara_perolehan }}
                                        </div>
                                        <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_perolehan" value="{{ session()->get('asset.cara_perolehan') }}">
                                        </div> -->
                                        <div class="col-md-4">
                                          <!-- <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ old('nama_pemilikan_asal')}}"> -->
                                            {{ $listHarta ->nama_pemilikan_asal }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya</b></p>
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
                                          {{ $listHarta ->jumlah_pinjaman }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii)	Institusi memberi pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="institusi_pinjaman" value="{{ old('institusi_pinjaman')}}"> -->
                                          {{ $listHarta ->institusi_pinjaman }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii)	Tempoh bayaran balik</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="tempoh_bayar_balik" value="{{ old('tempoh_bayar_balik')}}"> -->
                                          {{ $listHarta ->tempoh_bayar_balik }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Ansuran bulanan </p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="ansuran_bulanan" value="{{ old('ansuran_bulanan')}}"> -->
                                          {{ $listHarta ->ansuran_bulanan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh ansuran pertama</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="date" name="tarikh_ansuran_pertama" value="{{ old('tarikh_ansuran_pertama')}}"> -->
                                          {{ $listHarta ->tarikh_ansuran_pertama }}
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
                                          <!-- <input class="form-control bg-light" type="text" name="jenis_harta_pelupusan" value="{{ old('jenis_harta_pelupusan')}}"> -->
                                          {{ $listHarta ->jenis_harta_pelupusan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii) Alamat</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="alamat_asset" value="{{ old('alamat_asset')}}"> -->
                                          {{ $listHarta ->alamat_asset }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii) No Pendaftaran Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="no_pendaftaran" value="{{ old('no_pendaftaran')}}"> -->
                                          {{ $listHarta ->no_pendaftaran }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Harga Jualan</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="harga_jualan" value="{{ old('harga_jualan')}}"> -->
                                          {{ $listHarta ->harga_jualan }}
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh lupus</p>
                                        </div>
                                        <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="date" name="tarikh_lupus" value="{{ old('tarikh_lupus')}}"> -->
                                          {{ $listHarta ->tarikh_lupus }}
                                        </div>
                                      </div>
                                    </div>
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
                                          <form action="{{route('ulasanHODivB.update', $listHarta->id)}}" method="post">
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
                                                 <p>No Kad Pengenalan</p>
                                               </div>
                                               <div class="col-md-8">
                                                 <input type="text" class="form-control bg-light" name="no_hodiv" value="{{Auth::user()->kad_pengenalan }}" readonly><br>
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
                                                        <div>
                                                          <button type="submit" onclick=" return confirm('Hantar Ulasan?');" class="btn btn-primary mt-4">Hantar</button>
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
@endsection
