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

                                      <p><b>2.PERAKUAN PEGAWAI</b></p>

                                <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="perakuan" value="pengakuan pegawai" id="perakuan" required>
                                      <label for="pengakuan"> Dengan ini saya mengaku bahawa tiada perubahan ke atas pemilikan harta saya seperti yang telah di isytiharkan pada.  </label><input class="form-control bg-light" type="date" name="tarikh_perakuan" id="tarikh_perakuan" required><br>
                                    </div>
                                    <div class="col-md-10">
                                      <p> Saya membuat pengakuan ini selaras dengan kehendak perenggan 6, Pekeliling Perkhidmatan Bil. 3 Tahun 2002</p>
                                    </div>
                                </div>
                                    <!-- button -->
                                   <div class="row">
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-2">
                                      <button type="submit" class="btn btn-primary mt-4">Hantar</button>
                                    </div>
                                  </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection