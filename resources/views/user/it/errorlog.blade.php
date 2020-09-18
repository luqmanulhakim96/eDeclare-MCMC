@extends('user.layouts.app')
@section('content')
<div class="col-md-12 mt-4">
      <!-- Light Bordered Table card -->
      <div class="card rounded-lg">
              <!-- Table -->
              <div class="table-responsive" >
                  <table class="table table-bordered" id="example">
                      <thead>
                          <tr class="text-center">
                              <th width="10%"><p class="mb-0">#</p></th>
                              <th width="50%"><p class="mb-0">Nama</p></th>
                              <th width="55%"><p class="mb-0">No Kad Pengenalan</p></th>
                              <th width="30%"><p class="mb-0">Jabatan</p></th>
                              <th width="30%"><p class="mb-0">Jawatan</p></th>
                              <th width="30%"><p class="mb-0">Status</p></th>
                              <th width="50%"><p class="mb-0">Edit</p></th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Table data -->
                          <tr class="text-center">
                              <td><p class="mb-0 font-weight-bold">1</p></td>
                              <td><p class="mb-0 font-weight-normal">Muhammad Syahdan</p></td>
                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                              <td><p class="mb-0 font-weight-normal">IT</p></td>
                              <td><p class="mb-0 font-weight-normal">Admin</p></td>
                              <td><span class="badge badge-success badge-pill">Aktif</span></td>
                              <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                          </tr>

                          <!-- Table data -->
                          <tr class="text-center">
                              <td><p class="mb-0 font-weight-bold">2</p></td>
                              <td><p class="mb-0 font-weight-normal">Muhammad Hafiz</p></td>
                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                              <td><p class="mb-0 font-weight-normal">HR</p></td>
                              <td><p class="mb-0 font-weight-normal">User</p></td>
                              <td><span class="badge badge-success badge-pill">Aktif</span></td>
                              <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                          </tr>

                          <!-- Table data -->
                          <tr class="text-center">
                              <td><p class="mb-0 font-weight-bold">3</p></td>
                              <td><p class="mb-0 font-weight-normal">Muhammad Amirul</p></td>
                              <td><p class="mb-0 font-weight-normal">971112065055</p></td>
                              <td><p class="mb-0 font-weight-normal">IT</p></td>
                              <td><p class="mb-0 font-weight-normal">Integrity HOD</p></td>
                              <td><span class="badge badge-danger badge-pill">Tidak Aktif</span></td>
                              <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="#" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                      <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                          </tr>

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
           ]
           } );
       } );
       </script>
@endsection
