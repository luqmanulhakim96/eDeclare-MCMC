@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
        <div class="page-body p-4 text-dark">

           <div class="row mt-10">
                   <!-- Col md 6 -->
                   <div class="col-md-12 mt-4" >
                       <!-- basic light table card -->
                       <div class="card rounded-lg" >
                           <div class="card-body">
                               <div class="card-title">Senarai Perisytiharan Mengikut Pengguna</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <!-- <th width="10%"><p class="mb-0">ID</p></th> -->
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <th><p class="mb-0">Nama</p></th>
                                               <th><p class="mb-0">Link</p></th>
                                           </tr>
                                       </thead>
                                   </table>

                               </div>

                           </div>
                       </div>
                   </div>
                 </div>
             </div>
             <br><br><br><br>
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
                      processing: true,
                      serverSide: true,
                      ajax: "{{route('user.admin.senarai_user_declaration.ajax')}}",
                      columns: [
                         { data: 'id' },
                         { data: 'name',
                              "render": function(data, type, row, meta){
                              if(type === 'display'){
                                  data = '<a href="' + row.link + '">' + data + '</a>';
                              }
                              return data;
                            }
                         },
                         { data: 'link' }
                      ],
                      columnDefs: [
                          {
                              "targets": [ 2 ],
                              "visible": false,
                              "searchable": false
                          },
                      ],
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
