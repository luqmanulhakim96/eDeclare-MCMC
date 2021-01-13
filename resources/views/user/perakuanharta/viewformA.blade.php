@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran A: Borang Pengakuan Tiada Perubahan ke atas Pemilikan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                   <div class="row">
                   <div class="col-md-10"></div>
                     <div class="col-md-2" align="right">
                       <a class="btn btn-primary btn-icon m-2" href="{{ route('user.perakuanharta.formAprint', $listHarta->id) }}"><i class="fas fa-print"></i>Cetak</a>
                     </div>
                   </div>
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('perakuan.submit')}}" method="post" id="perakuan.submit">

                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta -> nama_pegawai }}
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
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>

                                      <p class="required"><b>2.PERAKUAN PEGAWAI</b></p>

                                <div class="row">
                                    <div class="col-md-12">
                                       <p>Dengan ini saya mengaku bahawa tiada perubahan ke atas pemilikan harta saya seperti yang telah di isytiharkan pada <B>{{$listHarta -> tarikh_perakuan}}</b><p>
                                    </div>
                                    <div class="col-md-12">
                                      <p> Saya membuat pengakuan ini selaras dengan kehendak perenggan 6, Pekeliling Perkhidmatan Bil. 3 Tahun 2002. Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC</p>
                                    </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
