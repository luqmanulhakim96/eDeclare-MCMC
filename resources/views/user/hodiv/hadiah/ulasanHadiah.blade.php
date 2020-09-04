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
                    <div class="card-title">Maklumat Penerimaan Hadiah RM {{ $nilai_hadiah ->nilai_hadiah }} dan Kebawah</div>
                    <div class="card-body">

                          <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama</p>
                                </div>
                                <div class="col-md-8">
                                     <div class="form-group">
                                        <b>{{Auth::user()->name }}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>No. Kad Pengenalan</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <b>{{Auth::user()->kad_pengenalan }}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Jawatan / Gred</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <b>{{Auth::user()->jawatan }}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Jabatan/ Bahagian</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {{ $listHadiah ->jabatan }}
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
                       <br>

                       <div class="row">
                         <div class="col-md-4">
                           <p>Ulasan Ketua Bahagian</p>
                           <br>
                           <form action="{{route('ulasanHODivGift.update', $listHadiah->id)}}" method="post">
                             @csrf
                              <textarea name="ulasan_hodiv" rows="8" cols="30" placeholder="Ulasan Ketua Jabatan"></textarea><br>

                              <input type="radio" id="tidak_lengkap" name="status" value="Tidak Lengkap">
                                  <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                              <input type="radio" id="diterima" name="status" value="Diproses ke Ketua Jabatan Integriti">
                                  <label for="Diterima">Diproses ke Ketua Jabatan Integriti</label><br>
                                <!-- button -->
                                <div class="col-md-2">
                                  <button type="submit" onclick=" return confirm('Hantar Ulasan?');" class="btn btn-primary mt-4">Hantar</button>
                                </div>
                            </form>
                         </div>
                         <div class="col-md-4">
                             <p>Ulasan Ketua Jabatan Integriti</p>
                             <br>
                             <textarea rows="8" cols="30" readonly>{{ $listHadiah ->ulasan_hod }}</textarea>
                         </div>
                         <div class="col-md-4">
                             <p>Ulasan Pentadbir Sistem</p>
                             <br>
                             <textarea rows="8" cols="30" readonly>{{ $listHadiah ->ulasan_admin }}</textarea>
                         </div>
                       </div>
                    </div>


                </div>
            </div>
        </div>
      </div>
  </div>

@endsection
