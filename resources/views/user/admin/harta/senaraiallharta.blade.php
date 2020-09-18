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
                                               <!-- <th width="10%"><p class="mb-0">ID</p></th> -->
                                               <th width="30%"><p class="mb-0">No Staff</p></th>
                                               <th width="30"><p class="mb-0">Nama</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran</p></th>
                                               <th width="70%"><p class="mb-0">Tarikh</p></th>
                                               <th width="30%"><p class="mb-0">Status</p></th>
                                               <th width="30%"><p class="mb-0">Tindakan</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         <tr>
                                             <!-- <td>{{ $data ->id }}</td> -->
                                             <td>{{ $data ->users->kad_pengenalan }}</td>
                                             <td>{{ $data ->users->name }}</td>
                                             <!-- <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td> -->
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

                                             <td>{{ $data ->created_at}}</td>
                                             <td>
                                               @if($data ->status == "Sedang Diproses")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Bahagian")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Lengkap")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Diterima")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Diterima")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Selesai")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                               @endif
                                             </td>
                                             <td>

                                               @if($data ->getTable() == "formbs")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaB',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                 @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")

                                                 <button type="button" class="fas fa-upload btn-primary" data-toggle="modal" data-target="#exampleModal" ></button>
                                                 <!-- Modal -->
                                                 <form action="{{route('dokumenB.submit', $data->id)}}" method="POST" enctype="multipart/form-data">
                                                   @csrf
                                                 <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                                                          <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span>
                                                              </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                                  <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                                              </div>
                                                              <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                              <button type="submit" class="btn btn-primary">Muat Naik</button>
                                                              </div>
                                                          </div>
                                                          </div>
                                                      </div>
                                                    </form>
                                                 @else
                                                 -
                                                 @endif
                                               @elseif($data ->getTable() == "formcs")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaC',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                   @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                                                   <button type="button" class="fas fa-upload btn-primary" data-toggle="modal" data-target="#exampleModal" ></button>
                                                   <!-- Modal -->
                                                   <form action="{{route('dokumenC.submit', $data->id)}}" method="POST" enctype="multipart/form-data">
                                                     @csrf
                                                   <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                                    <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Muat Naik</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                      </form>
                                                 @else
                                                 -
                                                 @endif
                                               @elseif($data ->getTable() == "formds")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaD',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                   @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                                                   <button type="button" class="fas fa-upload btn-primary" data-toggle="modal" data-target="#exampleModal" ></button>
                                                   <!-- Modal -->
                                                   <form action="{{route('dokumenD.submit', $data->id)}}" method="POST" enctype="multipart/form-data">
                                                     @csrf
                                                   <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                                    <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Muat Naik</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                      </form>
                                                 @else
                                                 -
                                                 @endif
                                                @elseif($data ->getTable() == "formgs")
                                                  @if($data ->status == "Sedang Diproses")
                                                  <a href="{{route('user.admin.harta.ulasanHartaG',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                    @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
                                                    <button type="button" class="fas fa-upload btn-primary" data-toggle="modal" data-target="#exampleModal" ></button>
                                                    <!-- Modal -->
                                                    <form action="{{route('dokumenG.submit', $data->id)}}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                                                             <div class="modal-dialog" role="document">
                                                             <div class="modal-content">
                                                                 <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">×</span>
                                                                 </button>
                                                                 </div>
                                                                 <div class="modal-body">
                                                                   <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                                     <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                 <button type="submit" class="btn btn-primary">Muat Naik</button>
                                                                 </div>
                                                             </div>
                                                             </div>
                                                         </div>
                                                       </form>
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
