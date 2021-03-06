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
                    <div class="card-title">Senarai Penerimaan Hadiah atas RM {{ $nilaiHadiah ->nilai_hadiah }}</div>
                    <!-- Description -->
                    <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="all" width="10%"><p>ID</p></th>
                                  <th class="all" width="10%"><p>No Staff</p></th>
                                  <th class="all" width="10%"><p>Nama</p></th>
                                  <th class="all" width="10%"><p>Jabatan</p></th>
                                  <th class="all" width="30%"><p>Jenis Hadiah</p></th>
                                  <th class="all" width="30"><p>Nilai Hadiah (RM)</p></th>
                                  <th class="all" width="15%"><p>Tarikh Diterima</p></th>
                                  <th class="all" width="30%"><p>Nama Pemberi</p></th>
                                  <th class="all" width="30%"><p>Alamat Pemberi</p></th>
                                  <th class="all" width="30%"><p>Hubungan Pemberi</p></th>
                                  <th class="all" width="70%"><p>Lampiran Hadiah</p></th>
                                  <th class="all" width="30%"><p>Status Penerimaan Hadiah</p></th>
                                  <th class="all" width="30%"><p>Tindakan</p></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                              @foreach($listHadiah as $data)

                              <tr>
                                  <td>{{ $data ->id }}</td>
                                  <td>
                                    {{ $data ->gifts->kad_pengenalan }}
                                  </td>

                                  <td>{{ $data ->gifts->name }}</td>
                                  <td>{{ $data ->jabatan}}</td>
                                  <td>{{ $data ->jenis_gift }}</td>
                                  <td>{{ $data ->nilai_gift  }}</td>
                                  <td>{{ $data ->tarikh_diterima }}</td>
                                  <td>{{ $data ->nama_pemberi  }}</td>
                                  <td>{{ $data ->alamat_pemberi  }}</td>
                                  <td>{{ $data ->hubungan_pemberi  }}</td>
                                  <!-- <td>{{ $data ->gambar_gift  }}</td> -->
                                  <!-- <td><img src="{{ asset('qbadminui/img/profile.jpg') }}" alt="profile" class="profile-avatar"></td> -->
                                  <!-- <td><img src="{{ asset('storage/uploads/gambar_hadiah/0nSg30DXJdzDJf6RCbqmeGjoZb9P45lVlw8DRdIe.png' ) }}"></td> -->
                                  <td>
                                    <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                        </button>
                                  </td>
                                  <!-- <td>$image_path</td> -->
                                  <td>
                                    @if($data ->status == "Sedang Diproses")
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Proses ke Ketua Bahagian")
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Tidak Lengkap")
                                    <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Tidak Diterima")
                                    <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                    @elseif($data ->status == "Proses ke Ketua Bahagian")
                                    <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                    @endif
                                  </td>
                                  <td class="p-3">
                                    <div class="text-center mt-3 mt-md-0">
                               <!-- Button trigger modal -->
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ulasan</button>

                               <form action="{{route('ulasanadminGift.update', $data->id)}}" method="POST">
                                 @csrf
                               <!-- Modal -->
                               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Ulasan Admin</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                                       <div class="modal-body" align="left">
                                         <textarea name="ulasan_admin" rows="8" cols="50" placeholder="Ulasan Admin"></textarea><br><br>
                                         <div align="left">
                                           <input type="radio" id="tidak_lengkap" name="status" value="Tidak Lengkap">
                                               <label for="Tidak Lengkap">Tidak Lengkap</label><br>
                                           <input type="radio" id="diterima" name="status" value="Proses ke Ketua Bahagian">
                                               <label for="Diterima">Proses ke Ketua Bahagian</label><br>
                                           <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                                               <label for="Tidak Diterima">Tidak Diterima</label><br>
                                         </div>
                                       </div>
                                       <div class="modal-footer">
                                       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                       <button type="submit" class="btn btn-primary">Hantar</button>
                                   </div>
                                   </div>
                               </div>
                           </div>
                           </form>
                                  </td>
                                </tr>
                               @endforeach

                        </table>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lampiran Hadiah</h5>
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

@endsection
