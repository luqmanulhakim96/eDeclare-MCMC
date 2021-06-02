@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
           <div class="row mt-10">
                   <!-- Col md 6 -->
                   <div class="col-md-12 mt-4" >
                       <!-- basic light table card -->
                       <div class="">
                         <a href="{{route('user.senaraiharta')}}" class="btn btn-primary" name="button">Kembali</a>
                       </div>

                       <br>
                       <div class="card rounded-lg" >
                           <div class="card-body">
                               <div class="card-title">Senarai Sejarah Memohon dan Memiliki Saham</div>
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
                                             <th width="10%"><p class="mb-0">Lampiran E</p></th>
                                             <th width="10%"><p class="mb-0">Tarikh</p></th>
                                             <th width="10%"><p class="mb-0">Status</p></th>
                                             <th width="70%"><p class="mb-0">Catatan</p></th>
                                             <th width="30%"><p class="mb-0">Tindakan</p></th>
                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($listHarta as $data)
                                         @if($data ->status != "Disimpan ke Draf")

                                         <tr>
                                           <td>{{ $data ->id }}</td>
                                           <td>{{$data ->nama_pegawai }}</td>
                                           <td>{{$data ->kad_pengenalan }}</td>
                                             <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormG.viewformG', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td>
                                             <td>{{ $data ->updated_at}}</td>
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
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
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
                                             <td>
                                             @if($data ->status == "Sedang Diproses")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Sedang Dikemaskini")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Proses ke Ketua Bahagian")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Proses ke Pentadbir Sistem(Tatatertib)")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Tidak Lengkap")
                                                @foreach($ulasanAdmin as $admin)
                                                @if($admin->formgs_id == $data->id)
                                                  <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                                                @endif
                                                @endforeach
                                             @elseif($data ->status == "Tidak Diterima")
                                               @foreach($ulasanHOD as $hod)
                                                 @if($hod->formgs_id == $data->id)
                                                   <p> - {{$hod->ulasan_hod}} ( {{$hod->created_at}}) </p>
                                                 @endif
                                               @endforeach
                                             @elseif($data ->status == "Diterima")
                                             {{ $data ->status }}
                                             @elseif($data ->status == "Selesai")
                                             {{ $data ->status }}
                                             @endif
                                             </td>
                                             <td class="p-3">
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                  @if($data ->status == "Sedang Dikemaskini")
                                                     <a href="{{ route('user.harta.FormG.editformG', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                 @elseif($data ->status == "Tidak Lengkap")
                                                 <a href="{{ route('user.harta.FormG.editformG', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                 @elseif($data ->status == "Sedang Diproses")
                                                 <a href="{{ route('statuseditG.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a>
                                                 @else
                                                 <span><button class="btn btn-dark mr-1" disabled><i class="fas fa-pencil-alt"></i></button></span>
                                                 @endif
                                               </div>
                                             </td>
                                             <!-- <td>{{ $data ->gambar_gift  }}</td> -->
                                             <!-- <td><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="profile" class="profile-avatar"></td> -->
                                             <!-- <td><img src="{{ asset('storage/uploads/gambar_hadiah/0nSg30DXJdzDJf6RCbqmeGjoZb9P45lVlw8DRdIe.png' ) }}"></td> -->

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
