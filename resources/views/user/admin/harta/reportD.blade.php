@extends('user.layouts.app')
@section('content')
<!--Page Body part -->
   <div class="col-md-12 mt-4">
                        <!-- Basic tabs card -->
      <div class="card rounded-lg">
          <div class="card-body">
              <div class="card-title">Laporan Perisytiharan Syarikat dan Perniagaan Sendiri</div>
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
                  @foreach($listD as $data)
                    <tr>
                        <td> </td>
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
                          <td style="text-align:center">{{$data ->formds->name}}</td>

                        <td style="text-align:center">{{$data ->formds->jabatan}}</td>
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
        var tableTitle = $('.card-title').html();
        var table = $('#example').DataTable({
             dom: 'Bfrtip',
             "buttons": [
                 {
                     extend: 'excel',
                     orientation: 'landscape',
                     pageSize: 'A4',
                     title: tableTitle,
                 },
                 {
                     extend: 'pdfHtml5',
                     orientation: 'landscape',
                     pageSize: 'A4',
                     title: tableTitle,
                 },
                 {
                     extend: 'print',
                     text: 'Cetak',
                     pageSize: 'LEGAL',
                     title: tableTitle,
                     customize: function(win)
                     {

                         var last = null;
                         var current = null;
                         var bod = [];

                         var css = '@page { size: landscape; }',
                             head = win.document.head || win.document.getElementsByTagName('head')[0],
                             style = win.document.createElement('style');

                         style.type = 'text/css';
                         style.media = 'print';

                         if (style.styleSheet)
                         {
                           style.styleSheet.cssText = css;
                         }
                         else
                         {
                           style.appendChild(win.document.createTextNode(css));
                         }

                         head.appendChild(style);
                  },
                 },
             ],
          "language": {
              "lengthMenu": "Memaparkan _MENU_ rekod per halaman",
              "zeroRecords": "Maaf, tiada rekod.",
              "info": "Memaparkan halaman _PAGE_ daripada _PAGES_",
              "infoEmpty": "Tidak ada rekod yang tersedia",
              "infoFiltered": "(Ditapis dari _MAX_ jumlah rekod)",
              "search": "Carian",
              "previous": "Sebelum",
              "paginate": {
                  "first":      "Pertama",
                  "last":       "Terakhir",
                  "next":       "Seterusnya",
                  "previous":   "Sebelumnya"
              },
          },
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
