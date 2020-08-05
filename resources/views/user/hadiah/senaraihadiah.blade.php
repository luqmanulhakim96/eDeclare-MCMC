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
                    <div class="card-title">Senarai Sejarah Penerimaan Hadiah</div>
                    <!-- Description -->
                    <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-responsive text-dark">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th width="10%"><p class="all">ID</p></th>
                                    <th width="30%"><p class="all">Jenis Hadiah</p></th>
                                    <th width="30"><p class="all">Nilai Hadiah (RM)</p></th>
                                    <th width="15%"><p class="all">Tarikh Diterima</p></th>
                                    <th width="30%"><p class="all">Nama Pemberi</p></th>
                                    <th width="30%"><p class="all">Alamat Pemberi</p></th>
                                    <th width="30%"><p class="all">Hubungan Pemberi</p></th>
                                    <th width="70%"><p class="all">Gambar Hadiah</p></th>
                                    <th width="30%"><p class="all">Status Penerimaan Hadiah</p></th>
                                    <th width="30%"><p class="all">Edit/Padam</p></th>
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
                                  <!-- <td>{{ $data ->gambar_gift  }}</td> -->
                                  <!-- <td><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="profile" class="profile-avatar"></td> -->
                                  <!-- <td><img src="{{ asset('storage/uploads/gambar_hadiah/0nSg30DXJdzDJf6RCbqmeGjoZb9P45lVlw8DRdIe.png' ) }}"></td> -->
                                  <td>
                                    <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                        </button>
                                  </td>
                                  <!-- <td>$image_path</td> -->
                                  <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                  <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="{{ route('user.hadiah.editgift', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                      <a href="{{ route('gift.delete', $data->id) }}" class="btn btn-danger" onclick=" return confirm('Padam maklumat?');"><i class="fas fa-times-circle"></i></a>
                                  </div>
                                  </td>
                                </tr>
                               @endforeach
                                <!-- Table data -->
                                <!-- <tr class="text-center">
                                    <td><p class="mb-0 font-weight-bold">1</p></td>
                                    <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                    <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fa fa-eye text-success"></i></a>
                                        </div>
                                    </td>
                                    <td><p class="mb-0 font-weight-bold">15-05-2019</p></td>
                                    <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                            <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr class="text-center">
                                    <td><p class="mb-0 font-weight-bold">2</p></td>
                                    <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                    <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fa fa-eye text-success"></i></a>
                                        </div>
                                    </td>
                                    <td><p class="mb-0 font-weight-bold">20-01-2015</p></td>
                                    <td><span class="badge badge-danger badge-pill">Dibatalkan</span></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                            <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="text-center">
                                    <td><p class="mb-0 font-weight-bold">3</p></td>
                                    <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                    <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fa fa-eye text-success"></i></a>
                                        </div>
                                    </td>
                                    <td><p class="mb-0 font-weight-bold">13-04-2010</p></td>
                                    <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                    <td class="p-3">
                                        <div class="d-flex flex-row justify-content-around align-items-center">
                                            <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                            <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- Table data -->

                            <!-- </tbody> -->
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
                                <div class="modal-body">
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
