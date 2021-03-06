@extends('user.layouts.app')
@section('content')
<head>
  <style media="screen">
  .modal-dialog1 {
    max-width: 700px;
    height: 550px;
}
  </style>
</head>
<!--Page Body part -->
<div class="page-body p-4 text-dark">
<div class="row mt-10">
        <!-- Col md 6 -->
        <div class="col-md-12 mt-4" >
          <div class="">
            <a class="btn btn-primary mt-4"href="{{route('user.senaraihadiah')}}">Kembali</a>
          </div>
          <br>
            <!-- basic light table card -->
            <div class="card rounded-lg" >
                <div class="card-body">
                    <div class="card-title">Senarai Sejarah Penerimaan Hadiah lebih RM {{ $nilaiHadiah ->nilai_hadiah }}</div>
                    <!-- Description -->
                    <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th class="all"><p>ID</p></th>
                                    <th class="all"><p> Lampiran A</p></th>
                                    <th class="all"><p>Jenis Hadiah</p></th>
                                    <th class="all"><p>Nilai Hadiah (RM)</p></th>
                                    <th class="all"><p>Tarikh Diterima</p></th>
                                    <th class="all"><p class="all">Nama Pemberi</p></th>
                                    <th class="all"><p class="all">Alamat Pemberi</p></th>
                                    <th class="all"><p>Hubungan Pemberi</p></th>
                                    <th class="all"><p class="all">Lampiran Hadiah</p></th>
                                    <th class="all"><p>Status Penerimaan Hadiah</p></th>
                                    <th class="all"><p>Ulasan</p></th>
                                    <th class="all"><p>Catatan</p></th>
                                    <th class="all"><p>Tindakan</p></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                              @foreach($listHadiah as $data)
                              @if($data ->status != "Disimpan ke Draf")

                              <tr>
                                  <td>{{ $data ->id }}</td>
                                  <td>
                                    Lampiran A
                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                        <a href="{{ route('user.hadiah.viewA', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                    </div>
                                  </td>
                                  <td>{{ $data ->jenis_gift }}</td>
                                  <td>{{ $data ->nilai_gift  }}</td>
                                  <td>{{ $data ->tarikh_diterima }}</td>
                                  <td>{{ $data ->nama_pemberi  }}</td>
                                  <td>{{ $data ->alamat_pemberi  }}</td>
                                  <td>{{ $data ->hubungan_pemberi  }}</td>


                                  <td>
                                      <!-- <button class="btn btn-primary mr-1" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button> -->
                                      @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)), PATHINFO_EXTENSION) == "docx")
                                      <a class="btn btn-primary mr-1" href="{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}">Muat Turun Lampiran Hadiah</a>
                                      @else
                                      <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button>
                                      @endif
                                  </td>
                                  <!-- <td>$image_path</td> -->

                                  <td>
                                    @if($data ->status == "Sedang Diproses")
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Diterima")
                                     <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Tidak Lengkap")
                                     <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Tidak Diterima")
                                     <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Diproses ke Ketua Jabatan Integriti")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Diproses ke Ketua Bahagian")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Ketua Bahagian")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Pentadbir Sistem")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Sedang Dikemaskini")
                                     <span class="badge badge-warning badge-pill">Permohonan Kemaskini Diluluskan</span>
                                     @endif
                                  </td>
                                  <td>
                                    <a href="{{route('user.hadiah.ulasanpageGift', $data->id)}}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
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
                                    @elseif($data ->status == "Menunggu Ulasan Ketua Bahagian")
                                    {{ $data ->status }}
                                    @elseif($data ->status == "Proses ke Pentadbir Sistem")
                                    {{ $data ->status }}
                                    @elseif($data ->status == "Tidak Lengkap")
                                       @foreach($ulasanAdmin as $admin)
                                       @if($admin->gift_id == $data->id)
                                         <p> - {{$admin->ulasan_admin}} ( {{$admin->created_at}}) </p>
                                       @endif
                                       @endforeach
                                    @elseif($data ->status == "Tidak Diterima")
                                      @foreach($ulasanHOD as $hod)
                                        @if($hod->gift_id == $data->id)
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
                                     <a href="{{ route('user.hadiah.editgift', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                    @elseif($data ->status == "Tidak Lengkap")
                                     <a href="{{ route('user.hadiah.editgift', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                    @elseif($data ->status == "Sedang Diproses")
                                    <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#save{{$data->id}}" >Permohonan Mengemaskini</button>
                                    <div class="modal fade" id="save{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="{{ route('statuseditgift.update',$data->id)}}" class="btn btn-danger">Ya</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <!-- <a href="{{ route('statuseditgift.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a> -->
                                    @else
                                      <a class="btn btn-light mr-1" disabled ><i class="fas fa-pencil-alt"></i></a>
                                    @endif
                                      <!-- <a href="{{ route('gift.delete', $data->id) }}" class="btn btn-danger" onclick=" return confirm('Padam maklumat?');"><i class="fas fa-times-circle"></i></a> -->

                                  </div>
                                  </td>
                                </tr>
                                @endif
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
                        </table>


                </div>
            </div>
        </div>
      </div>
  </div>
  </div>
  <br><br><br><br>
  <!-- <script type="text/javascript">
    function passGambarHadiah(path){
      console.log(path);
      $(".modal-body #imageHadiah").attr('src', path);
      $('.modal-body #imageHadiah').show();
    }
  </script> -->
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
