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
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta->nama_pegawai }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta ->kad_pengenalan }}
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
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta ->jabatan }}
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
                                        <!-- <input class="form-control bg-light" type="text" name="nama_syarikat" placeholder="Nama Syarikat/Perniagaan" value="{{ old('nama_syarikat')}}"> -->
                                        {{ $listHarta ->nama_syarikat }}
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>ii) No. Pendaftaran</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="no_pendaftaran_syarikat" placeholder="No Pendaftaran Syarikat/Perniagaan" value="{{ old('no_pendaftaran_syarikat')}}"> -->
                                          {{ $listHarta ->no_pendaftaran_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p>iii) Alamat Syarikat / Perniagaan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <!-- <input class="form-control bg-light" type="text" name="alamat_syarikat" placeholder="Alamat Syarikat / Perniagaan" value="{{ old('alamat_syarikat')}}"> -->
                                          {{ $listHarta ->alamat_syarikat }}
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>iv) Jenis Syarikat / Perniagaan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="jenis_syarikat" placeholder="Jenis Syarikat / Perniagaan" value="{{ old('jenis_syarikat')}}"> -->
                                        {{ $listHarta ->jenis_syarikat }}
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                        <p>v) Pulangan Perniagaan Tahunan</p>
                                    </div>
                                    <div class="col-md-8">
                                       <!-- <input class="form-control bg-light" type="text" name="pulangan_tahunan" placeholder="Pulangan Perniagaan Tahunan" value="{{ old('pulangan_tahunan')}}"> -->
                                       {{ $listHarta ->pulangan_tahunan }}
                                    </div>
                                 </div>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <p>vi) Modal Dibenarkan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- <input class="form-control bg-light" type="text" name="modal_syarikat" placeholder="Modal Dibenarkan" value="{{ old('modal_syarikat')}}"> -->
                                        {{ $listHarta ->modal_syarikat }}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-4">
                                      <p>vii) Modal Berbayar (Paid Up Capital)</p>
                                  </div>
                                  <div class="col-md-8">
                                      <!-- <input class="form-control bg-light" type="text" name="modal_dibayar" placeholder="Modal Dibayar" value="{{ old('modal_dibayar')}}"> -->
                                      {{ $listHarta ->modal_dibayar }}
                                  </div>
                               </div>
                               <br>
                               <div class="row">
                                 <div class="col-md-4">
                                     <p>viii) Punca Kewangan Syarikat / Perniagaan</p>
                                 </div>
                                 <div class="col-md-8">
                                     <!-- <input class="form-control bg-light" type="text" name="punca_kewangan" placeholder="Punca Kewangan Syarikat / Perniagaan"  value="{{ old('punca_kewangan')}}"> -->
                                     {{ $listHarta ->punca_kewangan }}
                                 </div>
                              </div>
                              <br>
                              @if($listKeluarga)
                              <div class="row">
                                <div class="col-md-6">
                                    <p>ix) Nama ahli keluarga yang terlibat dalam perniagaan / syarikat</p>
                                </div>
                              </div>
                              <br>
                              <!-- <input type="hidden" name="counter" value="0" id="counter"> -->

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
                                       <!-- <input class="form-control bg-light" type="text" name="nama_ahli[]" value="{{ old('nama_ahli[]')}}"> -->
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
                                   @endforeach
                                   @endif
                                   <br>
                                   <div class="row">
                                      <div class="col-md-6">
                                          <p><b>3. DOKUMEN SYARIKAT</b></p>
                                      </div>
                                   </div>

                                   <div class="table-responsive">
                                       <table class="table table-bordered" id="table_keterangan">
                                           <thead>
                                               <tr class="text-center">

                                                   <th width="50%"><p class="mb-0">Nama Fail</p></th>
                                                   <!-- <th width="5%"><p class="mb-0">Tindakan</p></th> -->
                                               </tr>
                                           </thead>
                                           @foreach($dokumen_syarikat as $dokumen_syarikat)
                                             @if($dokumen_syarikat->dokumen_syarikat != NULL)

                                           <tbody>

                                             <tr id="{{$dokumen_syarikat->id}}">

                                               <td align="left"><a target="_blank" rel="noopener noreferrer" href="{{ asset( $image_path = str_replace('public', 'storage',  $dokumen_syarikat->dokumen_syarikat)) }}"> {{ asset( $image_path = str_replace('public', 'storage',  $dokumen_syarikat->dokumen_syarikat)) }}</a></td>


                                             </tr>

                                           </tbody>
                                           @endif

                                         @endforeach
                                       </table>
                                   </div>

                              </div>
                                   <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                     <div class="page-body p-4 text-dark">
                                       <form action="{{route('ulasanadminD.update', $listHarta->id)}}" method="post">
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
                                                <p>Ulasan Admin</p>
                                              </div>
                                              <div class="col-md-8">

                                                           <textarea maxlength="100" class="form-control bg-light" name="ulasan_admin" rows="4" cols="50" placeholder="Ulasan Admin"></textarea><br>

                                                           <input type="radio" id="tidak_lengkap" name="status" value="Tidak Lengkap">
                                                               <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                                                           <input type="radio" id="diterima" name="status" value="Proses ke Ketua Jabatan Integriti">
                                                               <label for="Diterima">Proses ke Ketua Jabatan Integriti</label><br>
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
                                                  <hr>
                                                  <div class="row">
                                                         @if($ulasanHOD)
                                                           <div class="col-md-2">
                                                               <p>Sejarah Ulasan HOD</p>
                                                            </div>
                                                              @foreach($ulasanHOD as $data)
                                                              <div class="col-md-3">
                                                                <p>- {{ $data->ulasan_hod }} </p>
                                                                <p>( {{ $data->nama_hod }} , {{ $data->no_hod }} )</p>
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
  <br><br><br><br>
@endsection
