@extends('user.layouts.app')

@section('content')

<div class="page-body p-4 text-dark">

                <!-- Small card component -->
                <div class="card rounded-lg">
                <div class="card-body">
                      <div class="card-titleuser"><b>Selamat Datang Ke Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC)</b></div>
                </div>
                </div><br><br>


                <div class="card rounded-lg">
            <div class="card-body">
                      <div class="card-title"><b>Tatacara Penggunaan Untuk Mengisi Permohonan.</b></div>
                      <div class="card-title">1. Mendaftar masuk di Portal Perisytiharan Harta dan Pemberian Hadiah Suruhanjaya Komunikasi dan Multimedia Malaysia (MCMC).</div>
                      <div class="card-title">2. Klik Perakuan Tiada Penambahan Harta  untuk mengisi Borang Lampiran A: Borang Pengakuan Tiada Perubahan ke atas Pemilikan Harta.</div>
                      <div class="card-title">3. Klik Perisytiharan Harta Baharu untuk mengisi Borang Lampiran B, C dan D.</div>
                      <div class="card-title">4. Klik Penerimaan Hadiah Baharu untuk mengisi Borang Lampiran A: Borang Penerimaan Hadiah.</div>
                      <div class="card-title">5. Klik butang "Hantar" untuk menghantar permohonan.</div>
                </div>
            </div><br><br>

            <div class="card rounded-lg">
                  <div class="card-body">


                      <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                        <!-- Table head -->
                        <thead>
                            <tr>
                              <th class="all">ID</th>
                              <th class="all">STATUS PERISYTIHARAN HARTA</th>
                              <th class="all">TARIKH PERISYTIHARAN HARTA</th>
                              <th class="all">TARIKH PERAKUAN PEMBERIAN HADIAH </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->created_at}}</td>

                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>






                </div>

    </div>



@endsection
