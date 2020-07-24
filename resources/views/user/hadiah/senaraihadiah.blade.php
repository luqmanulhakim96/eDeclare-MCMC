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
                                  <td>{{ $data ->gambar_gift  }}</td>
                                  <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                  <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="{{ route('user.hadiah.editgift', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                      <a href="{{ route('gift.delete', $data->id) }}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
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
                    </div>

                </div>
            </div>
        </div>
      </div>
  </div>

@endsection
