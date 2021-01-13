@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran C: Borang Pelupusan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                   <div class="row">
                   <div class="col-md-10"></div>
                     <div class="col-md-2" align="right">
                       <a class="btn btn-primary btn-icon m-2" href="{{ route('user.harta.formCprint', $listHarta->id) }}"><i class="fas fa-print"></i>Cetak</a>
                     </div>
                   </div>
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('c.submit')}}" method="POST">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                                {{$listHarta->nama_pegawai }}
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
                                            {{$listHarta->jabatan }}
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
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p><b>2. KETERANGAN MENGENAI PELUPUSAN HARTA</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="jenis_harta_lupus" value="{{ old('jenis_harta_lupus')}}"> -->
                                        {{ $listHarta ->jenis_harta_lupus }}
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Pemilik Harta </p>
                                      </div>
                                      <div class="col-md-4">
                                          <!-- <input class="form-control bg-light" type="text" name="pemilik_harta_pelupusan" placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta_pelupusan')}}"> -->
                                          {{ $listHarta ->pemilik_harta_pelupusan }}
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                      <div class="col-md-4">
                                          <!-- <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik_pelupusan" value="{{ old('hubungan_pemilik_pelupusan')}}">
                                            <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                            <option value="Sendiri" {{ old('hubungan_pemilik_pelupusan') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                            <option value="Anak" {{ old('hubungan_pemilik_pelupusan') == "Anak" ? 'selected' : '' }}>Anak</option>
                                            <option value="Isteri/Suami" {{ old('hubungan_pemilik_pelupusan') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                            <option value="Ibu/Ayah" {{ old('hubungan_pemilik_pelupusan') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                            <option value="Lain-lain" {{ old('hubungan_pemilik_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select> -->
                                          {{ $listHarta ->hubungan_pemilik_pelupusan }}
                                      </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Hubungan dengan Pemilik">
                                      </div> -->
                                  </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('no_pendaftaran_harta')}}"> -->
                                          {{ $listHarta ->no_pendaftaran_harta }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="date" name="tarikh_pemilikan" value="{{ old('tarikh_pemilikan')}}"> -->
                                          {{ $listHarta ->tarikh_pemilikan }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="date" name="tarikh_pelupusan" value="{{ old('tarikh_pelupusan')}}"> -->
                                          {{ $listHarta ->tarikh_pelupusan }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). </p>
                                      </div>
                                      <div class="col-md-4">
                                          <!-- <select id="cara_pelupusan" class="custom-select  bg-light" name="cara_pelupusan" value="{{ old('cara_pelupusan')}}">
                                              <option value="" selected disabled hidden>Cara pelupusan</option>
                                              <option value="Dijual" {{ old('cara_pelupusan') == "Dijual" ? 'selected' : '' }}>Dijual</option>
                                              <option value="Dihadiahkan" {{ old('cara_pelupusan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                              <option value="Lain-lain" {{ old('cara_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select> -->
                                          {{ $listHarta ->cara_pelupusan }}
                                      </div>
                                    </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_pelupusan" placeholder="Cara Pelupusan" value="{{ session()->get('asset.cara_pelupusan') }}">
                                      </div> -->
                                      <div class="row">
                                        <div class="col-md-4">
                                            <p>Jika dijual, Nyatakan nilai jualan.</p>
                                        </div>
                                      <div class="col-md-4">
                                          <!-- <input class="form-control bg-light" type="text" name="nilai_pelupusan" placeholder="Nilai Jualan" value="{{ old('nilai_pelupusan')}}"> -->
                                          {{ $listHarta ->nilai_pelupusan }}
                                      </div>

                                  </div>
                                  <br>
                                  <!-- <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="pengakuan" value="pengakuan pegawai">
                                        <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang ini adalah lengkap dan benar.</label><br>
                                    </div>
                                  </div> -->
                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-2">
                                      <!-- <a class="btn btn-primary mt-4"href=#>Kembali</a> -->
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4"href="{{url()->previous() }}">Kembali</a>
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
