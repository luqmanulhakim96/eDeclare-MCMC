@extends('user.layouts.app')

@section('content')
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<div class="page-body p-4 text-dark">

  <!-- Small card component -->
  <div class="small-cards mt-5 mb-4">
      <div class="row">
          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormB.senaraihartaB')}}">
              <!-- Card -->
              <div class="card border-1 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" width="20%"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center" >
                              <!-- <p class="font-weight-normal m-0 text-muted">Lampiran B:</p> -->
                              <p class="font-weight-normal m-0 text-primary" style="font-size:70%">Senarai Perisytiharan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>

          <!-- Col sm 6, col md 6, col lg 3 -->
          <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormC.senaraihartaC')}}">
              <!-- Card -->
              <div class="card border-1 rounded-lg">
                  <!-- Card body -->
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <!-- Icon -->
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" width="20%"></i>
                          </div>
                          <br>
                          <!-- Text -->
                          <div class="small-card-text w-100 text-center">
                              <!-- <p class="font-weight-normal m-0 text-muted">Lampiran C:</p> -->
                              <p class="font-weight-normal m-0 text-primary" style="font-size:70%">Senarai Pelupusan Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a>
      <br>
      <!-- Col sm 6, col md 6, col lg 3 -->
      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormD.senaraihartaD')}}">
          <!-- Card -->
          <div class="card border-1 rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" width="20%"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center" >
                          <!-- <p class="font-weight-normal m-0 text-muted">Lampiran D:</p> -->
                          <p class="font-weight-normal m-0 text-primary" style="font-size:70%">Senarai Perisytiharan Syarikat</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>

      <a class="col-sm-6 col-md-6 col-lg-3 mt-4 mt-lg-0" href="{{route('user.harta.FormG.senaraihartaG')}}">
          <!-- Card -->
          <div class="card border-1 rounded-lg">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-column justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon" align="center">
                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" width="20%"></i>
                      </div>
                      <br>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center" >
                          <!-- <p class="font-weight-normal m-0 text-muted">Lampiran G:</p> -->
                          <p class="font-weight-normal m-0 text-primary" style="font-size:70%">Senarai Memohon dan Memiliki Saham</p>
                      </div>
                  </div>

              </div>
          </div>
      </a>
  </div>
  </div>

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
                          <th><p class="mb-0">Catatan</p></th>
                          <th><p class="mb-0">Tindakan</p></th>


                      </tr>
                  </thead>
                  <tbody align="center">
                    @foreach($merged as $data)
                    @if($data->status != 'Disimpan ke Draf' || $data->status == 'Lampiran A')
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
                          Lampiran G
                          <div class="d-flex flex-row justify-content-around align-items-center">
                              <a href="{{ route('user.harta.FormG.viewformG', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                          </div>
                          @endif
                        </td>

                        <td>{{ $data ->created_at}}</td>
                        <td>
                          @if($data ->status == "Sedang Diproses")
                          <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Sedang Dikemaskini")
                          <span class="badge badge-warning badge-pill">Permohonan Kemaskini Diluluskan</span>
                          @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                          <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                          <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Proses ke Ketua Bahagian")
                          <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                          <span class="badge badge-warning badge-pill">Proses ke Ketua Jabatan Integriti</span>
                          @elseif($data ->status == "Tidak Lengkap")
                          <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Tidak Diterima")
                          <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Diterima")
                          <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == "Selesai")
                          <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                          @elseif($data ->status == 'Lampiran A')
                          <span class="badge badge-success badge-pill">Berjaya</span>
                          @endif
                        </td>
                        <td>

                        @if($data ->status == "Sedang Diproses")
                        {{ $data ->status }}
                        @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                        {{ $data ->status }}
                        @elseif($data ->status == "Sedang Dikemaskini")
                        Permohonan Kemaskini Diluluskan
                        @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                        {{ $data ->status }}
                        @elseif($data ->status == "Proses ke Ketua Bahagian")
                        {{ $data ->status }}
                        @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                        {{ $data ->status }}
                        @elseif($data ->status == "Proses ke Pentadbir Sistem(Tatatertib)")
                        {{ $data ->status }}
                        @elseif($data ->status == "Tidak Lengkap")
                          @if($data ->getTable() == "formbs")
                             @foreach($ulasanAdmin as $admin)
                             @if($admin->formbs_id == $data->id)
                               <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                             @endif
                             @endforeach
                          @elseif($data ->getTable() == "formcs")
                            @foreach($ulasanAdmin as $admin)
                            @if($admin->formcs_id == $data->id)
                              <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                            @endif
                            @endforeach
                          @elseif($data ->getTable() == "formds")
                            @foreach($ulasanAdmin as $admin)
                            @if($admin->formds_id == $data->id)
                              <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                            @endif
                            @endforeach
                          @elseif($data ->getTable() == "formgs")
                            @foreach($ulasanAdmin as $admin)
                            @if($admin->formgs_id == $data->id)
                              <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                            @endif
                            @endforeach
                          @endif
                        @elseif($data ->status == "Tidak Diterima")
                          @if($data ->getTable() == "formbs")
                             @foreach($ulasanHOD as $hod)
                             @if($hod->formbs_id == $data->id)
                               <p> - {{$hod->ulasan_hod}} ( {{$hod->created_at}}) </p>
                             @endif
                             @endforeach
                          @elseif($data ->getTable() == "formcs")
                            @foreach($ulasanHOD as $hod)
                            @if($hod->formcs_id == $data->id)
                              <p> - {{$hod->ulasan_hod}} ( {{$hod->created_at}}) </p>
                            @endif
                            @endforeach
                          @elseif($data ->getTable() == "formds")
                            @foreach($ulasanHOD as $hod)
                            @if($admin->formds_id == $data->id)
                              <p> - {{$admin->ulasan_hod}} ( {{$hod->created_at}}) </p>
                            @endif
                            @endforeach
                          @elseif($data ->getTable() == "formgs")
                            @foreach($ulasanHOD as $hod)
                            @if($hod->formgs_id == $data->id)
                              <p> - {{$hod->ulasan_hod}} ( {{$hod->created_at}}) </p>
                            @endif
                            @endforeach
                          @endif
                        @elseif($data ->status == "Diterima")
                        {{ $data ->status }}
                        @elseif($data ->status == "Selesai")
                        {{ $data ->status }}
                        @endif
                        </td>
                        <td>
                          @if($data ->getTable() == "formbs")
                          <div class="d-flex flex-row justify-content-around align-items-center">
                            @if($data ->status == "Sedang Dikemaskini")
                             <a href="{{ route('user.harta.FormB.editformB', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Tidak Lengkap")
                             <a href="{{ route('user.harta.FormB.editformB', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Sedang Diproses")
                             <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#saveb{{$data->id}}" >Permohonan Mengemaskini</button>
                             <div class="modal fade" id="saveb{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-sm" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                     <p align="center">Adakah anda ingin membuat permohonan mengemaskini lampiran?</p>
                                     </div>
                                     <div class="modal-footer">
                                     <a href="{{ route('statuseditB.update',$data->id)}}" class="btn btn-danger">Ya</a>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                     </div>
                                 </div>
                                 </div>
                             </div>
                             <!-- <a href="{{ route('statuseditB.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a> -->
                             @else
                             <span><button class="btn btn-dark mr-1" disabled><i class="fas fa-pencil-alt"></i></button></span>
                             @endif
                           </div>

                           @elseif($data ->getTable() == "formcs")
                           <div class="d-flex flex-row justify-content-around align-items-center">
                             @if($data ->status == "Sedang Dikemaskini")
                               <a href="{{ route('user.harta.FormC.editformC', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Tidak Lengkap")
                              <a href="{{ route('user.harta.FormC.editformC', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Sedang Diproses")
                             <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#savec{{$data->id}}" >Permohonan Mengemaskini</button>
                             <div class="modal fade" id="savec{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-sm" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                     <p align="center">Adakah anda ingin membuat permohonan mengemaskini lampiran?</p>
                                     </div>
                                     <div class="modal-footer">
                                     <a href="{{ route('statuseditC.update',$data->id)}}" class="btn btn-danger">Ya</a>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                     </div>
                                 </div>
                                 </div>
                             </div>
                              <!-- <a href="{{ route('statuseditC.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a> -->
                             @else
                             <span><button class="btn btn-dark mr-1" disabled><i class="fas fa-pencil-alt"></i></button></span>
                            @endif
                           </div>

                           @elseif($data ->getTable() == "formds")
                           <div class="d-flex flex-row justify-content-around align-items-center">
                             @if($data ->status == "Sedang Dikemaskini")
                               <a href="{{ route('user.harta.FormD.editformD', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Tidak Lengkap")
                             <a href="{{ route('user.harta.FormD.editformD', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Sedang Diproses")
                             <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#saved{{$data->id}}" >Permohonan Mengemaskini</button>
                             <div class="modal fade" id="saved{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-sm" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                     <p align="center">Adakah anda ingin membuat permohonan mengemaskini lampiran?</p>
                                     </div>
                                     <div class="modal-footer">
                                     <a href="{{ route('statuseditD.update',$data->id)}}" class="btn btn-danger">Ya</a>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                     </div>
                                 </div>
                                 </div>
                             </div>
                             <!-- <a href="{{ route('statuseditD.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a> -->
                             @else
                             <span><button class="btn btn-dark mr-1" disabled><i class="fas fa-pencil-alt"></i></button></span>
                             @endif
                           </div>

                           @elseif($data ->getTable() == "formgs")
                           <div class="d-flex flex-row justify-content-around align-items-center">
                              @if($data ->status == "Sedang Dikemaskini")
                                 <a href="{{ route('user.harta.FormG.editformG', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Tidak Lengkap")
                             <a href="{{ route('user.harta.FormG.editformG', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                             @elseif($data ->status == "Sedang Diproses")
                             <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#saveg{{$data->id}}" >Permohonan Mengemaskini</button>
                             <div class="modal fade" id="saveg{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-sm" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                                     <div class="modal-body">
                                     <p align="center">Adakah anda ingin membuat permohonan mengemaskini lampiran?</p>
                                     </div>
                                     <div class="modal-footer">
                                     <a href="{{ route('statuseditG.update',$data->id)}}" class="btn btn-danger">Ya</a>
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                     </div>
                                 </div>
                                 </div>
                             </div>
                             <!-- <a href="{{ route('statuseditG.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a> -->
                             @else
                             <span><button class="btn btn-dark mr-1" disabled><i class="fas fa-pencil-alt"></i></button></span>
                             @endif
                           </div>
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
