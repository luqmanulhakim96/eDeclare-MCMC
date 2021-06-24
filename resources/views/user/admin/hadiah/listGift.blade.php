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
                    <div class="card-title">Senarai Penerimaan Hadiah bernilai lebih dari RM {{ $nilai_hadiah ->nilai_hadiah }}</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example" style="width: 100%;">
                            <thead class="thead-light">
                                <tr class="text-center">
                                  <th class="all" width="10%"><p>ID</p></th>
                                  <th class="all" width="10%"><p>Nama</p></th>
                                  <th class="all" width="10%"><p>Jabatan</p></th>
                                  <th class="all" width="30%"><p>Jenis Hadiah</p></th>
                                  <th class="all" width="30"><p>Nilai Hadiah (RM)</p></th>
                                  <th class="all" width="15%"><p>Tarikh Diterima</p></th>
                                  <th class="all" width="30%"><p>Nama Pemberi</p></th>
                                  <th class="all" width="30%"><p>Alamat Pemberi</p></th>
                                  <th class="all" width="30%"><p>Hubungan Pemberi</p></th>
                                  <th class="all" width="70%"><p>Gambar Hadiah</p></th>
                                  <th class="all" width="30%"><p>Status Penerimaan Hadiah</p></th>
                                  <th class="all" width="30%"><p>Tindakan</p></th>


                                </tr>
                            </thead>

                            <tbody align="center">
                              @foreach($listHadiah as $data)
                              <tr>
                                  <td>{{ $data ->id }}</td>
                                  <td>{{ $data ->users->name }}</td>
                                  <td>{{ $data ->jabatan}}</td>
                                  <td>{{ $data ->jenis_gift }}</td>
                                  <td>{{ $data ->nilai_gift  }}</td>
                                  <td>{{ $data ->tarikh_diterima }}</td>
                                  <td>{{ $data ->nama_pemberi  }}</td>
                                  <td>{{ $data ->alamat_pemberi  }}</td>
                                  <td>{{ $data ->hubungan_pemberi  }}</td>
                                  <td>
                                    <button type="button" onclick="passGambarHadiah('{{asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift))}}')" data-toggle="modal" data-target="#exampleModal2">
                                      <img src="{{ asset( $image_path = str_replace('public', 'storage',  $data ->gambar_gift)) }}"  class="profile-avatar">
                                        </button>
                                  </td>
                                  <td>
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
                                  </td>
                                  <td>
                                    @if($role == "1")
                                      @if($data ->status == "Sedang Diproses")
                                      <a href="{{route('user.admin.hadiah.ulasanHadiah',$data->id)}}" class="btn btn-primary" >Ulasan</button>
                                      @elseif($data ->status == "Menunggu Kebenaran Kemaskini")
                                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tindakanGiftA{{$data-> id}}">Tindakan</button>
                                      <div class="modal fade" id="tindakanGiftA{{$data-> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <form action="{{route('statusadmineditgift.update',$data-> id)}}" method="get">
                                              @csrf
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" data-id="{{ $data->id }}" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>
                                                  <div class="modal-body">
                                                  <p align="center">Pengesahan untuk memberi akses kemaskini lampiran? A</p>
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
                                      @endif
                                      @elseif($role == "2")
                                      @if($data ->getTable() == "gifts")
                                        @if($data ->status == "Proses ke Ketua Jabatan Integriti")
                                        <a href="{{route('user.integrityHOD.hadiah.ulasanHadiah',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                        @endif
                                      @elseif($data ->getTable() == "giftbs")
                                        @if($data ->status == "Proses ke Ketua Jabatan Integriti")
                                        <a href="{{route('user.integrityHOD.hadiah.ulasanHadiahB',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                        @endif
                                      @endif
                                      @elseif($role == "3")
                                        @if($data ->getTable() == "gifts")
                                          @if($data ->status == "Proses ke Ketua Bahagian")
                                          <a href="{{route('user.hodiv.hadiah.ulasanHadiah',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
                                          @endif
                                       @endif
                                      @endif
                                  </td>

                                </tr>
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

                              @endforeach
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
