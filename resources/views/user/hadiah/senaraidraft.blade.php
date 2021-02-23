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
                               <div class="card-title">Senarai Draf Penerimaan Hadiah</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <!-- <th width="30%"><p class="mb-0">No Staff</p></th> -->
                                               <th width="30"><p class="mb-0">Nama</p></th>
                                               <th width="10%"><p class="mb-0">Jabatan</p></th>
                                               <th width="70%"><p class="mb-0">Jenis Hadiah</p></th>
                                               <th width="30%"><p class="mb-0">Nilai Hadiah (RM)</p></th>
                                               <th width="30%"><p class="mb-0">Tarikh Diterima</p></th>
                                               <th width="30%"><p class="mb-0">Nama Pemberi</p></th>
                                               <th width="30"><p class="mb-0">Alamat Pemberi</p></th>
                                               <th width="10%"><p class="mb-0">Hubungan Pemberi</p></th>
                                               <th width="70%"><p class="mb-0">Gambar Hadiah</p></th>
                                               <th width="30%"><p class="mb-0">Status Hadiah</p></th>
                                               <th width="30%"><p class="mb-0">Tindakan</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         <tr>
                                             <td>{{ $data ->id }}</td>
                                             <!-- <td>{{ $data ->users->kad_pengenalan }}</td> -->
                                             <td>{{ $data ->users->name }}</td>
                                             <!-- <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td> -->

                                             <td>{{ $data ->jabatan}}</td>
                                             <td>{{ $data ->jenis_gift}}</td>
                                             <td>{{ $data ->nilai_gift}}</td>
                                             <td>{{ $data ->tarikh_diterima}}</td>
                                             <td>{{ $data ->nama_pemberi}}</td>
                                             <td>{{ $data ->alamat_pemberi}}</td>
                                             <td>{{ $data ->hubungan_pemberi}}</td>
                                             <td>
                                               @if($data->gambar_gift)
                                                 <!-- <button class="btn btn-primary mr-1" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button> -->
                                                 @if(pathinfo(asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)), PATHINFO_EXTENSION) == "docx")
                                                 <a class="btn btn-primary mr-1" href="{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}">Muat Turun Lampiran Hadiah</a>
                                                 @else
                                                 <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal{{$data->id}}">Lampiran Hadiah</button>
                                                 @endif
                                              @else
                                                <button class="btn btn-dark mr-1" disabled>Lampiran Hadiah</button>
                                              @endif
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                                 @if($data ->status == "Disimpan ke Draf")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @endif
                                              @elseif($data ->getTable() == "giftbs")
                                                @if($data ->status == "Disimpan ke Draf")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @endif
                                              @endif
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                                 @if($data ->status == "Disimpan ke Draf")
                                                 <a href="{{route('user.hadiah.editgift',$data-> id)}}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                 @else
                                                 -
                                                 @endif
                                               @elseif($data ->getTable() == "giftbs")
                                                 @if($data ->status == "Disimpan ke Draf")
                                                 <a href="{{route('user.hadiah.editgiftB',$data-> id)}}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                 @else
                                                 -
                                                 @endif
                                                @endif
                                             </td>
                                           </tr>

                                        <!-- Modal -->
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
