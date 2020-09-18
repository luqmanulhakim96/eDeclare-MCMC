@extends('user.layouts.app')
@section('content')
<!--Page Body part -->
   <div class="col-md-12 mt-4">
                        <!-- Basic tabs card -->
      <div class="card rounded-lg">
          <div class="card-body">
              <div class="card-title">Laporan Perisytiharan Harta</div>
              <table id="example" class="display" style="width:100%" border="1">
                <thead>
                    <tr>
                        <th style="text-align:center">Julat Nilai Harta</th>
                        <th></th>
                        <th style="text-align:center">Nama Staff</th>
                        <th style="text-align:center">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($listB as $data)
                    <tr>
                        <td> </td>
                        <!-- <td>{{$data ->formbs->name}}</td> -->
                          @if($data->nilai_perolehan <= 500000.00)
                            <td style="text-align:center"><p>0-500000.00</p></td>

                          @elseif($data->nilai_perolehan > 500000.00 && $data->nilai_perolehan <= 1000000.00)
                            <td style="text-align:center"><p>500000.01-1000000.00</p></td>

                          @elseif($data->nilai_perolehan > 1000000.00 && $data->nilai_perolehan <= 2000000.00)
                            <td style="text-align:center"><p>1000000.01-2000000.00</p></td>

                          @elseif($data->nilai_perolehan > 2000000.00 && $data->nilai_perolehan <= 5000000.00)
                            <td style="text-align:center"><p>2000000.01-5000000.00</p></td>

                          @else
                            <td style="text-align:center"><p>Above 5 million</p></td>
                          @endif
                          <td style="text-align:center">{{$data ->formbs->name}}</td>

                        <td style="text-align:center">{{$data ->formbs->jabatan}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
      </div>
    </div>

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
         ],

            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "order": [[ groupColumn, 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                        );

                        last = group;
                    }
                } );
            }

        } );

        // Order by the grouping
        $('#example tbody').on( 'click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                table.order( [ groupColumn, 'desc' ] ).draw();
            }
            else {
                table.order( [ groupColumn, 'asc' ] ).draw();
            }
        } );

    } );

    </script>
@endsection
