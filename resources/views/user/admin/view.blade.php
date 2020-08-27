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

                              <!-- <div id="barchart_values" style="width: 900px; height: 300px;"></div> -->
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
                                                    <table class="table table-striped table-bordered"  style="width: 100%;">
                                                        <thead class="thead-light">
                                                            <tr class="text-center">
                                                                <th width="10%"><p class="mb-0">ID</p></th>
                                                                <th width="30%"><p class="mb-0">No Staff</p></th>
                                                                <th width="30"><p class="mb-0">Nama</p></th>
                                                                <th width="10%"><p class="mb-0">Lampiran</p></th>
                                                                <th width="70%"><p class="mb-0">Tarikh</p></th>
                                                                <th width="30%"><p class="mb-0">Status</p></th>
                                                                <th width="30%"><p class="mb-0">Tindakan</p></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody align="center">
                                                          @foreach($listB as $data)

                                                          <tr>
                                                              <td>{{ $data ->id }}</td>
                                                              <td>{{ $data ->formbs->kad_pengenalan }}</td>
                                                              <td>{{ $data ->formbs->name }}</td>
                                                              <td>
                                                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                                                      <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                                  </div>
                                                              </td>
                                                              <td>{{ $data ->updated_at}}</td>
                                                              <td>
                                                                @if($data ->status == "Sedang Diproses")
                                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                                @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                                @elseif($data ->status == "Tidak Lengkap")
                                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                                @elseif($data ->status == "Tidak Diterima")
                                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                                @elseif($data ->status == "Diterima")
                                                                <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                                                @endif
                                                              </td>
                                                              <td>
                                                                @if($data ->status == "Sedang Diproses")
                                                                <a href="{{route('user.admin.harta.ulasanHartaB',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                                                  @endif
                                                              </td>
                                                            </tr>
                                                           @endforeach
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
                                                    <table class="table table-striped table-bordered" style="width: 100%;">
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
                                                              <th class="all" width="30%"><p>Tindakan</p></th>

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
                                                              <td>
                                                                @if($data ->status == "Diproses ke Pentadbir Sistem")
                                                                <a href="{{route('user.admin.hadiah.ulasanHadiah',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                                                  @endif
                                                              </td>

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
                </div>
    </div>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ["Element", "Density", { role: "style" } ],
       ["Copper", 8.94, "#b87333"],
       ["Silver", 10.49, "silver"],
       ["Gold", 19.30, "gold"],
       ["Platinum", 21.45, "color: #e5e4e2"]
     ]);

     var view = new google.visualization.DataView(data);
     view.setColumns([0, 1,
                      { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                      2]);

     var options = {
       title: "Density of Precious Metals, in g/cm^3",
       width: 600,
       height: 400,
       bar: {groupWidth: "95%"},
       legend: { position: "none" },
     };
     var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
     chart.draw(view, options);
 }
 </script> -->



@endsection
