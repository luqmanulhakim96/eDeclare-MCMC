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
                      <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                        <!-- Table head -->
                        <thead class="thead-light">
                            <tr>
                              <th class="all">Nama Pengguna</th>
                              <th class="all">IP Address</th>
                              <th class="all">Timestamp</th>
                              <th class="all">Role</th>
                              <th class="all">Event</th>
                              <th class="all">Database</th>
                              <th class="all">Data Lama</th>
                              <th class="all">Data Baharu</th>
                              <th class="all">URL</th>
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

                              <td>{{ $datas->ip_address }}</td>
                              <td>{{  Carbon\Carbon::parse($datas->updated_at)->format('d-m-Y h:i:s')  }}</td>
                              @if($datas->user->role == 1)
                                <td> Pentadbir Sistem (Admin) </td>
                              @elseif($datas->user->role == 2)
                                <td> Ketua Jabatan Integriti </td>
                              @elseif($datas->user->role == 3)
                                <td> Ketua Bahagian </td>
                              @elseif($datas->user->role == 4)
                                <td> IT Admin </td>
                              @elseif($datas->user->role == 5)
                                <td> Pengguna </td>
                              @endif
                              <td>{{  ucfirst($datas->event) }}</td>
                              <td>{{ substr($datas->auditable_type, strpos($datas->auditable_type, "/") + 4) }}</td>
                              @if( $datas->old_values == "[]")
                                <td>-</td>

                              @else
                              <table>
                                @foreach(explode(',', $datas->old_values) as $info)
                                  <tr>
                                    <td>{{  preg_replace('/[{}]/',"",$info) }}</td>
                                  </tr>
                                @endforeach
                              </table>
                              @endif
                              @if( $datas->new_values == "[]")
                                <td>-</td>
                              @else
                              <td>
                              <table>
                                @foreach(explode(',', $datas->new_values) as $info)
                                  <tr>
                                    <td>{{  preg_replace('/[{}]/',"",$info) }}</td>
                                  </tr>
                                @endforeach
                              </table>
                              </td>
                              @endif
                              <td>{{ $datas->url }}</td>
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
