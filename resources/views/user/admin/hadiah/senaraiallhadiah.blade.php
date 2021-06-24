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
                               <div class="card-title">Senarai Sejarah Penerimaan Hadiah</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th><p class="mb-0">ID</p></th>
                                               <!-- <th><p class="mb-0">No Staff</p></th> -->
                                               <th><p class="mb-0">Jenis Lampiran</p></th>
                                               <th><p class="mb-0">Nama</p></th>
                                               <th><p class="mb-0">Jabatan</p></th>
                                               <th><p class="mb-0">Jenis Hadiah</p></th>
                                               <th><p class="mb-0">Nilai Hadiah (RM)</p></th>
                                               <th><p class="mb-0">Tarikh Diterima</p></th>
                                               <th><p class="mb-0">Nama Pemberi</p></th>
                                               <th><p class="mb-0">Alamat Pemberi</p></th>
                                               <th><p class="mb-0">Hubungan Pemberi</p></th>
                                               <th width="30%"><p class="mb-0">Gambar Hadiah</p></th>
                                               <th><p class="mb-0">Status Hadiah (RM)</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                           @if($data ->status != "Disimpan ke Draf")
                                         <tr>
                                             <td>{{ $data ->id }}</td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                               Lampiran A
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.hadiah.viewA', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>

                                               @elseif($data ->getTable() == "giftbs")
                                               Lampiran B
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.hadiah.viewB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @endif
                                             </td>
                                             <td>{{ $data ->users->name }}</td>
                                             <td>{{ $data ->jabatan}}</td>
                                             <td>{{ $data ->jenis_gift}}</td>
                                             <td>{{ $data ->nilai_gift}}</td>
                                             <td>{{ $data ->tarikh_diterima}}</td>
                                             <td>{{ $data ->nama_pemberi}}</td>
                                             <td>{{ $data ->alamat_pemberi}}</td>
                                             <td>{{ $data ->hubungan_pemberi}}</td>
                                             <!-- <td>
                                               <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                 <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                                   </button>
                                             </td> -->
                                             <td>
                                                 <!-- <button class="btn btn-primary mr-1" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button> -->
                                                 @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)), PATHINFO_EXTENSION) == "docx")
                                                 <a class="btn btn-primary mr-1" href="{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}">Muat Turun Lampiran Hadiah</a>
                                                 @else
                                                 <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button>
                                                 @endif
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Sedang Dikemaskini")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Proses ke Ketua Bahagian")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Proses ke Pentadbir Sistem")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Tidak Lengkap")
                                                 <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Tidak Diterima")
                                                 <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Diterima")
                                                 <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                                 @endif
                                              @elseif($data ->getTable() == "giftbs")
                                                @if($data ->status == "Sedang Diproses")
                                                <span class="badge badge-warning badge-pill">Diproses ke Pentadbir Sistem</span>
                                                @elseif($data ->status == "Sedang Dikemaskini")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Lengkap")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Diterima")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Diterima")
                                                <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                                @endif
                                              @endif
                                             </td>
                                           </tr>
                                           @endif
                                           <!-- Table data -->
                                           <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                               <div class="modal-dialog modal-dialog-centered" role="document" >
                                               <div class="modal-content" style="width:100%; height:100%;">
                                                   <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Lampiran Hadiah</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                                   </div>


                                                     @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)), PATHINFO_EXTENSION) == "pdf")
                                                     <div class="modal-body modal-dialog1" align="center"  >
                                                     <iframe id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}" alt="Gambar Hadiah" width="100%" height="100%"></iframe>
                                                     </div>
                                                     @else
                                                     <div class="modal-body" align="center" >
                                                     <img id="" class="img-responsive" src="{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}" alt="Gambar Hadiah" width="100%" height="100%"></img>
                                                   </div>
                                                   @endif
                                                   <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                   </div>

                                               </div>
                                           </div>
                                          @endforeach
                                        </div>
                                       </tbody>
                                   </table>
                                   <!-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                           <h5 class="modal-title" id="exampleModalLabel">Gambar Hadiah</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                           </div>
                                           <div class="modal-body" align="center">
                                             <img id="imageHadiah" class="img-responsive" src="" alt="Gambar Hadiah" width="50%" height="50%">
                                           </div>
                                           <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           </div>
                                       </div>
                                       </div>
                                   </div> -->

                               </div>

                           </div>
                       </div>
                   </div>
                 </div>
             </div>
             <br><br><br><br>
             <script type="text/javascript">
               function passGambarHadiah(path){
                 console.log(path);
                 $(".modal-body #imageHadiah").attr('src', path);
                 $('.modal-body #imageHadiah').show();
               }
             </script>


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
