@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal">Lampiran B: LAPORAN PENERIMAAN HADIAH DIBAWAH SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI RM {{ $nilaiHadiah ->nilai_hadiah }} DAN KE BAWAH</p>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-md-10"></div>
                   <div class="col-md-2" align="right">
                     <a class="btn btn-primary btn-icon m-2" href="{{ route('user.hadiah.GiftBprint', $info->id) }}"><i class="fas fa-print"></i>Cetak</a>
                   </div>
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
                                              {{$info->users->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$info->users->kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          {{$info->users->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        Jabatan/ Bahagian
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{ $info->jabatan}}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <p><b>2. KETERANGAN MENGENAI HADIAH</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>i) Jenis</p>
                                      </div>
                                      <div class="col-md-8">
                                        {{$info->jenis_gift}}
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) Nilai/ Anggaran Nilai</p>
                                      </div>
                                      <div class="col-md-8">
                                        {{ $info->nilai_gift  }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Tarikh diterima</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $info->tarikh_diterima}}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Nama Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $info->nama_pemberi  }}
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Alamat Pemberi</p>
                                    </div>
                                    <div class="col-md-8">
                                       {{ $info->alamat_pemberi  }}
                                    </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                   <div class="col-md-4">
                                       <p>v) Hubungan Pemberi</p>
                                   </div>
                                   <div class="col-md-8">
                                      {{ $info->hubungan_pemberi  }}
                                   </div>
                                </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi)Sebab Diberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $info->sebab_gift  }}
                                    </div>
                                </div>
                                <br>
                              <!--upload gambar hadiah-->
                              <div class="row">
                                 <div class="col-md-6">
                                     <p><b>3. GAMBAR HADIAH YANG DITERIMA</b></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <div class="img-responsive" alt="Gambar Hadiah" align="center">
                                     <img src="{{ asset( $image_path = str_replace('public', 'storage',  $info->gambar_gift)) }}"  class="imgthumbnail" width="150px" height="150px">
                                  </div>
                                 </div>
                             </div>
                          </div>
                      </div>
               </div>
           </div>
@endsection
