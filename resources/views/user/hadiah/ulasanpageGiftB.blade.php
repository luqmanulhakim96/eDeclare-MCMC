@extends('user.layouts.app')
@section('content')

        <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <style media="screen">
            @media print {
              .pagebreak { page-break-after: always; }
            }
          </style>
        </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Sejarah Ulasan: Borang Penerimaan Hadiah RM {{ $nilaiHadiah ->nilai_hadiah }} dan ke Bawah</h5>
               </div>



               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                   <div class="row">
                   <div class="col-md-10"></div>
                     <div class="col-md-2" align="right">
                       <!-- <a class="btn btn-primary btn-icon m-2" href=""><i class="fas fa-print"></i>Cetak</a> -->
                     </div>
                   </div>
                      <div class="card rounded-lg">

                          <div class="card-body">

                                <p class="pagebreak"><b>SEJARAH ULASAN</b></p>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <p>Ulasan Pentadbir Sistem</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <!-- <div class="col-md-2"></div> -->
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table class="table table-striped table-bordered">
                                            <th width="70%">Ulasan</th>
                                            <th width="20%">Nama</th>
                                            <th width="10%">Tarikh</th>

                                            @forelse($ulasanAdmin as $data)
                                            <tr>
                                              <td>
                                                {{ $data->ulasan_admin}}
                                              </td>
                                              <td>
                                                {{ $data->nama_admin}}
                                              </td>
                                              <td>
                                                {{ $data->created_at}}
                                              </td>
                                            </tr>
                                            @empty
                                            <tr>
                                              <td colspan="3"> Tiada Ulasan </td>
                                            </tr>
                                            @endforelse
                                          </table>
                                          </div>
                                      </div>

                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <p>Ulasan Ketua Jabatan Integriti</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <!-- <div class="col-md-2"></div> -->
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table class="table table-striped table-bordered">
                                            <th width="70%">Ulasan</th>
                                            <th width="20%">Nama</th>
                                            <th width="10%">Tarikh</th>

                                            @forelse($ulasanHod as $data)
                                            <tr>
                                              <td>
                                                {{ $data->ulasan_hod}}
                                              </td>
                                              <td>
                                                {{ $data->nama_hod}}
                                              </td>
                                              <td>
                                                {{ $data->created_at}}
                                              </td>
                                            </tr>
                                            @empty
                                            <tr>
                                              <td colspan="3"> Tiada Ulasan </td>
                                            </tr>
                                            @endforelse
                                          </table>
                                          </div>
                                      </div>

                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <p>Ulasan Ketua Bahagian</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <!-- <div class="col-md-2"></div> -->
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table class="table table-striped table-bordered">
                                            <th width="70%">Ulasan</th>
                                            <th width="20%">Nama</th>
                                            <th width="10%">Tarikh</th>

                                            @forelse($ulasanHodiv as $data)
                                            <tr>
                                              <td>
                                                {{ $data->ulasan_hodiv}}
                                              </td>
                                              <td>
                                                {{ $data->nama_hodiv}}
                                              </td>
                                              <td>
                                                {{ $data->created_at}}
                                              </td>
                                            </tr>
                                            @empty
                                            <tr>
                                              <td colspan="3"> Tiada Ulasan </td>
                                            </tr>
                                            @endforelse
                                          </table>
                                          </div>
                                      </div>

                                  </div>

                                  <br>
                                  <br>
                                    <a class="btn btn-primary mt-4"href="{{url()->previous() }}">Kembali</a>
                          </div>
                      </div>
               </div>
           </div>
      </div>
      <br><br><br><br>
@endsection
