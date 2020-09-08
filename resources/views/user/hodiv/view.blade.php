@extends('user.layouts.app')
@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                  <div class="card-body">
                        <div class="card-titleuser"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                  </div>
                </div>
                <!--Page Body part -->
                <div class="small-cards mt-5 mb-4">
                <div class="row">
                    <!-- Col sm 6, col md 6, col lg 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon" align="center" style="opacity: 70%;">
                                        <!-- <i class="far fa-user-circle card-icon-bg-primary fa-4x"></i> -->
                                        <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" class="w-50"></i>
                                    </div>
                                    <!-- Text -->
                                    <a href="{{route('user.admin.harta.listB.Diterima')}}">
                                    <div class="small-card-text w-100 text-center">
                                        <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Harta</p>
                                        <h4 class="font-weight-normal m-0 text-primary">{{$list}}</h4>
                                    </div>
                                  </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Col sm 6, col md 6, col lg 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon" align="center" style="opacity: 70%;">
                                        <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" class="w-50"></i>
                                    </div>
                                    <!-- Text -->
                                    <a href="{{route('user.admin.harta.listC.Diterima')}}">
                                    <div class="small-card-text w-100 text-center">
                                        <p class="font-weight-normal m-0 text-muted">Jumlah Pelupusan Harta</p>
                                        <h4 class="font-weight-normal m-0 text-primary">{{$listC}}</h4>
                                    </div>
                                  </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Col sm 6, col md 6, col lg 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon" align="center" style="opacity: 70%;">
                                        <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" class="w-50"></i>
                                    </div>
                                    <!-- Text -->
                                    <a href="{{route('user.admin.harta.listD.Diterima')}}">
                                    <div class="small-card-text w-100 text-center">
                                        <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Syarikat</p>
                                        <h4 class="font-weight-normal m-0 text-primary">{{$listD}}</h4>
                                    </div>
                                  </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Col sm 6, col md 6, col lg 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <!-- Icon -->
                                    <div class="small-card-icon" align="center" style="opacity: 70%;">
                                        <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" class="w-50"></i>
                                    </div>
                                    <!-- Text -->
                                    <a href="{{route('user.admin.harta.listG.Diterima')}}">
                                    <div class="small-card-text w-100 text-center">
                                        <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Saham</p>
                                        <h4 class="font-weight-normal m-0 text-primary">{{$listG}}</h4>
                                    </div>
                                  </a>
                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>

            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <!-- Small card component -->
                <div class="row mb-4">
                    <!-- Col lg 8, col md 12 -->
                    <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <!-- Card title -->
                                <div class="card-title" align="center">Statistik Perisytiharan Harta </div>
                                <!-- Chart -->
                                <div class="" id="chart-wrap">
                                    <div id="columnchart_values" style="width: 100%; height: 100%;" ></div>
                                </div><!-- <div id="echartBar" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div> -->
                            </div>

                        </div>

                    </div>
                    <!-- Col lg 4, col md 12 -->
                    <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Card title -->
                                <div class="card-title">Statistik Penerimaan Hadiah</div>
                                <!-- Chart -->
                                <div id="donutchart" style="width: 100%; height: 400px;"></div>
                                <!-- <div id="echartPie" style="width:100%;height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div> -->
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Jumlah", { role: "style" } ],
        ["Perisytiharan Harta", {{$listBDiterima}}, "#2ab1fa"],
        ["Pelupusan Harta", {{$listCDiterima}}, "#0082c8"],
        ["Perisytiharan Syarikat", {{$listDDiterima}}, "#a864ba"],
        ["Perisytiharan Saham", {{$listGDiterima}}, "color: #e659b5"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Statistik Perisytiharan Harta",
        width: 400,
        height: 400,
        var: {groupWidth: "98%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

  <script type="text/javascript">
      var nilai_hadiah = <?php echo $nilaiHadiah->nilai_hadiah;?>;
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Hadiah Bernilai lebih RM '+nilai_hadiah, {{$listHadiahA}}],
          ['Hadiah Bernilai RM' +nilai_hadiah+' dan ke bawah', {{$listHadiahB}}]
        ]);

        var options = {
          title: 'Statistik Penerimaan Hadiah',
          pieHole: 0.4,
          colors: ['#fc0fc0','#c020d0','#8432DF','#4743EF','#0B54FE']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>



@endsection
