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
            <!-- basic light table card -->
            <div class="card rounded-lg" >
                <div class="card-body">
                    <div class="card-title">Senarai Sejarah Penerimaan Hadiah RM {{ $nilaiHadiah ->nilai_hadiah }} dan ke Bawah</div>
                    <!-- Description -->
                    <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="all" width="10%"><p>ID</p></th>
                                  <th class="all"><p> Lampiran B</p></th>
                                  <th class="all" width="30%"><p>Jenis Hadiah</p></th>
                                  <th class="all" width="30"><p>Nilai Hadiah (RM)</p></th>
                                  <th class="all" width="15%"><p>Tarikh Diterima</p></th>
                                  <th class="all" width="30%"><p class="all">Nama Pemberi</p></th>
                                  <th class="all" width="30%"><p class="all">Alamat Pemberi</p></th>
                                  <th class="all" width="30%"><p>Hubungan Pemberi</p></th>
                                  <th class="all" width="70%"><p class="all">Gambar Hadiah</p></th>
                                  <th class="all" width="30%"><p>Status Penerimaan Hadiah</p></th>
                                  <th class="all" width="30%"><p>Catatan</p></th>
                                  <th class="all" width="30%"><p>Tindakan</p></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                              @foreach($listHadiahB as $data)
                              @if($data ->status != "Disimpan ke Draf")

                              <tr>
                                  <td>{{ $data ->id }}</td>
                                  <td>
                                    Lampiran B
                                    <div class="d-flex flex-row justify-content-around align-items-center">
                                        <a href="{{ route('user.hadiah.viewB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
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
                                     @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Proses ke Ketua Bahagian")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                     @elseif($data ->status == "Sedang Dikemaskini")
                                     <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
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
                                  @elseif($data ->status == "Menunggu Ulasan Ketua Bahagian")
                                  {{ $data ->status }}
                                  @elseif($data ->status == "Proses ke Pentadbir Sistem(Tatatertib)")
                                  {{ $data ->status }}
                                  @elseif($data ->status == "Tidak Lengkap")
                                   {{$data->ulasan_admin}}
                                  @elseif($data ->status == "Tidak Diterima")
                                   {{$data->ulasan_hod}}
                                  @elseif($data ->status == "Diterima")
                                  {{ $data ->status }}
                                  @elseif($data ->status == "Selesai")
                                  {{ $data ->status }}
                                  @endif
                                  </td>
                                  <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                    @if($data ->status == "Sedang Dikemaskini")
                                     <a href="{{ route('user.hadiah.editgiftB', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                    @elseif($data ->status == "Tidak Lengkap")
                                     <a href="{{ route('user.hadiah.editgiftB', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                    @elseif($data ->status == "Sedang Diproses")
                                        <a href="{{ route('statuseditgiftB.update',$data->id)}}" class="btn btn-success mr-1">Permohonan Mengemaskini</a>
                                    @else
                                      <a class="btn btn-light mr-1" disabled ><i class="fas fa-pencil-alt"></i></a>
                                    @endif
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
                             </div>
                        @endforeach
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
