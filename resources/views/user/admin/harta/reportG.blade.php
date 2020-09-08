@extends('user.layouts.app')
@section('content')
<!--Page Body part -->
   <div class="col-md-12 mt-4">
                        <!-- Basic tabs card -->
      <div class="card rounded-lg">
          <div class="card-body">
              <div class="card-title">Laporan Pelupusan Harta</div>
              <table id="example" class="display" style="width:100%" border="1">
        <thead>
            <tr>
                <th>Julat Nilai Harta</th>
                <th>Range</th>
                <th>Nama Staff</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
          @foreach($listG as $data)
            <tr>
                <td> </td>

                  @if($data->nilai_saham <= 500000.00)
                    <td><p>0-500000.00</p></td>

                  @elseif($data->nilai_saham > 500000.00 && $data->nilai_saham <= 1000000.00)
                    <td><p>500000.01-1000000.00</p></td>

                  @elseif($data->nilai_saham > 1000000.00 && $data->nilai_saham <= 2000000.00)
                    <td><p>1000000.01-2000000.00</p></td>

                  @elseif($data->nilai_saham > 2000000.00 && $data->nilai_saham <= 5000000.00)
                    <td><p>2000000.01-5000000.00</p></td>

                  @else
                    <td><p>Above 5 million</p></td>
                  @endif
                  <td>{{$data ->formgs->name}}</td>

                <td>{{$data ->formgs->jabatan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

          </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
    var groupColumn = 1;
    var table = $('#example').DataTable({
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
