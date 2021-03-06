@extends('user.layouts.app')
@section('content')
<!--Page Body part -->
<div class="page-body p-4 text-dark">
<div class="row mt-10">
        <!-- Col md 6 -->
        <div class="col-md-12 mt-4" >
            <!-- basic light table card -->
            <div class="card rounded-lg" >
                <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lampiran</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ulasan</a>
                      </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="page-body p-4 text-dark">
                    <div class="card-title">Maklumat Penerimaan Hadiah RM {{ $nilai_hadiah ->nilai_hadiah }} dan Kebawah</div>
                    <div class="card-body">

                      <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Nama</p>
                            </div>
                            <div class="col-md-8">
                                 <div class="form-group">
                                      {{$listHadiah->users->name }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>No. Kad Pengenalan</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                      {{$listHadiah->no_kad_pengenalan }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Jawatan / Gred</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                {{$listHadiah->jawatan }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Jabatan</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{ $listHadiah->jabatan}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Bahagian</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{ $listHadiah->bahagian}}
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
                                {{ $listHadiah ->jenis_gift }}
                            </div>
                        </div>
                            <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p>ii) Nilai/ Anggaran Nilai</p>
                            </div>
                            <div class="col-md-8">
                                {{ $listHadiah ->nilai_gift }}
                            </div>
                        </div>
                        <br>
                          <div class="row">
                            <div class="col-md-4">
                                <p>iii) Tarikh diterima</p>
                            </div>
                            <div class="col-md-8">
                                {{ $listHadiah ->tarikh_diterima }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                              <p>iv) Nama Pemberi</p>
                          </div>
                          <div class="col-md-8">
                            {{ $listHadiah ->nama_pemberi }}
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                              <p>v) Alamat Pemberi</p>
                          </div>
                          <div class="col-md-8">
                            {{ $listHadiah ->alamat_pemberi }}
                          </div>
                       </div>
                       <br>
                       <div class="row">
                         <div class="col-md-4">
                             <p>v) Hubungan Pemberi</p>
                         </div>
                         <div class="col-md-8">
                           {{ $listHadiah ->hubungan_pemberi }}
                         </div>
                      </div>
                       <br>
                       <div class="row">
                          <div class="col-md-4">
                              <p>vi)Sebab Diberi</p>
                          </div>
                          <div class="col-md-8">
                            {{ $listHadiah ->sebab_gift }}
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
                           <img src="{{ asset( $image_path = str_replace('public', 'storage',  $listHadiah ->gambar_gift)) }}"  width="100%" height="100%">
                        </div>
                       </div>
                   </div>
                   </div>
                   </div>
                     <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       <div class="page-body p-4 text-dark">
                         <form action="{{route('ulasanHODivGift.update', $listHadiah->id)}}" method="post">
                           @csrf
                           <div class="row">
                             <div class="col-md-2">
                                 <p>Nama</p>
                              </div>
                              <div class="col-md-8">
                                <input type="text" class="form-control bg-light" name="nama_hodiv" value="{{Auth::user()->name }}" readonly><br>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                  <p>No Staff</p>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control bg-light" name="no_hodiv" value="{{Auth::user()->id }}" readonly><br>
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                  <p>No Kad Pengenalan</p>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control bg-light" name="ic" value="{{Auth::user()->kad_pengenalan }}" ><br>
                                 </div>
                            </div>
                          <div class="row">
                            <div class="col-md-2">
                              <p>Ulasan Ketua Bahagian</p>
                            </div>
                            <div class="col-md-8">
                                 <textarea name="ulasan_hodiv" rows="8" cols="30" placeholder="Ulasan Ketua Bahagian"></textarea><br>

                                 <input type="radio" id="tidak_lengkap" name="status" value="Tidak Lengkap">
                                     <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                                 <input type="radio" id="Proses ke Pentadbir Sistem" name="status" value="Proses ke Pentadbir Sistem">
                                     <label for="Proses ke Pentadbir Sistem">Proses ke Pentadbir Sistem</label><br>
                                   <!-- button -->
                                   <div class="col-md-2">
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
                                           <p align="center">Hantar untuk pengesahan?</p>
                                           </div>
                                           <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                           <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                           </div>
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
            </div>
        </div>
      </div>
  </div>
</div>
<br><br><br><br>

@endsection
