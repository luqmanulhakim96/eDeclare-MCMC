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
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p><b>2. KETERANGAN MENGENAI PELUPUSAN HARTA</b></p>
                                      </div>
                                  </div>
                                  <!-- <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_harta_lupus" value="{{ old('jenis_harta_lupus')}}" required>
                                      </div>
                                  </div> -->
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta_lupus" value="{{ old('jenis_harta_lupus')}}" required>
                                            <option value="" selected disabled hidden>Jenis Harta</option>

                                            @foreach($jenisHarta as $jenisharta)
                                            @if($jenisharta->status_jenis_harta == "Aktif")
                                            <option value="{{$jenisharta->jenis_harta}}">{{$jenisharta->jenis_harta}}</option>
                                            @endif
                                            @endforeach

                                            </select>
                                      </div>
                                  </div>

                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Pemilik Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta_pelupusan" placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta_pelupusan')}}" required>
                                      </div>
                                    </div>
                                    <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <p class="required">Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik_pelupusan" value="{{ old('hubungan_pemilik_pelupusan')}}" required>
                                              <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                              <option value="Sendiri" {{ old('hubungan_pemilik_pelupusan') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                              <option value="Anak" {{ old('hubungan_pemilik_pelupusan') == "Anak" ? 'selected' : '' }}>Anak</option>
                                              <option value="Isteri/Suami" {{ old('hubungan_pemilik_pelupusan') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                              <option value="Ibu/Ayah" {{ old('hubungan_pemilik_pelupusan') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                              <option value="Lain-lain" {{ old('hubungan_pemilik_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                      </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('no_pendaftaran_harta')}}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan" value="{{ old('tarikh_pemilikan')}}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pelupusan" value="{{ old('tarikh_pelupusan')}}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). Jika dijual, Nyatakan nilai jualan.</p>
                                      </div>
                                      <div class="col-md-4">
                                          <select id="cara_pelupusan" class="custom-select  bg-light" name="cara_pelupusan" value="{{ old('cara_pelupusan')}}" required>
                                              <option value="" selected disabled hidden>Cara pelupusan</option>
                                              <option value="Dijual" {{ old('cara_pelupusan') == "Dijual" ? 'selected' : '' }}>Dijual</option>
                                              <option value="Dihadiahkan" {{ old('cara_pelupusan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                              <option value="Lain-lain" {{ old('cara_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nilai_pelupusan" placeholder="Nilai Jualan" value="{{ old('nilai_pelupusan')}}">
                                      </div>
                                  </div>
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
                                    <div class="col-md-2">
                                      <!-- <a class="btn btn-primary mt-4"href=#>Kembali</a> -->
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                    </div>
                                    <div class="col-md-7">
                                    </div>
                                    <div class="col-md-3">
                                      <button type="submit" onclick=" return confirm('Simpan maklumat?');" class="btn btn-primary mt-4" name="save">Simpan</button>

                                      <button type="submit" onclick=" return confirm('Hantar maklumat?');" class="btn btn-primary mt-4" name="publish">Hantar</button>
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
         </div>
     </div>
@endsection
