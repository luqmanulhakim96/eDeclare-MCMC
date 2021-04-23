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
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('perakuan.submit')}}" method="post" id="perakuan.submit">
                                @csrf
                                @foreach($staffinfo as $data)
                                  <input type="hidden" name="no_staff" value="{{$data->STAFFNO}}">
                                @endforeach
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="nama_pegawai"  value="{{Auth::user()->name }}">{{Auth::user()->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @foreach($staffinfo as $ic)
                                              <input type="hidden" name="kad_pengenalan" value="{{$ic->ICNUMBER}}">{{$ic->ICNUMBER}}
                                            @endforeach
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="jawatan"  value="{{Auth::user()->jawatan }}">{{Auth::user()->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="hidden" name="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>

                                      <p class="required"><b>2.PERAKUAN PEGAWAI</b></p>

                                <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="perakuan" value="pengakuan pegawai" id="perakuan" required>
                                      <label for="pengakuan"> Dengan ini saya mengaku bahawa tiada perubahan ke atas pemilikan harta saya seperti yang telah di isytiharkan pada  </label>
                                      <input class="form-control bg-light" type="date" name="tarikh_perakuan" value="<?php echo date('Y-m-d'); ?>" required readonly><br>
                                    </div>
                                    <div class="col-md-12">
                                      <p> Saya membuat pengakuan ini selaras dengan kehendak perenggan 6, Pekeliling Perkhidmatan Bil. 3 Tahun 2002. Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC</p>
                                    </div>
                                </div>
                                    <!-- button -->
                                   <div class="row">
                                    <div class="col-md-11">
                                    </div>
                                    <div class="col-md-1">
                                      <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
                                    </div>
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
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                            <button type="submit" class="btn btn-danger" name="publish" onclick="submitForm()">Ya</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>

@endsection
