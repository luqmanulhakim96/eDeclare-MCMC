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
                    <div class="card-title">Senarai Sejarah Penerimaan Hadiah lebih RM {{ $nilaiHadiah ->nilai_hadiah }}</div>
                    <!-- Description -->
                    <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th class="all" width="10%"><p>ID</p></th>
                                    <th class="all" width="30%"><p>Jenis Hadiah</p></th>
                                    <th class="all" width="30"><p>Nilai Hadiah (RM)</p></th>
                                    <th class="all" width="15%"><p>Tarikh Diterima</p></th>
                                    <th class="all" width="30%"><p class="all">Nama Pemberi</p></th>
                                    <th class="all" width="30%"><p class="all">Alamat Pemberi</p></th>
                                    <th class="all" width="30%"><p>Hubungan Pemberi</p></th>
                                    <th class="all" width="70%"><p class="all">Gambar Hadiah</p></th>
                                    <th class="all" width="30%"><p>Status Penerimaan Hadiah</p></th>
                                    <th class="all" width="30%"><p>Tindakan</p></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                              @foreach($listHadiah as $data)

                              <tr>
                                  <td>{{ $data ->id }}</td>
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
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Diterima")
                                     <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Tidak Lengkap")
                                     <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Tidak Diterima")
                                     <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Ketua Bahagian")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @endif
                                  </td>

                                  <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                    @if($data ->status == "Sedang Diproses")
                                      <a href="{{ route('user.hadiah.editgift', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>

                                      @endif
                                      <!-- <a href="{{ route('gift.delete', $data->id) }}" class="btn btn-danger" onclick=" return confirm('Padam maklumat?');"><i class="fas fa-times-circle"></i></a> -->

                                  </div>
                                  </td>
                                </tr>
                               @endforeach

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
