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
                                            @foreach($staffinfo as $jabatan)
                                              <input type="hidden" name="jabatan" value="{{$jabatan->OLEVEL4NAME}}">{{$jabatan->OLEVEL4NAME}}
                                            @endforeach
                                            <!-- <input type="hidden" name="jabatan" value="{{Auth::user()->jabatan }}">{{Auth::user()->jabatan }} -->
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
                                        <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta_lupus" value="$info->jenis_harta_lupus" required>
                                            <option value="" selected disabled hidden>Jenis Harta</option>

                                            @foreach($jenisHarta as $jenisharta)
                                            @if($jenisharta->status_jenis_harta == "Aktif")
                                            <option value="{{$jenisharta->jenis_harta}}" {{ $info->jenis_harta_lupus =="$jenisharta->jenis_harta" ? 'selected' :'' }}>{{$jenisharta->jenis_harta}}</option>
                                            @endif
                                            @endforeach

                                            </select>
                                            @error('jenis_harta_lupus')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                      </div>
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta_pelupusan" placeholder="Nama Pemilik Sebelum" value="{{ $info->pemilik_harta_pelupusan  }}" required>
                                          @error('pemilik_harta_pelupusan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
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
                                      @error('hubungan_pemilik_pelupusan')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
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
                                          @error('no_pendaftaran_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" id="datefield" type="date" name="tarikh_pemilikan" value="{{ $info->tarikh_pemilikan  }}" required>
                                          @error('tarikh_pemilikan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" id="datefield1" type="date" name="tarikh_pelupusan" value="{{ $info->tarikh_pelupusan  }}" required>
                                          @error('tarikh_pelupusan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
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
                                          @error('cara_pelupusan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                      <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_pelupusan" placeholder="Cara Pelupusan" value="{{ session()->get('asset.cara_pelupusan') }}">
                                      </div> -->
                                      <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nilai_pelupusan" placeholder="Nilai Jualan" value="{{ $info->nilai_pelupusan  }}">
                                          @error('nilai_pelupusan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                  </div>
                                </div>
                            </div>
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
                                  <div class="row">
                                    <div class="col-md-10">
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#save" >Simpan</button> -->
                                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
                                        </div>
                                            <!-- <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            </div> -->

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
                                  </div>

                              </form>

          </div>
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
@endsection
