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
                    <div class="card-title">Maklumat Penerimaan Hadiah bernilai RM {{ $nilai_hadiah ->nilai_hadiah }} dan Kebawah</div>
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

                          <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama</p>
                                </div>
                                <div class="col-md-8">
                                     <div class="form-group">
                                        {{$listHadiah->nama_pegawai }}
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
                                        {{ $listHadiah ->jabatan }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Bahagian</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {{ $listHadiah ->bahagian }}
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


                                <div class="col-md-5">
                                  <form action="{{route('userhadiahB.update', $listHadiah ->id)}}" method="POST">
                                    @csrf
                                  <input class="form-control" type="text" name="jenis_gift" value="{{ $listHadiah ->jenis_gift }}">
                                </div>
                                <div class="col-md-3">
                                  <button class="btn btn-primary" type="submit">Kemaskini</button>
                                </div>
                                </form>


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
                               @if($listHadiah->gambar_gift != NULL)
                               @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $listHadiah ->gambar_gift)), PATHINFO_EXTENSION) == "pdf")
                               <div class="modal-body modal-dialog1" >
                               <iframe id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $listHadiah ->gambar_gift))}}" alt="Gambar Hadiah" class="imgthumbnail" width="300px" height="300px"></iframe>
                               </div>
                               @else
                               <div class="modal-body"  >
                               <img id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $listHadiah ->gambar_gift))}}" alt="Gambar Hadiah" class="imgthumbnail" width="300px" height="300px"></img>
                             </div>
                             @endif

                               @endif
                            </div>
                           </div>
                       </div>
                       </div>
                       </div>
                       <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         <div class="page-body p-4 text-dark">
                           <form action="{{route('ulasanadminGiftB.update', $listHadiah->id)}}" method="post">
                             @csrf
                             <div class="row">
                               <div class="col-md-2">
                                   <p>Nama</p>
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control bg-light" name="nama_admin" value="{{Auth::user()->name }}" readonly><br>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-2">
                                    <p>No Staff</p>
                                  </div>
                                  <div class="col-md-8">
                                    @foreach($staffinfo as $ic)
                                      <input type="text" class="form-control bg-light" name="no_admin" value="{{$ic->STAFFNO}}" readonly><br>
                                    @endforeach
                                   </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-2">
                                    <p>No Kad Pengenalan</p>
                                  </div>
                                  <div class="col-md-8">
                                    @foreach($staffinfo as $ic)
                                      <input type="text" class="form-control bg-light" name="kad_pengenalan" value="{{$ic->ICNUMBER}}" readonly><br>
                                    @endforeach
                                   </div>
                              </div>
                            <div class="row">
                              <div class="col-md-2">
                                <p>Ulasan Pentadbir Sistem</p>
                              </div>
                              <div class="col-md-8">
                                   <textarea maxlength="100" class="form-control bg-light" name="ulasan_admin" rows="8" cols="30" placeholder="Ulasan Pentadbir Sistem"></textarea><br>

                                   <input type="radio" id="tidak_lengkap" name="status" value="Tidak Lengkap">
                                       <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                                   <input type="radio" id="Proses ke Ketua Jabatan Integriti" name="status" value="Proses ke Ketua Jabatan Integriti">
                                       <label for="Proses ke Ketua Jabatan Integriti">Proses ke Ketua Jabatan Integriti</label><br>
                                   <!-- <input type="radio" id="diterima" name="status" value="Diterima">
                                       <label for="Diterima">Diterima</label><br>
                                   <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                       <label for="Tidak Diterima">Tidak Diterima</label><br> -->
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
                                             <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                             <button type="submit" class="btn btn-danger" name="publish">Ya</button>
                                             </div>
                                         </div>
                                         </div>
                                     </div>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                  @if($ulasanAdmin)
                                    <div class="col-md-2">
                                        Sejarah Ulasan Admin
                                     </div>
                                     @foreach($ulasanAdmin as $data)
                                     <div class="col-md-3">
                                         <p>- {{ $data->ulasan_admin }} </p>
                                         <p>( {{ $data->nama_admin }} , {{ $data->no_admin }} )</p>
                                     </div>
                                     @endforeach
                                  @endif
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
