@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran C: Borang Pelupusan Harta</h5>
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
                                                {{$listHarta ->formcs->name }}
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
                                                {{$listHarta ->formcs->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$listHarta ->formcs->jabatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{$listHarta ->formcs->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p><b>2. KETERANGAN MENGENAI PELUPUSAN HARTA</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <table class="table table-bordered">
                                          <th width="5%">Jenis Harta</th>
                                          <th width="5%">Pemilik Harta</th>
                                          <th width="5%">Hubungan Pemilik</th>
                                          <th width="5%">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</th>
                                          <th width="5%">Tarikh Pemilikan Harta</th>
                                          <th width="5%">Tarikh Pelupusan Harta</th>
                                          <th width="5%">Cara Pelupusan</th>
                                          <th width="5%">Nilai Pelupusan</th>

                                          @foreach($hartaB as $data)
                                          @if($data->formcs_id)
                                          <tr>
                                            <td>{{ $data ->jenis_harta }}</td>
                                            <td>{{ $data ->pemilik_harta }}</td>
                                            <td>{{ $data ->hubungan_pemilik }}</td>
                                            <td>{{ $data ->maklumat_harta }}</td>
                                            <td>{{ $data ->tarikh_pemilikan_harta }}</td>
                                            <td>{{ $data ->tarikh_pelupusan}}</td>
                                            <td>{{ $data ->cara_pelupusan }}</td>
                                            <td>{{ $data ->nilai_pelupusan }}</td>
                                          </tr>
                                          @endif
                                          @endforeach
                                        </table>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="page-body p-4 text-dark">
                                      <form action="{{route('ulasanadminC.update', $listHarta->id)}}" method="post">
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
