@extends('user.layouts.app')
@section('content')
<!--Page Body part -->

<div class="page-body p-4 text-dark">
  <!-- <div class="card-body"> -->
  <div class="buttons">
    <a href="{{route('user.admin.hadiah.listGift')}}" class="btn btn-warning m-2">Sedang Diproses</a>
    <a href="{{route('user.admin.hadiah.HadiahA.diprosesHODIV')}}"class="btn btn-warning m-2">Diproses ke Pentadbir Sistem</a>
    <a href="{{route('user.admin.hadiah.HadiahA.listDiterima')}}" class="btn btn-success m-2">Diterima</a>
    <a href="{{route('user.admin.hadiah.HadiahA.listTidakLengkap')}}" class="btn btn-dark m-2">Tidak Lengkap</a>
    <a href="{{route('user.admin.hadiah.HadiahA.listTidakDiterima')}}" class="btn btn-danger m-2" >Tidak Diterima</a>
  </div>
  <!-- </div> -->
<div class="row mt-10">
        <!-- Col md 6 -->
        <div class="col-md-12 mt-4" >
            <!-- basic light table card -->
            <div class="card rounded-lg" >
                <div class="card-body">
                    <div class="card-title">Senarai Penerimaan Hadiah bernilai lebih dari RM 100</div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="all" width="10%"><p>ID</p></th>
                                  <th class="all" width="10%"><p>No Staff</p></th>
                                  <th class="all" width="10%"><p>Nama</p></th>
                                  <th class="all" width="10%"><p>Jabatan</p></th>
                                  <th class="all" width="30%"><p>Jenis Hadiah</p></th>
                                  <th class="all" width="30"><p>Nilai Hadiah (RM)</p></th>
                                  <th class="all" width="15%"><p>Tarikh Diterima</p></th>
                                  <th class="all" width="30%"><p>Nama Pemberi</p></th>
                                  <th class="all" width="30%"><p>Alamat Pemberi</p></th>
                                  <th class="all" width="30%"><p>Hubungan Pemberi</p></th>
                                  <th class="all" width="70%"><p>Gambar Hadiah</p></th>
                                  <th class="all" width="30%"><p>Status Penerimaan Hadiah</p></th>
                                  <!-- <th class="all" width="30%"><p>Tindakan</p></th> -->

                                </tr>
                            </thead>
                            <tbody align="center">
                              @foreach($listHadiah as $data)

                              <tr>
                                  <td>{{ $data ->id }}</td>
                                  <td>
                                    {{ $data ->gifts->kad_pengenalan }}
                                  </td>

                                  <td>{{ $data ->gifts->name }}</td>
                                  <td>{{ $data ->jabatan}}</td>
                                  <td>{{ $data ->jenis_gift }}</td>
                                  <td>{{ $data ->nilai_gift  }}</td>
                                  <td>{{ $data ->tarikh_diterima }}</td>
                                  <td>{{ $data ->nama_pemberi  }}</td>
                                  <td>{{ $data ->alamat_pemberi  }}</td>
                                  <td>{{ $data ->hubungan_pemberi  }}</td>
                                  <td>
                                    <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                        </button>
                                  </td>
                                  <!-- <td>$image_path</td> -->
                                  <td>
                                    @if($data ->status == "Sedang Diproses")
                                    <span class="badge badge-warning badge-pill">Menunggu Ulasan Ketua Jabatan Integriti</span>
                                    @elseif($data ->status == "Diproses ke Pentadbir Sistem")
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Tidak Lengkap")
                                    <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Tidak Diterima")
                                    <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Diterima")
                                    <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                    @endif
                                  </td>
                                  <!-- <td>
                                    @if($data ->status == "Diproses ke Pentadbir Sistem")
                                    <a href="{{route('user.admin.hadiah.ulasanHadiah',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                      @endif
                                  </td> -->

                                </tr>
                                @endforeach
                              </tbody>


                        </table>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gambar Hadiah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body" align="center">
                                  <img id="imageHadiah" class="img-responsive" src="" alt="Gambar Hadiah" width="50%" height="50%">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
      </div>
  </div>
  </div>
  <script type="text/javascript">
    function passGambarHadiah(path){
      console.log(path);
      $(".modal-body #imageHadiah").attr('src', path);
      $('.modal-body #imageHadiah').show();
    }
  </script>

@endsection
