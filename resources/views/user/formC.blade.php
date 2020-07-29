@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran C: Borang Pelupusan Harta</h5>
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
                              <form action="{{route('asset.post2')}}" method="POST">
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
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <input class="form-control bg-light" type="text" name="jenis_harta_lupus" value="{{ session()->get('asset.jenis_harta_lupus') }}">
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta_pelupusan" placeholder="Nama Pemilik Sebelum" value="{{ session()->get('asset.pemilik_harta_pelupusan') }}">
                                      </div>
                                      <div class="col-md-4">
                                          <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik_pelupusan" value="{{ session()->get('asset.hubungan_pemilik_pelupusan') }}">
                                            <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                            <option value="Sendiri" {{ old('hubungan_pemilik_pelupusan') == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                            <option value="Anak" {{ old('hubungan_pemilik_pelupusan') == "Anak" ? 'selected' : '' }}>Anak</option>
                                            <option value="Isteri/Suami" {{ old('hubungan_pemilik_pelupusan') == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                            <option value="Ibu/Ayah" {{ old('hubungan_pemilik_pelupusan') == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                            <option value="Lain-lain" {{ old('hubungan_pemilik_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
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
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ session()->get('asset.no_pendaftaran_harta') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan" value="{{ session()->get('asset.tarikh_pemilikan') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pelupusan" value="{{ session()->get('asset.tarikh_pelupusan') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). Jika dijual, Nyatakan nilai jualan.</p>
                                      </div>
                                      <div class="col-md-4">
                                          <select id="cara_pelupusan" class="custom-select  bg-light" name="cara_pelupusan" value="{{ session()->get('asset.cara_pelupusan') }}">
                                              <option value="" selected disabled hidden>Cara pelupusan</option>
                                              <option value="Dijual" {{ old('cara_pelupusan') == "Dijual" ? 'selected' : '' }}>Dijual</option>
                                              <option value="Dihadiahkan" {{ old('cara_pelupusan') == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                              <option value="Lain-lain" {{ old('cara_pelupusan') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
                                      </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_pelupusan" placeholder="Cara Pelupusan" value="{{ session()->get('asset.cara_pelupusan') }}">
                                      </div> -->
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nilai_pelupusan" placeholder="Nilai Jualan" value="{{ session()->get('asset.nilai_pelupusan') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="pengakuan" value="pengakuan_pegawai">
                                        <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang ini adalah lengkap dan benar.</label><br>
                                    </div>
                                  </div>
                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4"href="{{ route('user.formB') }}">Kembali</a>
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                      <button type="submit" class="btn btn-primary mt-4">Seterusnya</button>
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Seterusnya</button> -->
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection