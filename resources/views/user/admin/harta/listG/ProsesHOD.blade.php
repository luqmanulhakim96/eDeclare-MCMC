@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
             <div class="buttons">
               <a href="{{route('user.admin.harta.listG.senaraiformG')}}"  class="btn btn-warning m-2">Sedang Diproses</a>
               <a href="{{route('user.admin.harta.listG.ProsesHOD')}}"class="btn btn-dark m-2">Diproses ke Ketua Jabatan Integriti</a>
               <a href="{{route('user.admin.harta.listG.Diterima')}}" class="btn btn-success m-2">Diterima</a>
               <a href="{{route('user.admin.harta.listG.TidakLengkap')}}"class="btn btn-danger m-2">Tidak Lengkap</a>
               <a href="{{route('user.admin.harta.listG.TidakDiterima')}}" class="btn btn-danger m-2" >Tidak Diterima</a>
             </div>
           <div class="row mt-10">
                   <!-- Col md 6 -->
                   <div class="col-md-12 mt-4" >
                       <!-- basic light table card -->
                       <div class="card rounded-lg" >
                           <div class="card-body">
                               <div class="card-title">Maklumat Permohonan Memiliki Saham</div>
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
                                           </tr>
                                       </thead>
                                       <tbody align="center">
                                         @foreach($listG as $data)

                                         <tr>
                                             <td>{{ $data ->id }}</td>
                                             <td>{{ $data ->formgs->kad_pengenalan }}</td>
                                             <td>{{ $data ->formgs->name }}</td>
                                             <td>
                                                 <div class="d-flex flex-row justify-content-around align-items-center">
                                                     <a href="{{ route('user.harta.FormG.viewformG', $data->id) }}" class="btn btn-success mr-1"><i class="fa fa-eye"></i></a>
                                                 </div>
                                             </td>
                                             <td>{{ $data ->updated_at}}</td>
                                             <td>
                                               @if($data ->status == "Sedang Diproses")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Proses ke Ketua Jabatan Integriti")
                                               <span class="badge badge-warning badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Lengkap")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Tidak Diterima")
                                               <span class="badge badge-danger badge-pill">{{ $data ->status }}</span>
                                               @elseif($data ->status == "Diterima")
                                               <span class="badge badge-success badge-pill">{{ $data ->status }}</span>
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


@endsection
