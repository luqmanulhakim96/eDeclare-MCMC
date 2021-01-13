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
                                        {{ $listHarta ->nama_syarikat }}
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) No. Pendaftaran</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $listHarta ->no_pendaftaran_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Alamat Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                          {{ $listHarta ->alamat_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Jenis Syarikat / Perniagaan</p>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $listHarta ->jenis_syarikat }}
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Pulangan Perniagaan Tahunan</p>
                                    </div>
                                    <div class="col-md-8">
                                       {{ $listHarta ->pulangan_tahunan }}
                                    </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi) Modal Dibenarkan</p>
                                    </div>
                                    <div class="col-md-8">
                                        {{ $listHarta ->modal_syarikat }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                      <p>vii) Modal Berbayar (Paid Up Capital)</p>
                                  </div>
                                  <div class="col-md-8">
                                      {{ $listHarta ->modal_dibayar }}
                                  </div>
                               </div>
                               <br>
                               <div class="row">
                                 <div class="col-md-4">
                                     <p>viii) Punca Kewangan Syarikat / Perniagaan</p>
                                 </div>
                                 <div class="col-md-8">
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
                                       {{ $data ->nama_ahli }}
                                   </div>
                                   <div class="col-md-2">
                                        {{ $data ->hubungan }}
                                   </div>
                                   <div class="col-md-2">
                                       {{ $data ->jawatan_syarikat }}
                                   </div>
                                   <div class="col-md-2">
                                       {{ $data ->jumlah_saham }}
                                   </div>
                                   <div class="col-md-2">
                                       {{ $data ->nilai_saham }}
                                   </div>

                                   </div>
                                   <br>
                                   @endforeach
                                 </div>
                                 </div>
                                 <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                   <div class="page-body p-4 text-dark">
                                     <div class="row">
                                       <div class="col-md-2">
                                           <p>Ulasan Admin</p>
                                        </div>
                                        <div class="col-md-8">
                                          <p>{{ $listHarta->ulasan_admin }} </p><p>( {{ $listHarta->nama_admin }} , {{ $listHarta->no_admin }} )</p><br>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-2">
                                            <p>Ulasan Ketua Jabatan Integriti</p>
                                         </div>
                                         <div class="col-md-8">
                                           <p>{{ $listHarta->ulasan_hod}} </p><p>( {{ $listHarta->nama_hod }} , {{ $listHarta->no_hod }} )</p><br>
                                         </div>
                                       </div>
                                     <form action="{{route('ulasanHODivD.update', $listHarta->id)}}" method="post">
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
                                            <p>No Kad Pengenalan</p>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control bg-light" name="no_hodiv" value="{{Auth::user()->kad_pengenalan }}" readonly><br>
                                           </div>
                                      </div>
                                          <div class="row">
                                            <div class="col-md-2">
                                              <p>Ulasan Ketua Bahagian</p>
                                            </div>
                                              <div class="col-md-8">
                                                   <textarea class="form-control bg-light" name="ulasan_hodiv" rows="4" cols="50" placeholder="Ulasan Ketua Bahagian"></textarea><br>

                                                   <!-- <input type="radio" id="tidak_diterima" name="status" value="Proses ke Jawatankuasa Tatatertib">
                                                       <label for="Proses ke Jawatankuasa Tatatertib">Proses ke Jawatankuasa Tatatertib</label><br> -->
                                                   <input type="radio" id="diterima" name="status" value="Proses ke Ketua Jabatan Integriti">
                                                       <label for="Proses ke Ketua Jabatan Integriti">Proses ke Ketua Jabatan Integriti</label><br><br>
                                                     <!-- button -->
                                                   <div>
                                                     <button type="submit" onclick=" return confirm('Hantar Ulasan?');" class="btn btn-primary mt-4">Hantar</button>
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
@endsection
