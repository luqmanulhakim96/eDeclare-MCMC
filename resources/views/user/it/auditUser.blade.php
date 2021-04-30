@extends('user.layouts.app')
@section('content')
            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <!-- <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small> -->
                </div>
                <!-- Small card component -->
                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Audit Trail</div>
                      <a class="btn btn-primary mb-2" href="{{route('user.it.audit')}}">Audit Sistem</a>

                      <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                        <!-- Table head -->
                        <thead class="thead-light">
                            <tr>
                              <th class="all">Nama Pengguna</th>
                              <th class="all">Peranan</th>
                              <th class="all">Alamat IP</th>
                              <th class="all">Masa</th>
                              <th class="all">Pengkalan Data</th>
                              <th class="all">Acara</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                          @foreach($data as $datas)
                            @if( $datas->user_id != NULL)
                            <tr>
                            @if($datas->user->name == NULL)
                            <td>Tiada</td>
                            @else
                            <td>{{  ucfirst($datas->user->name) }}</td>
                            @endif
                            @if($datas->user->role == 1)
                            <td> Pentadbir Sistem (Admin) </td>
                            @elseif($datas->user->role == 2)
                            <td> Integrity HOD </td>
                            @elseif($datas->user->role == 3)
                            <td> Pegawai HR </td>
                            @elseif($datas->user->role == 4)
                            <td> Pegawai Admin </td>
                            @elseif($datas->user->role == 5)
                            <td> Pegawai HR </td>
                            @endif
                            <td>{{ $datas->ip_address }}</td>
                            <td>{{  Carbon\Carbon::parse($datas->updated_at)->format('M-d-Y h:i:s')  }}</td>
                            <td>{{ substr($datas->auditable_type, strpos($datas->auditable_type, "/") + 4) }}</td>

                            @if($datas->event == "Log Masuk")
                            <td><span class="badge m-1 badge-success" style="font-size:12px;">Log Masuk</span></td>
                            @else
                            <td><span class="badge m-1 badge-warning" style="font-size:12px;">Log Keluar</span></td>
                            @endif
                          </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

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
                 } );
             } );
             </script>
@endsection
