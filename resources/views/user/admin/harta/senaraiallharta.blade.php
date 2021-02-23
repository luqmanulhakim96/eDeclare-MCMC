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
                               <div class="card-title">Senarai Sejarah Perisytiharan Harta</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <!-- <th><p class="mb-0">No Staff</p></th> -->
                                               <th><p class="mb-0">Nama</p></th>
                                               <th><p class="mb-0">Lampiran</p></th>
                                               <th><p class="mb-0">Tarikh</p></th>
                                               <th><p class="mb-0">Status</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         @if($data->status != 'Disimpan ke Draf'|| $data->status == 'Lampiran A')
                                         <tr>
                                            <td>{{ $data ->id}}</td>
                                            <td>{{ $data ->users ->name}}</td>

                                             <td>
                                               @if($data ->getTable() == "assets")
                                               Lampiran A
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.perakuanharta.viewformA', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formbs")
                                               Lampiran B
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formcs")
                                               Lampiran C
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormC.viewformC', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formds")
                                               Lampiran D
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormD.viewformD', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formgs")
                                               Lampiran E
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormG.viewformG', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @endif
                                             </td>

                                             <td>{{ $data ->created_at}}</td>
                                             <td>
                                               @if($data ->status == "Sedang Diproses")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Sedang Dikemaskini")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Bahagian")
                                               <span class="badge badge-warning badge-pill">Proses ke Ketua Jabatan</span>
                                               @elseif($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Pentadbir Sistem(Tatatertib)")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Lengkap")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Diterima")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Diterima")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Selesai")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Lampiran A")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                               @endif
                                             </td>
                                           </tr>
                                           @endif
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
