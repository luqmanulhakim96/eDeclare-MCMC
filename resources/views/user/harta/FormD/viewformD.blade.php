@extends('user.layouts.app')
@section('content')
          <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran D: Perisytiharan Syarikat dan Perniagaan Sendiri</h5>
               </div>


             <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form>

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
                                      <div class="col-md-6">
                                        <p><b>2. KETERANGAN MENGENAI SYARIKAT / PERNIAGAAN</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>i) Nama Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="nama_syarikat" placeholder="Nama Syarikat/Perniagaan" value="{{ old('nama_syarikat')}}"> -->
                                        {{ $listHarta ->nama_syarikat }}
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) No. Pendaftaran</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="no_pendaftaran_syarikat" placeholder="No Pendaftaran Syarikat/Perniagaan" value="{{ old('no_pendaftaran_syarikat')}}"> -->
                                          {{ $listHarta ->no_pendaftaran_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Alamat Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="alamat_syarikat" placeholder="Alamat Syarikat / Perniagaan" value="{{ old('alamat_syarikat')}}"> -->
                                          {{ $listHarta ->alamat_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Jenis Syarikat / Perniagaan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="jenis_syarikat" placeholder="Jenis Syarikat / Perniagaan" value="{{ old('jenis_syarikat')}}"> -->
                                        {{ $listHarta ->jenis_syarikat }}
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Pulangan Perniagaan Tahunan</p>
                                    </div>
                                    <div class="col-md-8">
                                       <!-- <input class="form-control bg-light" type="text" name="pulangan_tahunan" placeholder="Pulangan Perniagaan Tahunan" value="{{ old('pulangan_tahunan')}}"> -->
                                       {{ $listHarta ->pulangan_tahunan }}
                                    </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi) Modal Dibenarkan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="modal_syarikat" placeholder="Modal Dibenarkan" value="{{ old('modal_syarikat')}}"> -->
                                        {{ $listHarta ->modal_syarikat }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                      <p>vii) Modal Berbayar (Paid Up Capital)</p>
                                  </div>
                                  <div class="col-md-8">
                                      <!-- <input class="form-control bg-light" type="text" name="modal_dibayar" placeholder="Modal Dibayar" value="{{ old('modal_dibayar')}}"> -->
                                      {{ $listHarta ->modal_dibayar }}
                                  </div>
                               </div>
                               <br>
                               <div class="row">
                                 <div class="col-md-4">
                                     <p>viii) Punca Kewangan Syarikat / Perniagaan</p>
                                 </div>
                                 <div class="col-md-8">
                                     <!-- <input class="form-control bg-light" type="text" name="punca_kewangan" placeholder="Punca Kewangan Syarikat / Perniagaan"  value="{{ old('punca_kewangan')}}"> -->
                                     {{ $listHarta ->punca_kewangan }}
                                 </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-6">
                                    <p>ix) Nama ahli keluarga yang terlibat dalam perniagaan / syarikat</p>
                                </div>
                              </div>
                              <br>
                              <!-- <input type="hidden" name="counter" value="0" id="counter"> -->

                                <div class="row">
                                   <div class="col-md-2">
                                       <p><b>Nama</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Hubungan</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Jawatan dalam syarikat</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Jumlah saham dipegang (unit)</b></p>
                                   </div>
                                   <div class="col-md-2">
                                       <p><b>Nilai saham</b></p>
                                   </div>
                                </div>

                                <!-- <div class="table_keluarga"> -->
                                @foreach($listKeluarga as $data)
                                <div class="row">
                                   <div class="col-md-2">
                                       <!-- <input class="form-control bg-light" type="text" name="nama_ahli[]" value="{{ old('nama_ahli[]')}}"> -->
                                       {{ $data ->nama_ahli }}
                                   </div>
                                   <div class="col-md-2">
                                     <!-- <div class="dropdown-example d-flex justify-content-betwen">

                                     <div class="dropdown">
                                            <select id="select-1" class="custom-select  bg-light" name="hubungan[]"  value="{{ old('hubungan[]')}}">
                                                <option value="" selected disabled hidden>Pilih Hubungan</option>
                                                <option value="Isteri" {{ old('hubungan[]') == "Isteri" ? 'selected' : '' }}>Isteri</option>
                                                <option value="Suami" {{ old('hubungan[]') == "Suami" ? 'selected' : '' }}>Suami</option>
                                                <option value="Anak" {{ old('hubungan[]') == "Anak" ? 'selected' : '' }}>Anak</option>
                                                <option value="Lain-lain" {{ old('hubungan[]') == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>

                                    </div>
                                   </div> -->
                                   {{ $data ->hubungan }}
                                   </div>
                                   <div class="col-md-2">
                                     <!-- <div class="dropdown-example d-flex justify-content-betwen">

                                     <div class="dropdown">
                                          <select id="select-1" class="custom-select  bg-light" name="jawatan_syarikat[]"  value="{{ old('jawatan_syarikat[]')}}">
                                              <option value="" selected disabled hidden>Pilih Jawatan</option>
                                              <option value="Pemilik Saham" {{ old('jawatan_syarikat[]') == "Pemilik Saham" ? 'selected' : '' }}>Pemilik Saham</option>
                                              <option value="Pengarah/ Lembaga Pengarah" {{ old('jawatan_syarikat[]') == "Pengarah/ Lembaga Pengarah" ? 'selected' : '' }}>Pengarah/ Lembaga Pengarah</option>
                                          </select>

                                    </div>
                                   </div> -->
                                   {{ $data ->jawatan_syarikat }}
                                   </div>
                                   <div class="col-md-2">
                                       <!-- <input class="form-control bg-light" type="text" name="jumlah_saham[]"value="{{ old('jumlah_saham[]')}}"> -->
                                       {{ $data ->jumlah_saham }}
                                   </div>
                                   <div class="col-md-2">
                                       <!-- <input class="form-control bg-light" type="text" name="nilai_saham[]" value="{{ old('nilai_saham[]')}}"> -->
                                       {{ $data ->nilai_saham }}
                                   </div>

                                   </div>
                                   <br>
                                   @endforeach
                              </div>

                                  <!-- button -->
                                 <div class="row">
                                  <div class="col-md-2">
                                    <!-- <a class="btn btn-primary mt-4"href="">Kembali</a> -->
                                    <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                  </div>
                                  <div class="col-md-8">
                                  </div>
                                  <div class="col-md-2">
                                    <a class="btn btn-primary mt-4"href="{{url()->previous() }}">Kembali</a>
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
