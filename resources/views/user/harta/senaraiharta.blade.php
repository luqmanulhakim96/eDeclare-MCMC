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
                                   <table class="table table-responsive text-dark">
                                       <thead class="thead-light">
                                           <tr class="text-center">
                                               <th width="10%"><p class="mb-0">Bil</p></th>
                                               <th width="30%"><p class="mb-0">Nama</p></th>
                                               <th width="30"><p class="mb-0">No Kad Pengenalan</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran B</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran C</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran D</p></th>
                                               <th width="10%"><p class="mb-0">Lampiran G</p></th>
                                               <th width="70%"><p class="mb-0">Tarikh</p></th>
                                               <th width="30%"><p class="mb-0">Status</p></th>
                                               <th width="30%"><p class="mb-0">Tindakan</p></th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <!-- Table data -->
                                           <tr class="text-center">
                                               <td><p class="mb-0 font-weight-bold">1</p></td>
                                               <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                               <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td>
                                               <td><p class="mb-0 font-weight-bold">13-04-2019</p></td>
                                               <td><span class="badge badge-warning badge-pill">Sedang Diproses</span></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                       <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                                   </div>
                                               </td>
                                           </tr>
                                           <!-- Table data -->
                                           <tr class="text-center">
                                               <td><p class="mb-0 font-weight-bold">2</p></td>
                                               <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                               <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td>
                                               <td><p class="mb-0 font-weight-bold">17-02-2015</p></td>
                                               <td><span class="badge badge-danger badge-pill">Dibatalkan</span></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                       <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                                   </div>
                                               </td>
                                           </tr>

                                           <tr class="text-center">
                                               <td><p class="mb-0 font-weight-bold">3</p></td>
                                               <td><p class="mb-0 font-weight-bold">{{Auth::user()->name }}</p></td>
                                               <td><p class="mb-0 font-weight-bold">971112065055</p></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td><td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fa fa-eye text-success"></i></a>
                                                   </div>
                                               </td>
                                               <td><p class="mb-0 font-weight-bold">30-09-2010</p></td>
                                               <td><span class="badge badge-success badge-pill">Selesai</span></td>
                                               <td class="p-3">
                                                   <div class="d-flex flex-row justify-content-around align-items-center">
                                                       <a href="#"><i class="fas fa-pencil-alt text-success"></i></a>
                                                       <a href="#"><i class="fa fa-print text-info" aria-hidden="true"></i></a>
                                                   </div>
                                               </td>
                                           </tr>
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
