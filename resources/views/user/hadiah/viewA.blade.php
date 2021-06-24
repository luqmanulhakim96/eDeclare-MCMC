@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal">Borang A: PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH DI BAWAH PERATURAN 10, PERATURAN-PERATURAN TATATERTIB SKMM 2007 DAN SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN
                                                BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI LEBIH DARIPADA RM {{ $nilaiHadiah ->nilai_hadiah }}</p>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-md-10"></div>
                   <div class="col-md-2" align="right">
                     <a class="btn btn-primary btn-icon m-2" href="{{ route('user.hadiah.Giftprint', $info->id) }}"><i class="fas fa-print"></i>Cetak</a>
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
                                              {{$info->nama_pegawai }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$info->no_kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          {{$info->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        Jabatan
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{ucwords(strtolower( $info->jabatan))}}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                        Bahagian
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{ ucwords(strtolower($info->bahagian))}}
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
                                       <p>vi) Hubungan Pemberi</p>
                                   </div>
                                   <div class="col-md-8">
                                      {{ $info->hubungan_pemberi  }}
                                   </div>
                                </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vii)Sebab Diberi</p>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $info->sebab_gift  }}
                                    </div>
                                </div>
                                <br>
                              <!--upload gambar hadiah-->
                              <div class="row">
                                 <div class="col-md-6">
                                     <p><b>3. LAMPIRAN HADIAH YANG DITERIMA</b></p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <div class="img-responsive" alt="Gambar Hadiah" align="center">
                                     @if($info->gambar_gift != NULL)
                                     @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $info ->gambar_gift)), PATHINFO_EXTENSION) == "pdf")
                                     <div class="modal-body modal-dialog1" >
                                     <iframe id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $info ->gambar_gift))}}" alt="Gambar Hadiah" class="imgthumbnail" width="300px" height="300px"></iframe>
                                     </div>
                                     @else
                                     <div class="modal-body"  >
                                     <img id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $info ->gambar_gift))}}" alt="Gambar Hadiah" class="imgthumbnail" width="300px" height="300px"></img>
                                   </div>
                                   @endif
                                     <!-- <div class="row">
                                        <div class="col-md-4">
                                          <img src="{{ asset( $image_path = str_replace('public', 'storage',  $info->gambar_gift)) }}"  class="imgthumbnail" width="150px" height="150px">
                                        </div>
                                     </div> -->
                                     @endif
                                     <!-- <img src="{{ asset( $image_path = str_replace('public', 'storage',  $info->gambar_gift)) }}"  class="imgthumbnail" width="150px" height="150px"> -->
                                  </div>
                                 </div>
                             </div>
                             <br>
                             <br>
                             <a class="btn btn-primary mt-4"href="{{url()->previous() }}">Kembali</a>
                          </div>
                      </div>
               </div>
           </div>
      </div>
      <br><br><br><br>
@endsection
