@extends('user.layouts.app')

@section('content')
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<div class="page-body p-4 text-dark">

  @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

  <div class="small-cards mt-5 mb-4" >
    <div class="row" style="justify-content: space-between;">
          <!-- Col sm 6, col md 6, col lg 3 -->
          <!-- <a class="col-sm-6 col-md-6 col-lg-1 mt-4 mt-lg-0"></a> -->
          <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.perakuanharta.formA')}}">
          <div class="card rounded-lg" style="width: 110%;">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon">
                         <p class="font-weight-normal m-0 text-muted" style="font-size:70%" >Perakuan Tiada Penambahan Harta</p>
                      </div>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img"  width="50%"></i>
                      </div>
                  </div>

              </div>
          </div>
          </a>
          <!-- <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.perakuanharta.formA')}}">
              <div class="card border-1 rounded-lg">
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formA.png') }}" alt="img" width="30%"></i>
                          </div>
                          <br>
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran A:</p>
                              <p class="font-weight-normal m-0 text-primary">Perakuan Tiada <br>Penambahan Harta</p>
                          </div>
                      </div>

                  </div>
              </div>
        </a> -->
        @if($status_form->status == 'Sedang Diproses' || $status_form->status == 'Sedang Dikemaskini')
        <div class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p align="center">Permohonan sedang diproses. Adakah anda ingin mengemaskini borang?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="{{route('user.harta.FormB.senaraihartaB')}}" class="btn btn-danger" name="publish">Ya</a>
                </div>
            </div>
            </div>
        </div>
        <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" data-toggle="modal" data-target="#publish" href="#">
        @else
          <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormB.formB')}}">
        @endif
        <div class="card rounded-lg" style="width: 110%;">
            <!-- Card body -->
            <div class="card-body">

                <div class="d-flex flex-row justify-content-center align-items-center">
                    <!-- Icon -->
                    <div class="small-card-icon">
                       <p class="font-weight-normal m-0 text-muted" style="font-size:70%" > Borang Perisytiharan Harta Baharu</p>
                    </div>
                    <!-- Text -->
                    <div class="small-card-text w-100 text-center">
                        <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img"  width="50%"></i>
                    </div>
                </div>
            </div>
          </div>
        </a>
          <!-- <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormB.formB')}}">
              <div class="card border-1 rounded-lg">
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formB.png') }}" alt="img" width="30%"></i>
                          </div>
                          <br>
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran B:</p>
                              <p class="font-weight-normal m-0 text-primary">Borang Perisytiharan<br> Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a> -->

          <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormC.formC')}}">
          <div class="card rounded-lg" style="width: 110%;">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon">
                         <p class="font-weight-normal m-0 text-muted" style="font-size:70%" >Borang Pelupusan Harta Baharu</p>
                      </div>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img"  width="50%"></i>
                      </div>
                  </div>

              </div>
          </div>
          </a>
          <!-- <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormC.formC')}}">
              <div class="card border-1 rounded-lg">
                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">
                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formC.png') }}" alt="img" width="30%"></i>
                          </div>
                          <br>
                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran C:</p>
                              <p class="font-weight-normal m-0 text-primary">Borang Pelupusan<br> Harta Baharu</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a> -->

          <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormD.formD')}}">
          <div class="card rounded-lg" style="width: 110%;">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon">
                         <p class="font-weight-normal m-0 text-muted" style="font-size:70%" > Borang Perisytiharan Syarikat</p>
                      </div>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img"  width="45%"></i>
                      </div>
                  </div>
              </div>
            </div>
          </a>
          <!-- <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormD.formD')}}">

              <div class="card border-1 rounded-lg">

                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">

                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formD.png') }}" alt="img" width="30%"></i>
                          </div>
                          <br>

                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran D:</p>
                              <p class="font-weight-normal m-0 text-primary">Perisytiharan Syarikat /Perniagaan Sendiri</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a> -->

          <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormG.formG')}}">
          <div class="card rounded-lg" style="width: 110%;">
              <!-- Card body -->
              <div class="card-body">

                  <div class="d-flex flex-row justify-content-center align-items-center">
                      <!-- Icon -->
                      <div class="small-card-icon">
                         <p class="font-weight-normal m-0 text-muted" style="font-size:70%" >Borang Memohon dan Memiliki Saham</p>
                      </div>
                      <!-- Text -->
                      <div class="small-card-text w-100 text-center">
                          <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img"  width="50%"></i>
                      </div>
                  </div>
              </div>
            </div>
          </a>
          <!-- <a class="col-sm-6 col-md-6 col-lg-2 mt-4 mt-lg-0" href="{{route('user.harta.FormG.formG')}}">

              <div class="card border-1 rounded-lg">

                  <div class="card-body">

                      <div class="d-flex flex-column justify-content-center align-items-center">

                          <div class="small-card-icon" align="center">
                              <i><img src="{{ asset('qbadminui/img/formG.png') }}" alt="img" width="30%"></i>
                          </div>
                          <br>

                          <div class="small-card-text w-100 text-center">
                              <p class="font-weight-normal m-0 text-muted">Lampiran E:</p>
                              <p class="font-weight-normal m-0 text-primary">Borang Memohon dan Memiliki Saham</p>
                          </div>
                      </div>

                  </div>
              </div>
          </a> -->

        </div>
        </div>

      <!-- </div> -->
      <br>
  <div class="row mt-10">
          <!-- Col md 6 -->
          <div class="col-md-12 mt-4" >
              <!-- basic light table card -->
              <div class="card rounded-lg" style="width: 102%;" >
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

                                  </tr>
                              </thead>
                              <tbody align="center">
                                @foreach($merged as $data)
                                @if($data->status != 'Disimpan ke Draf' && $data->status != 'Tidak Diterima' )
                                <tr>
                                   <td>{{ $data ->id}}</td>
                                   <td>{{ $data ->users ->name}}</td>

                                    <td>
                                      @if($data ->getTable() == "assets")
                                      Lampiran A : Perakuan Tiada Penambahan Harta Baharu
                                      <div class="d-flex flex-row justify-content-around align-items-center">
                                          <a href="{{ route('user.perakuanharta.viewformA', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                      </div>
                                      @elseif($data ->getTable() == "formbs")
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
                                      @elseif($data ->status == "Sedang Dikemaskini")
                                      <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                      @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                      <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                      @elseif($data ->status == "Proses ke Ketua Bahagian")
                                      <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                      @elseif($data ->status == "Untuk Tindakan Jawatankuasa Tatatertib")
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
                                      @elseif($data ->status == "Lampiran A")
                                      <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
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
        </div>
  </div>
  <br><br>
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
