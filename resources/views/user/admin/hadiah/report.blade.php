@extends('user.layouts.app')
@section('content')

      <div class="page-body p-4 text-dark">
            <div class="card rounded-lg">
              <div class="card-body">
                    <div class="card-titleuser" align="center"><b>Laporan Penerimaan Hadiah</b></div>
              </div>
            </div>
            <div class="page-body p-4 text-dark">

                <div class="row mb-4">
                    <!-- Col lg 8, col md 12 -->
                    <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                        <!-- Card -->
                        <div class="card border-0 rounded-lg">
                            <!-- Card body -->
                            <div class="card-body">

                                <!-- Card title -->
                                <div align="center">Statistik Penerimaan Hadiah Bernilai Lebih Daripada RM {{$nilaiHadiah->nilai_hadiah}} dan Bernilai RM {{$nilaiHadiah->nilai_hadiah}} Kebawah </div>
                                <!-- Chart -->
                                <div class="" id="chart-wrap">
                                    <div id="columnchart_values" style="width: 100%; height: 400px;" ></div>
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
                                <div align="center">Statistik Penerimaan Hadiah Mengikut Jenis Hadiah Yang Diterima</div><br>
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
                                                <div class="card-title">Senarai Penerimaan Hadiah</div>
                                                <!-- Description -->
                                                <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                                                <!-- Table -->
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="example1" style="width: 100%;">
                                                        <thead class="thead-light">
                                                            <tr class="text-center">
                                                                <th width="10%"><p class="mb-0">ID</p></th>
                                                                <!-- <th width="30%"><p class="mb-0">No Staff</p></th> -->
                                                                <th width="30"><p class="mb-0">Nama</p></th>
                                                                <th width="10%"><p class="mb-0">Jabatan</p></th>
                                                                <th width="70%"><p class="mb-0">Jenis Hadiah</p></th>
                                                                <th width="30%"><p class="mb-0">Nilai Hadiah</p></th>
                                                                <th width="30%"><p class="mb-0">Tarikh Perisytiharan</p></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody align="center">
                                                          @foreach($listHadiah as $data)
                                                          <tr>
                                                              <td>{{ $data ->id }}</td>
                                                              <!-- <td>{{ $data ->gifts->kad_pengenalan }}</td> -->
                                                              <td>{{ $data ->gifts->name }}</td>
                                                              <td>{{ $data ->jabatan}}</td>
                                                              <td>{{ $data ->jenis_gift}}</td>
                                                              <td>{{ $data ->nilai_gift}}</td>
                                                              <td>{{ $data ->created_at}}</td>
                                                            </tr>
                                                           @endforeach
                                                           @foreach($listHadiahBs as $data)
                                                           <tr>
                                                               <td>{{ $data ->id }}</td>
                                                               <!-- <td>{{ $data ->giftbs->kad_pengenalan }}</td> -->
                                                               <td>{{ $data ->giftbs->name }}</td>
                                                               <td>{{ $data ->jabatan}}</td>
                                                               <td>{{ $data ->jenis_gift}}</td>
                                                               <td>{{ $data ->nilai_gift}}</td>
                                                               <td>{{ $data ->created_at}}</td>
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
                </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  var nilai_hadiah = <?php echo $nilaiHadiah->nilai_hadiah;?>;
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Jumlah", { role: "style" } ],
        ["Hadiah > RM "+nilai_hadiah, {{$listHadiahA}}, "#89cff0"],
        ["Hadiah <= RM "+nilai_hadiah, {{$listHadiahB}}, "#00468b"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        // title: "Statistik Penerimaan Hadiah Bernilai Lebih Daripada RM {{$nilaiHadiah->nilai_hadiah}} dan Bernilai RM {{$nilaiHadiah->nilai_hadiah}} Kebawah ",
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
      var sites= @json($hadiah);
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
          data.addColumn('string', 'Jenis Hadiah');
          data.addColumn('number', 'Jumlah Penerimaan');
          if(sites == null){
            data.addRows([
              ['Tiada data',1]
            ]);

          }else{

          for( var i=0; i < sites.length; i++)
          {
            data.addRows([
              [sites[i]['jenis_gift'],sites[i]['count']],
            ])

          }
        }

        var options = {
          // title: 'Statistik Penerimaan Hadiah Mengikut Jenis Hadiah Yang Diterima',
          pieHole: 0.4,
          colors: ['#89cff0','#00468b','#7a8ea7']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        var buttonCommon = {
          exportOptions: {
               // Any other settings used
               grouped_array_index: 0,
          },
        };
        var groupColumn = 1;
        var table = $('#example').DataTable({
             dom: 'Bfrtip',
             buttons: [
             $.extend( true, {}, buttonCommon, {
                 extend: 'copyHtml5'
             } ),
             $.extend( true, {}, buttonCommon, {
                 extend: 'excelHtml5'
             } ),
             $.extend( true, {}, buttonCommon, {
                 extend: 'pdfHtml5'
             } )
         ]
         } );
     } );
     </script>

     <script type="text/javascript">
     $(document).ready(function() {
         var buttonCommon = {
           exportOptions: {
                // Any other settings used
                grouped_array_index: 0,
           },
         };
         var groupColumn = 1;
         var table = $('#example1').DataTable({
              dom: 'Bfrtip',
              buttons: [
              $.extend( true, {}, buttonCommon, {
                  extend: 'copyHtml5'
              } ),
              $.extend( true, {}, buttonCommon, {
                  extend: 'excelHtml5'
              } ),
              $.extend( true, {}, buttonCommon, {
                  extend: 'pdfHtml5'
              } )
          ]
          } );
      } );
      </script>



@endsection
