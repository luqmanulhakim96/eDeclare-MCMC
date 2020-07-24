@extends('user.layouts.app')
@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                <div class="card-body">
                      <div class="card-titleuser"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                </div>
                </div>

                <!-- <div class="card rounded-lg">
            <div class="card-body">
                      <div class="card-title"><b>Tatacara Penggunaan Untuk Mengisi Permohonan.</b></div>
                      <div class="card-title">1. Mendaftar masuk di Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC).</div>
                      <div class="card-title">2. Klik Perakuan Tiada Penambahan Harta  untuk mengisi Borang Lampiran A: Borang Pengakuan Tiada Perubahan ke atas Pemilikan Harta.</div>
                      <div class="card-title">3. Klik Perisytiharan Harta Baharu untuk mengisi Borang Lampiran B, C dan D.</div>
                      <div class="card-title">4. Klik Penerimaan Hadiah Baharu untuk mengisi Borang Lampiran A: Borang Penerimaan Hadiah.</div>
                      <div class="card-title">5. Klik butang "Hantar" untuk mengahntar permohonan.</div>
                </div>
            </div><br><br> -->

            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <!-- <div class="page-heading border-bottom d-flex flex-row">
                    <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small>
                </div> -->
                <!-- Small card component -->
                <div class="row mb-4">
                    <!-- Col lg 8, col md 12 -->
                    <div class="col-lg-8 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Card title -->
                                <div class="card-title">Statistik Tahunan Perisytiharan Harta </div>
                                <!-- Chart -->
                                <div id="echartBar" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div>
                            </div>

                        </div>

                    </div>
                    <!-- Col lg 4, col md 12 -->
                    <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Card title -->
                                <div class="card-title">Statistik Penerimaan Hadiah</div>
                                <!-- Chart -->
                                <div id="echartPie" style="width:100%;height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- Row -->
                        <div class="row">
                            <div class="col-12">
                                    <!-- Card body -->
                                    <div class="col-md-12 mt-4" >
                                        <!-- basic light table card -->
                                        <div class="card rounded-lg" >
                                            <div class="card-body">
                                                <div class="card-title">Senarai Perisytiharan Harta Baharu</div>
                                                <!-- Description -->
                                                <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                                                <!-- Table -->
                                                <div class="table-responsive">
                                                    <table class="table table-responsive text-dark">
                                                        <thead class="thead-light">
                                                            <tr class="text-center">
                                                                <th width="10%"><p class="mb-0">Bil</p></th>
                                                                <th width="30%"><p class="mb-0">Nama</p></th>
                                                                <th width="30"><p class="mb-0">No Kad Pengenalan</p></th>
                                                                <th width="10%"><p class="mb-0">Lampiran B</p></th>
                                                                <th width="10%"><p class="mb-0">Lampiran C</p></th>
                                                                <th width="10%"><p class="mb-0">Lampiran D</p></th>
                                                                <th width="10%"><p class="mb-0">Lampiran G</p></th>
                                                                <th width="70%"><p class="mb-0">Status</p></th>
                                                                <th width="30%"><p class="mb-0">Status</p></th>
                                                                <th width="30%"><p class="mb-0">Tindakan</p></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Table data -->
                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">1</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Syahdan</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><p class="mb-0 font-weight-bold">13-04-2019</p></td>
                                                                <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Table data -->
                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">2</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Hafiz</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112061111</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><p class="mb-0 font-weight-bold">11-04-2019</p></td>
                                                                <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">3</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Luqman</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112069333</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td><td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><p class="mb-0 font-weight-bold">13-04-2018</p></td>
                                                                <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Table data -->

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                    <div class="col-md-12 mt-4" >
                                        <!-- basic light table card -->
                                        <div class="card rounded-lg" >
                                            <div class="card-body">
                                                <div class="card-title">Senarai Penerimaan Hadiah Baharu</div>
                                                <!-- Description -->
                                                <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                                                <!-- Table -->
                                                <div class="table-responsive">
                                                    <table class="table table-responsive text-dark">
                                                        <thead class="thead-light">
                                                            <tr class="text-center">
                                                                <th width="10%"><p class="mb-0">Bil</p></th>
                                                                <th width="70%"><p class="mb-0">Nama</p></th>
                                                                <th width="80"><p class="mb-0">No Kad Pengenalan</p></th>
                                                                <th width="30%"><p class="mb-0">Lampiran A</p></th>
                                                                <th width="30%"><p class="mb-0">Status</p></th>
                                                                <th width="30%"><p class="mb-0">Tindakan</p></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Table data -->
                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">2</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Syahdan</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Table data -->
                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">3</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Hafiz</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112068567</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr class="text-center">
                                                                <td><p class="mb-0 font-weight-bold">1</p></td>
                                                                <td><p class="mb-0 font-weight-bold">Muhammad Luqman</p></td>
                                                                <td><p class="mb-0 font-weight-bold">971112069963</p></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                                                <td class="p-3">
                                                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                                                        <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                                        <a href="#"><i class="fas fa-times-circle text-danger"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Table data -->

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                </div>
    </div>



@endsection
