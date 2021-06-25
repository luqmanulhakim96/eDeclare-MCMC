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
                               <div class="card-title">Senarai Draf Perisytiharan Harta</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <th width="30%"><p class="mb-0">Nama</p></th>
                                               <th width="30"><p class="mb-0">No Kad Pengenalan</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran</p></th>
                                               <th width="70%"><p class="mb-0">Tarikh</p></th>
                                               <th width="30%"><p class="mb-0">Status</p></th>
                                               <th width="30%"><p class="mb-0">Edit</p></th>
                                               <th width="30%"><p class="mb-0">Padam</p></th>
                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         @if($data->status == "Disimpan ke Draf")
                                         <tr>
                                           <td>{{ $data ->id }}</td>
                                           <td>{{$data->nama_pegawai }}</td>
                                           <td>{{$data->kad_pengenalan }}</td>
                                             <td>
                                               @if($data ->getTable() == "formbs")
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
                                               Lampiran G
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormG.viewformG', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @endif
                                             </td>
                                             <td>{{ $data ->updated_at}}</td>
                                             <td>
                                               @if($data ->status == "Disimpan ke Draf")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @endif
                                             </td>
                                             <td class="p-3">
                                             <div class="d-flex flex-row justify-content-around align-items-center">
                                               @if($data ->getTable() == "formbs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <a href="{{ route('user.harta.FormB.editformB', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                              @elseif($data ->getTable() == "formcs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <a href="{{ route('user.harta.FormC.editformC', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                              @elseif($data ->getTable() == "formds")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <a href="{{ route('user.harta.FormD.editformD', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                              @elseif($data ->getTable() == "formgs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <a href="{{ route('user.harta.FormG.editformG', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                @endif
                                              @endif
                                              </div>
                                             </td>

                                             <td class="p-3">
                                             <div class="d-flex flex-row justify-content-around align-items-center">
                                               @if($data ->getTable() == "formbs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <form action="{{ route('drafharta.delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="form" value="{{$data ->getTable()}}">
                                                    <button type="submit" class="mr-1 btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                @endif
                                              @elseif($data ->getTable() == "formcs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <form action="{{ route('drafharta.delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="form" value="{{$data ->getTable()}}">
                                                    <button type="submit" class="mr-1 btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                @endif
                                              @elseif($data ->getTable() == "formds")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <form action="{{ route('drafharta.delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="form" value="{{$data ->getTable()}}">
                                                    <button type="submit" class="mr-1 btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                @endif
                                              @elseif($data ->getTable() == "formgs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <form action="{{ route('drafharta.delete', $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="form" value="{{$data ->getTable()}}">
                                                    <button type="submit" class="mr-1 btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                @endif
                                              @endif
                                              </div>
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
