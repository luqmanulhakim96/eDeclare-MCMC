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
                              <form action="{{route('c.update', $info->id)}}" method="POST">
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
                                            {{Auth::user()->jabatan }}
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
                                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta_pelupusan" placeholder="Nama Pemilik Sebelum" value="{{ $info->pemilik_harta_pelupusan  }}" required>
                                      </div>
                                      <div class="col-md-4">
                                          <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik_pelupusan" value="{{ $info->hubungan_pemilik_pelupusan }}" required>
                                            <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                            <option value="Sendiri"  {{ $info->hubungan_pemilik_pelupusan == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                            <option value="Anak"  {{ $info->hubungan_pemilik_pelupusan == "Anak" ? 'selected' : '' }}>Anak</option>
                                            <option value="Isteri/Suami" {{ $info->hubungan_pemilik_pelupusan == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                            <option value="Ibu/Ayah"  {{ $info->hubungan_pemilik_pelupusan == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                            <option value="Lain-lain"  {{ $info->hubungan_pemilik_pelupusan == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
                                      </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Hubungan dengan Pemilik">
                                      </div> -->
                                  </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ $info->no_pendaftaran_harta  }}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan" value="{{ $info->tarikh_pemilikan  }}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pelupusan" value="{{ $info->tarikh_pelupusan  }}" required>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). Jika dijual, Nyatakan nilai jualan.</p>
                                      </div>
                                      <div class="col-md-4">
                                          <select id="cara_pelupusan" class="custom-select  bg-light" name="cara_pelupusan" value="{{ $info->cara_pelupusan  }}" required>
                                              <option value="" selected disabled hidden>Cara pelupusan</option>
                                              <option value="Dijual" {{ $info->cara_pelupusan == "Dijual" ? 'selected' : '' }}>Dijual</option>
                                              <option value="Dihadiahkan" {{ $info->cara_pelupusan == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                              <option value="Lain-lain" {{ $info->cara_pelupusan == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
                                      </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_pelupusan" placeholder="Cara Pelupusan" value="{{ session()->get('asset.cara_pelupusan') }}">
                                      </div> -->
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nilai_pelupusan" placeholder="Nilai Jualan" value="{{ $info->nilai_pelupusan  }}">
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
                                  <div class="hidden">
                                      <input class="form-control bg-light" type="text" name="status" value="{{ $info->status }}">
                                  </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                      <button type="submit" onclick=" return confirm('Hantar maklumat?');" class="btn btn-primary mt-4">Hantar</button>
                                      <!-- <button type="submit" class="btn btn-primary mt-4">Seterusnya</button> -->
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
          </div>
@endsection
