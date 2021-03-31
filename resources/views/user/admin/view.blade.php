@extends('user.layouts.app')
@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                  <div class="card-body">
                        <div class="card-title" align="center"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                  </div>
                </div>
            <!--Page Body part -->
            <div class="small-cards mt-5 mb-4">
            <div class="row" style="justify-content: space-around;">
                <!-- Col sm 6, col md 6, col lg 3 -->
                <div class="col-sm-6 col-md-6 col-lg-1 mt-3 mt-lg-0">
                    <!-- Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <!-- Card -->
                    <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card3.png') }}); background-repeat: no-repeat; background-position: 33% 67%; ">
                        <!-- Card body -->
                        <div class="card-body">

                            <a href="{{route('user.admin.harta.senaraiallharta')}}">
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <!-- Icon -->
                                <div class="small-card-icon" align="center" style="opacity: 70%;">
                                    <!-- <i class="far fa-user-circle card-icon-bg-primary fa-4x"></i> -->
                                    <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" style="width:35%; height:35%;"></i>
                                </div>
                                <!-- Text -->
                                <div class="small-card-text w-100 text-center">
                                    <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Harta</p>
                                    <h4 class="font-weight-normal m-0 text-primary">{{$list}}</h4>
                                </div>
                            </div>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Col sm 6, col md 6, col lg 3 -->
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <!-- Card -->
                    <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card4.png') }}); background-repeat: no-repeat; background-position: 33% 71%; ">
                        <!-- Card body -->
                        <div class="card-body">

                          <a href="{{route('user.admin.harta.senaraiallharta')}}">
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <!-- Icon -->
                                <div class="small-card-icon" align="center" style="opacity: 70%;">
                                    <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img"  style="width:35%; height:35%;"></i>
                                </div>
                                <!-- Text -->

                                <div class="small-card-text w-100 text-center">
                                    <p class="font-weight-normal m-0 text-muted">Jumlah Pelupusan Harta</p>
                                    <h4 class="font-weight-normal m-0 text-primary">{{$listC}}</h4>
                                </div>

                            </div>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Col sm 6, col md 6, col lg 3 -->
                <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                    <!-- Card -->
                    <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card1.png') }}); background-repeat: no-repeat; background-position: 33% 64%; ">
                        <!-- Card body -->
                        <div class="card-body">

                          <a href="{{route('user.admin.harta.senaraiallharta')}}">
                            <div class="d-flex flex-row justify-content-center align-items-center">
                                <!-- Icon -->
                                <div class="small-card-icon" align="center" style="opacity: 70%;">
                                    <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" style="width:35%; height:35%;"></i>
                                </div>
                                <!-- Text -->

                                <div class="small-card-text w-100 text-center">
                                    <p class="font-weight-normal m-0 text-muted">Jumlah Perisytiharan Syarikat</p>
                                    <h4 class="font-weight-normal m-0 text-primary">{{$listD}}</h4>
                                </div>

                            </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-1 mt-3 mt-lg-0">
                    <!-- Card -->
                </div>

              </div>
              </div>
              <div class="small-cards mt-5 mb-4">
              <div class="row" style="justify-content: space-around;">
                  <!-- Col sm 6, col md 6, col lg 3 -->
                  <div class="col-sm-6 col-md-6 col-lg-1 mt-3 mt-lg-0">
                      <!-- Card -->
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                      <!-- Card -->
                      <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card2.png') }}); background-repeat: no-repeat; background-position: 33% 67%; ">
                          <!-- Card body -->
                          <div class="card-body">

                            <a href="{{route('user.admin.harta.senaraiallharta')}}">
                              <div class="d-flex flex-row justify-content-center align-items-center">
                                  <!-- Icon -->
                                  <div class="small-card-icon" align="center" style="opacity: 70%;">
                                      <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" style="width:35%; height:35%;"></i>
                                  </div>
                                  <!-- Text -->

                                  <div class="small-card-text w-100 text-center">
                                      <p class="font-weight-normal m-0 text-muted" style="font-size:95%" >Jumlah Perisytiharan Saham</p>
                                      <h4 class="font-weight-normal m-0 text-primary">{{$listG}}</h4>
                                  </div>

                              </div>
                              </a>

                          </div>
                      </div>
                  </div>
                  <!-- Col sm 6, col md 6, col lg 3 -->
                  <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                      <!-- Card -->
                      <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card3.png') }}); background-repeat: no-repeat; background-position: 33% 67%; ">
                          <!-- Card body -->
                          <div class="card-body">

                            <a href="{{route('user.admin.hadiah.HadiahA.listDiterima')}}">
                              <div class="d-flex flex-row justify-content-center align-items-center">
                                  <!-- Icon -->
                                  <div class="small-card-icon" align="center" style="opacity: 70%;">
                                      <!-- <i class="far fa-user-circle card-icon-bg-primary fa-4x"></i> -->
                                      <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img" style="width:35%; height:35%;"></i>
                                  </div>
                                  <!-- Text -->

                                  <div class="small-card-text w-100 text-center">
                                      <p class="font-weight-normal m-0 text-muted">Jumlah Penerimaan Hadiah A</p>
                                      <h4 class="font-weight-normal m-0 text-primary">{{$listHadiahA}}</h4>
                                  </div>

                              </div>
                              </a>

                          </div>
                      </div>
                  </div>

                  <!-- Col sm 6, col md 6, col lg 3 -->
                  <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0">
                      <!-- Card -->
                      <div class="card border rounded-lg" style="background-image: url({{ asset('qbadminui/design/card4.png') }}); background-repeat: no-repeat; background-position: 33% 71%; ">
                          <!-- Card body -->
                          <div class="card-body">

                            <a href="{{route('user.admin.hadiah.HadiahB.listDiterima')}}">
                              <div class="d-flex flex-row justify-content-center align-items-center">
                                  <!-- Icon -->
                                  <div class="small-card-icon" align="center" style="opacity: 70%;">
                                      <i><img src="{{ asset('qbadminui/img/prize_A icon.png') }}" alt="img" style="width:35%; height:35%;"></i>
                                  </div>
                                  <!-- Text -->

                                  <div class="small-card-text w-100 text-center">
                                      <p class="font-weight-normal m-0 text-muted">Jumlah Penerimaan Hadiah B</p>
                                      <h4 class="font-weight-normal m-0 text-primary">{{$listHadiahB}}</h4>
                                  </div>

                              </div>
                              </a>

                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-1 mt-3 mt-lg-0">
                      <!-- Card -->
                  </div>
            </div>
            </div>
            <div class="page-body p-4 text-dark">

                <div class="row">
                    <!-- Col lg 8, col md 12 -->
                    <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="row">
                          <div class="card border rounded-lg">
                              <!-- Card body -->
                              <div class="card-body" style="width:100%;">

                                  <!-- Card title -->
                                  <div class="card-title" align="center">Statistik Perisytiharan Harta </div>
                                  <!-- Chart -->
                                  <center>
                                  <div class="" id="chart-wrap">
                                      <div id="columnchart_value" style="width: 380px; height:400px;" ></div>
                                  </div>
                                </center>
                            </div>
                          </div>
                          </div>

                          <div class="row" style="padding-top: 4%;">
                            <div class="card border rounded-lg">
                              <!-- Card body -->
                              <div class="card-body" style="width: 100%;">
                                  <!-- Card title -->
                                  <div class="card-title" align="center">Statistik Penerimaan Hadiah</div>
                                  <!-- Chart -->
                                  <center>
                                  <div id="donutchart" style="width: 380px; height: 400px;"></div>
                                </center>
                                  <!-- <div id="echartPie" style="width:100%;height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div> -->
                              </div>
                            </div>
                          </div>



                    </div>
                    <!-- Col lg 4, col md 12 -->
                    <div class="col-lg-8 col-md-4 mt-4 mt-lg-0">
                            <!-- Col lg 8, col md 12 -->
                            <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
                                <!-- Card -->
                                <div class="card border rounded-lg" >
                                    <!-- Card body -->
                                    <div class="card-body" align="center">

                                        <!-- Card title -->
                                        <div class="card-title" align="center">Statistik Pegawai Yang Telah Mengisytihar dan Tidak Mengisytihar Harta/Hadiah</div><br><br>
                                        <!-- Chart -->
                                          <div id="columnchart_material" style="width: 100%; height: 860px;"></div>
                                        <!-- <div id="echartBar" style="height: 300px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;"></div> -->
                                    </div>

                                </div>

                            </div>

                    </div>

                </div>
            </div>
