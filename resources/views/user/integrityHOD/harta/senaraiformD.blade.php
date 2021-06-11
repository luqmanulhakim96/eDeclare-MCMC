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
                               <div class="card-title">Senarai Maklumat Syarikat</div>
                               <!-- Description -->
                               <!-- <p class="text-muted">Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class <code>.table</code> to any <code>table tag </code>, then extend with custom styles or our various included modifier classes.</p> -->
                               <!-- Table -->
                               <div class="table-responsive">
                                   <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th width="10%"><p class="mb-0">ID</p></th>
                                               <th width="30%"><p class="mb-0">No Staff</p></th>
                                               <th width="30"><p class="mb-0">Nama</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran</p></th>
                                               <th width="70%"><p class="mb-0">Tarikh</p></th>
                                               <th width="30%"><p class="mb-0">Status</p></th>
                                               <th width="30%"><p class="mb-0">Tindakan</p></th>
                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($listD as $data)

                                         <tr>
                                             <td>{{ $data ->id }}</td>
                                             <td>{{ $data ->formds->kad_pengenalan }}</td>
                                             <td>{{ $data ->formds->name }}</td>
                                             <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormD.viewformD', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td>
                                             <td>{{ $data ->updated_at}}</td>
                                             <td>
                                               @if($data ->status == "Sedang Diproses")
                                               <span class="badge badge-warning badge-pill">Menunggu Ulasan Admin</span>
                                               @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Diterima")
                                                <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Lengkap")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Tidak Diterima")
                                                <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                                @elseif($data ->status == "Proses ke Ketua Bahagian")
                                                <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                                @endif
                                             </td>
                                             <td>
                                               @if($data ->status == "Proses ke Ketua Jabatan Integriti")
                                               <a href="{{route('user.integrityHOD.harta.ulasanHartaD',$data-> id)}}" class="btn btn-primary" >Ulasan</button>
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
             <br><br><br><br>


@endsection
