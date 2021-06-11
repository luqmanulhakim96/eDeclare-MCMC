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
                               <div class="card-title">Senarai Tugasan Perisytiharan Harta</div>
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
                                               <th><p class="mb-0">Tindakan</p></th>

                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($merged as $data)
                                         @if($data ->status == "Sedang Diproses" || $data ->status == "Proses ke Pentadbir Sistem(Tatatertib)" || $data ->status == "Menunggu Kebenaran Kemaskini")
                                         <tr>
                                             <!-- <td>{{ $data ->id }}</td> -->
                                             <td>{{ $data ->id }}</td>
                                             <td>{{ $data ->users->name }}</td>
                                             <!-- <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td> -->
                                             <td>
                                               @if($data ->getTable() == "formbs")
                                               Lampiran B : Perisytiharan Harta
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormB.viewformB', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formcs")
                                               Lampiran C : Pelupusan Harta
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormC.viewformC', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formds")
                                               Lampiran D : Perisytiharan Syarikat
                                               <div class="d-flex flex-row justify-content-around align-items-center">
                                                   <a href="{{ route('user.harta.FormD.viewformD', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                               </div>
                                               @elseif($data ->getTable() == "formgs")
                                               Lampiran E : Perisytiharan Memiliki Saham
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
                                               @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Bahagian")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Jawatankuasa Tatatertib")
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
                                               @endif
                                             </td>
                                             <td>
                                               @if($data ->getTable() == "formbs")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaB',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                 @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tindakanB{{$data->id}}">Tindakan</button>
                                                 @else
                                                 -
                                                 @endif
                                               @elseif($data ->getTable() == "formcs")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaC',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                 @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tindakanC{{$data->id}}">Tindakan</button>
                                                 @else
                                                 -
                                                 @endif
                                               @elseif($data ->getTable() == "formds")
                                                 @if($data ->status == "Sedang Diproses")
                                                 <a href="{{route('user.admin.harta.ulasanHartaD',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                 @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tindakanD{{$data->id}}">Tindakan</button>
                                                 @else
                                                 @endif
                                                @elseif($data ->getTable() == "formgs")
                                                  @if($data ->status == "Sedang Diproses")
                                                  <a href="{{route('user.admin.harta.ulasanHartaG',$data-> id)}}" class="btn btn-primary" >Ulasan</a>
                                                  @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tindakanG{{$data->id}}">Tindakan</button>
                                                  @else
                                                  -
                                                  @endif
                                                @endif
                                             </td>
                                             <div class="modal fade" id="tindakanB{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm" role="document">
                                                   <form action="{{route('statuseditadminB.update',$data-> id)}}" method="get">
                                                     @csrf
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body">
                                                         <p align="center">Pengesahan untuk memberi akses kemaskini lampiran?</p>
                                                         </div>
                                                         <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         <button type="submit" class="btn btn-primary" name="edit">Ya</button>
                                                         <button type="submit" class="btn btn-primary" name="takedit">Tidak</button>
                                                         </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                             </div>
                                             <div class="modal fade" id="tindakanC{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm" role="document">
                                                   <form action="{{route('statuseditadminC.update',$data-> id)}}" method="get">
                                                     @csrf
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body">
                                                         <p align="center">Pengesahan untuk memberi akses kemaskini lampiran?</p>
                                                         </div>
                                                         <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         <button type="submit" class="btn btn-primary" name="edit">Ya</button>
                                                         <button type="submit" class="btn btn-primary" name="takedit">Tidak</button>
                                                         </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                             </div>
                                             <div class="modal fade" id="tindakanD{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm" role="document">
                                                   <form action="{{route('statuseditadminD.update',$data-> id)}}" method="get">
                                                     @csrf
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body">
                                                         <p align="center">Pengesahan untuk memberi akses kemaskini lampiran?</p>
                                                         </div>
                                                         <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         <button type="submit" class="btn btn-primary" name="edit">Ya</button>
                                                         <button type="submit" class="btn btn-primary" name="takedit">Tidak</button>
                                                         </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                             </div>
                                             <div class="modal fade" id="tindakanG{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog modal-sm" role="document">
                                                   <form action="{{route('statuseditadminG.update',$data-> id)}}" method="get">
                                                     @csrf
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body">
                                                         <p align="center">Pengesahan untuk memberi kebenaran mengemaskini lampiran?</p>
                                                         </div>
                                                         <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         <button type="submit" class="btn btn-primary" name="edit">Ya</button>
                                                         <button type="submit" class="btn btn-primary" name="takedit">Tidak</button>
                                                         </div>
                                                     </div>
                                                   </form>
                                                 </div>
                                             </div>
                                           </tr>
                                           @elseif($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                                          <tr>

                                              <td>{{ $data ->id }}</td>
                                              <td>{{ $data ->users->name }}</td>
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
                                                @elseif($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
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
                                                  @if($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")

                                                    <button class="btn btn-success mr-1" type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                      <i class="fa fa-upload"> </i>
                                                   </button>
                                                   <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                       <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen Perisytiharan</h5>
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                           </button>
                                                           </div>
                                                           <div class="modal-body" align="center">

                                                           <form action="{{route('dokumenB.submit',$data->id)}}" method="post" enctype="multipart/form-data">
                                                             @csrf
                                                             <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                             <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small><br>

                                                               <input type="radio" id="diterima" name="status" value="Diterima">
                                                                   <label for="Diterima">Diterima</label>
                                                               <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                                                   <label for="Tidak Diterima">Tidak Diterima</label><br>
                                                           </div>
                                                           <div class="modal-footer">
                                                             <button type="submit" class="btn btn-secondary">Muat Naik</button>
                                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                           </div>
                                                           </form>
                                                       </div>
                                                       </div>
                                                   </div>

                                                  @else
                                                  -
                                                  @endif
                                                @elseif($data ->getTable() == "formcs")
                                                  @if($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                                                  <button class="btn btn-success mr-1" type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                    <i class="fa fa-upload"> </i>
                                                 </button>
                                                 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog modal-dialog-centered" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen Perisytiharan</h5>
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body" align="center">

                                                         <form action="{{route('dokumenC.submit',$data->id)}}" method="post" enctype="multipart/form-data">
                                                           @csrf
                                                           <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                           <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small><br>

                                                             <input type="radio" id="diterima" name="status" value="Diterima">
                                                                 <label for="Diterima">Diterima</label>
                                                             <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                                                 <label for="Tidak Diterima">Tidak Diterima</label><br>
                                                         </div>
                                                         <div class="modal-footer">
                                                           <button type="submit" class="btn btn-secondary">Muat Naik</button>
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         </div>
                                                         </form>
                                                     </div>
                                                     </div>
                                                 </div>
                                                  @else
                                                  -
                                                  @endif
                                                @elseif($data ->getTable() == "formds")
                                                  @if($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                                                  <button class="btn btn-success mr-1" type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                    <i class="fa fa-upload"> </i>
                                                 </button>
                                                 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                     <div class="modal-dialog modal-dialog-centered" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                         <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen Perisytiharan</h5>
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span>
                                                         </button>
                                                         </div>
                                                         <div class="modal-body" align="center">

                                                         <form action="{{route('dokumenD.submit',$data->id)}}" method="post" enctype="multipart/form-data">
                                                           @csrf
                                                           <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                           <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small><br>

                                                             <input type="radio" id="diterima" name="status" value="Diterima">
                                                                 <label for="Diterima">Diterima</label>
                                                             <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                                                 <label for="Tidak Diterima">Tidak Diterima</label><br>
                                                         </div>
                                                         <div class="modal-footer">
                                                           <button type="submit" class="btn btn-secondary">Muat Naik</button>
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                         </div>
                                                         </form>
                                                     </div>
                                                     </div>
                                                 </div>
                                                  @else
                                                  -
                                                  @endif
                                                 @elseif($data ->getTable() == "formgs")
                                                   @if($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
                                                   <button class="btn btn-success mr-1" type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                                     <i class="fa fa-upload"> </i>
                                                  </button>
                                                  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Muat Naik Dokumen Perisytiharan</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          </div>
                                                          <div class="modal-body" align="center">

                                                          <form action="{{route('dokumenG.submit',$data->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" class="form-control bg-light" id="dokumen_pegawai" name="dokumen_pegawai[]" aria-describedby="dokumen_pegawai" multiple>
                                                            <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small><br>

                                                              <input type="radio" id="diterima" name="status" value="Diterima">
                                                                  <label for="Diterima">Diterima</label>
                                                              <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                                                  <label for="Tidak Diterima">Tidak Diterima</label><br>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="submit" class="btn btn-secondary">Muat Naik</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                          </div>
                                                          </form>
                                                      </div>
                                                      </div>
                                                  </div>
                                                   @else
                                                   -
                                                   @endif
                                                 @endif
                                              </td>
                                               @endif
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
