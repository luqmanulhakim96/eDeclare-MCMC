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
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <th width="30%"><p class="mb-0">No Staff</p></th>
                                               <th width="30"><p class="mb-0">Nama</p></th>
                                               <th width="10%"><p class="mb-0">Jabatan</p></th>
                                               <th width="70%"><p class="mb-0">Jenis Hadiah</p></th>
                                               <th width="30%"><p class="mb-0">Nilai Hadiah (RM)</p></th>
                                               <th width="30%"><p class="mb-0">Tarikh Diterima</p></th>
                                               <th width="30%"><p class="mb-0">Nama Pemberi</p></th>
                                               <th width="30"><p class="mb-0">Alamat Pemberi</p></th>
                                               <th width="10%"><p class="mb-0">Hubungan Pemberi</p></th>
                                               <th width="70%"><p class="mb-0">Gambar Hadiah</p></th>
                                               <th width="30%"><p class="mb-0">Status Hadiah (RM)</p></th>
                                               <th width="30%"><p class="mb-0">Tindakan</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         <tr>
                                             <td>{{ $data ->id }}</td>
                                             <td>{{ $data ->users->kad_pengenalan }}</td>
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
                                               <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                 <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                                   </button>
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <span class="badge badge-warning badge-pill">Menunggu Ulasan Ketua Jabatan Integriti</span>
                                                 @elseif($data ->status == "Diproses ke Ketua Jabatan Integriti")
                                                 <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                 @elseif($data ->status == "Diproses ke Pentadbir Sistem")
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
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Lengkap")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Diterima")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Diterima")
                                                <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                                @endif
                                              @endif
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "gifts")
                                                 @if($data ->status == "Diproses ke Ketua Jabatan Integriti")
                                                 <a href="{{route('user.integrityHOD.hadiah.ulasanHadiah',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                                 @else
                                                 -
                                                 @endif
                                                @endif
                                             </td>
                                           </tr>
                                          @endforeach
                                           <!-- Table data -->

                                       </tbody>
                                   </table>
                                   <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                   </div>
                               </div>

                           </div>
                       </div>
                   </div>
                 </div>
             </div>
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