</div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['','Bilangan Pegawai Yang Telah Mengisytihar', 'Bilangan Pegawai Yang Belum Mengisytihar'],
          ['Perisytiharan Harta', {{$pegawai_dah_declare_Bs[0]->data}}, {{$undeclareB}}],
          ['Pelupusan Harta', {{$pegawai_dah_declare_Cs[0]->data}}, {{$undeclareC}}],
          ['Perisytiharan Syarikat', {{$pegawai_dah_declare_Ds[0]->data}}, {{$undeclareD}}],
          ['Perisytiharan Saham', {{$pegawai_dah_declare_Gs[0]->data}}, {{$undeclareG}}],
          [' Hadiah A', {{$pegawai_gift_declare[0]->data}}, {{$undeclareGift}}],
          [' Hadiah B', {{$pegawai_giftb_declare[0]->data}}, {{$undeclareGiftB}}]
        ]);

        var options = {
          width: 730,
          backgroundColor: {
           fill: '#efefef',
           // fillOpacity: 0.1
         },

         chartArea: {
        backgroundColor: {
          fill: '#efefef',
          // fillOpacity: 0.1
        },
      },

          legend: {
            position: 'none' ,

        },
          // chart: { title: 'Chess opening moves',
          //          subtitle: 'popularity by percentage' },
          bars: 'vertical', // Required for Material Bar Charts.
          // axes: {
          //   x: {
          //     0: { side: 'top', label: 'Percentage'} // Top x-axis.
          //   }
          // },
          colors: ['#5F9FFF','#FFDB61'],
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Lampiran", "Jumlah", { role: "style" } ],
        ["Perisytiharan Harta", {{$listBDiterima}}, "#5F9FFF"],
        ["Pelupusan Harta", {{$listCDiterima}}, "#FFDB61"],
        ["Perisytiharan Syarikat", {{$listDDiterima}}, "#5F9FFF"],
        ["Perisytiharan Saham", {{$listGDiterima}}, "#FFDB61"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        backgroundColor: {
         fill: '#efefef',
         // fillOpacity: 0.1
       },

        chartArea: {
       backgroundColor: {
         fill: '#efefef',
         // fillOpacity: 0.1
       },
     },
        // title: "Statistik Perisytiharan Harta",
        width: 380,
        height: 400,
        var: {groupWidth: "98%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_value"));
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
          fill: '#000',

          backgroundColor: {
           fill: '#efefef',
           // fillOpacity: 0.1
         },

          chartArea: {
         backgroundColor: {
           fill: '#efefef',
           // fillOpacity: 0.1
         },
       },
          // title: 'Statistik Penerimaan Hadiah',
          pieHole: 0.4,
          colors: ['#5F9FFF','#FFDB61']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>




@endsection
