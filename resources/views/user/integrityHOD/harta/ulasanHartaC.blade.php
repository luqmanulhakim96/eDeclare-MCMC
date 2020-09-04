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
                                          {{ $listHarta ->hubungan_pemilik_pelupusan }}
                                      </div>
                                  </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $listHarta ->no_pendaftaran_harta }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $listHarta ->tarikh_pemilikan }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $listHarta ->tarikh_pelupusan }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). </p>
                                      </div>
                                      <div class="col-md-4">
                                          {{ $listHarta ->cara_pelupusan }}
                                      </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                            <p>Jika dijual, Nyatakan nilai jualan.</p>
                                        </div>
                                      <div class="col-md-4">
                                          {{ $listHarta ->nilai_pelupusan }}
                                      </div>

                                  </div>
                                  <br>

                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>Ulasan Admin</p>
                                        <br>
                                        <textarea rows="8" cols="30" readonly>{{ $listHarta ->ulasan_admin }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                      <p>Ulasan Ketua Jabatan Integriti</p>
                                      <br>
                                      <form action="{{route('ulasanHODC.update', $listHarta->id)}}" method="post">
                                        @csrf
                                         <textarea name="ulasan_hod" rows="8" cols="30" placeholder="Ulasan Ketua Jabatan Integriti"></textarea><br>

                                            <input type="radio" id="diterima" name="status" value="Diterima">
                                                <label for="Diterima">Diterima</label><br>
                                            <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                                <label for="Tidak Diterima">Tidak Diterima</label><br>
                                            <input type="radio" id="tidak_diterima" name="status" value="Proses ke Ketua Bahagian">
                                                <label for="Proses ke Ketua Bahagian">Proses ke Ketua Bahagian</label><br><br>
                                           <!-- button -->
                                           <div class="col-md-2">
                                             <button type="submit" onclick=" return confirm('Hantar Ulasan?');" class="btn btn-primary mt-4">Hantar</button>
                                           </div>
                                       </form>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Ulasan Ketua Bahagian</p>
                                        <br>
                                        <textarea rows="8" cols="30" readonly>{{ $listHarta ->ulasan_hodiv }}</textarea>
                                    </div>
                                  </div>
                      </div>
               </div>
           </div>
@endsection
