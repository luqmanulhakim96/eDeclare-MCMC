@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
        <div class="page-body p-4 text-dark">
          <div class="buttons">
            <a href="{{route('user.admin.harta.listB.senaraiformB')}}"  class="btn btn-light m-2">Sedang Diproses</a>
            <a href="{{route('user.admin.harta.listB.ProsesHOD')}}"class="btn btn-light m-2">Diproses ke Ketua Jabatan Integriti</a>
            <a href="{{route('user.admin.harta.listB.Diterima')}}" class="btn btn-dark m-2">Diterima</a>
            <a href="{{route('user.admin.harta.listB.TidakLengkap')}}"class="btn btn-light m-2">Tidak Lengkap</a>
            <a href="{{route('user.admin.harta.listB.TidakDiterima')}}" class="btn btn-light m-2" >Tidak Diterima</a>
            <a href="{{route('user.admin.harta.listB.upload')}}" class="btn btn-light m-2" >Proses ke Jawatankuasa Tatatertib</a>
          </div>
           <div class="row mt-10">
                   <!-- Col md 6 -->
                   <div class="col-md-12 mt-4" >
                       <!-- basic light table card -->
                       <div class="card rounded-lg" >
                           <div class="card-body">
                               <div class="card-title">Senarai Sejarah Perisytiharan Harta</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <!-- <th width="10%"><p class="mb-0">ID</p></th> -->
                                               <th width="30%"><p class="mb-0">Created At</p></th>
                                               <th width="10%"><p class="mb-0">User ID</p></th>
                                               <th width="10%"><p class="mb-0">Kad Pengenalan</p></th>
                                               <th width="30"><p class="mb-0">Status</p></th>
                                           </tr>
                                       </thead>
                                   </table>
                               </div>

                           </div>
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
                      processing: true,
                      serverSide: true,
                      rowReorder: true,
                      ajax:{
                        url: "{{ route('user.admin.harta.senaraiallharta.process') }}",
                        "dataSrc": ""
                      },
                      columns: [
                          // {data: 'id', name: 'ID'},
                          {data: 'created_at', name: 'Created At'},
                          {data: 'users.name', name: 'Username'},
                          {data: 'users.kad_pengenalan', name: 'Kad Pengenalan'},
                          {data: 'status', name: 'Status'},
                      ],
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
