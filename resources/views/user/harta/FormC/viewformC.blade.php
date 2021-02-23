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
                   <div class="row">
                   <div class="col-md-10"></div>
                     <div class="col-md-2" align="right">
                       <a class="btn btn-primary btn-icon m-2"href="{{ route('user.harta.formCprint', $listHarta->id) }}"><i class="fas fa-print"></i>Cetak</a>
                     </div>
                   </div>
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('c.submit')}}" method="POST">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                                {{$listHarta ->nama_pegawai }}
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
                                              {{$listHarta ->alamat_tempat_bertugas }}
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
                                  <br>
                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4" href="{{url()->previous() }}">Kembali</a>
                                    </div>

                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
