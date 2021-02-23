@extends('user.layouts.app')
@section('content')

        <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        </head>
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran B: Borang Perisytiharan Harta</h5>
               </div>



               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                                <div class="page-body p-4 text-dark">
                                  <div class="row">
                                    <div class="col-md-2">
                                        <p>Ulasan Admin</p>
                                     </div>
                                     <div class="col-md-8">
                                       <p>{{ $listHarta->ulasan_admin }} </p><p>( {{ $listHarta->nama_admin }} , {{ $listHarta->no_admin }} )</p><br>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <div class="col-md-2">
                                         <p>Ulasan Ketua Jabatan Integriti</p>
                                      </div>
                                      <div class="col-md-8">
                                        <p>{{ $listHarta->ulasan_hod}} </p><p>( {{ $listHarta->nama_hod }} , {{ $listHarta->no_hod }} )</p><br>
                                      </div>
                                    </div>
                                  <form action="{{route('ulasanHODivB.update', $listHarta->id)}}" method="post">
                                   @csrf
                                  <div class="row">
                                    <div class="col-md-2">
                                        <p>Nama</p>
                                     </div>
                                     <div class="col-md-8">
                                       <input type="text" class="form-control bg-light" name="nama_hodiv" value="{{Auth::user()->name }}" readonly><br>
                                     </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-2">
                                         <p>No Staff</p>
                                       </div>
                                       <div class="col-md-8">
                                         @foreach($staffinfo as $ic)
                                           <input type="text" class="form-control bg-light" name="no_hodiv" value="{{$ic->STAFFNO}}" readonly><br>
                                         @endforeach
                                        </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-2">
                                         <p>No Kad Pengenalan</p>
                                       </div>
                                       <div class="col-md-8">
                                         @foreach($staffinfo as $ic)
                                           <input type="text" class="form-control bg-light" name="kad_pengenalan" value="{{$ic->ICNUMBER}}" readonly><br>
                                         @endforeach
                                        </div>
                                   </div>
                                       <div class="row">
                                         <div class="col-md-2">
                                           <p>Ulasan Ketua Bahagian</p>
                                         </div>
                                           <div class="col-md-8">
                                                <textarea class="form-control bg-light" name="ulasan_hodiv" rows="4" cols="50" placeholder="Ulasan Ketua Bahagian"></textarea><br>


                                                <input type="radio" id="diterima" name="status" value="Proses ke Ketua Jabatan Integriti">
                                                    <label for="Proses ke Ketua Jabatan Integriti">Proses ke Ketua Jabatan Integriti</label><br>

                                                  <!-- button -->
                                                  <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
                                                    </div>
                                                    <div class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-sm" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                          </div>
                                                          <div class="modal-body">
                                                          <p align="center">Hantar untuk pengesahan?</p>
                                                          </div>
                                                          <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                          <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                          </div>
                                                      </div>
                                                      </div>
                                                  </div>
                                           </div>
                                         </div>
                                     </form>
                                   </div>
                                </div>
                            </div>
                      </div>
                </div>
          </div>
@endsection
