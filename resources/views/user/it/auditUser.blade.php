@extends('user.layouts.app')
@section('content')
            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <!-- <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small> -->
                </div>
                <!-- Small card component -->
                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Audit Trail</div>
                      <a class="btn btn-primary mb-2" href="{{route('user.it.audit')}}">Audit Sistem</a>

                      <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                        <!-- Table head -->
                        <thead class="thead-light">
                            <tr>
                              <th class="all">Nama Pengguna</th>
                              <th class="all">Peranan</th>
                              <th class="all">Alamat IP</th>
                              <th class="all">Masa</th>
                              <th class="all">Pengkalan Data</th>
                              <th class="all">Acara</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                          @foreach($data as $datas)
                            @if( $datas->user_id != NULL)
                            <tr>
                            @if($datas->user->name == NULL)
                            <td>Tiada</td>
                            @else
                            <td>{{  ucfirst($datas->user->name) }}</td>
                            @endif
                            @if($datas->user->role == 1)
                            <td> Pentadbir Sistem (Admin) </td>
                            @elseif($datas->user->role == 2)
                            <td> Integrity HOD </td>
                            @elseif($datas->user->role == 3)
                            <td> Pegawai HR </td>
                            @elseif($datas->user->role == 4)
                            <td> Pegawai Admin </td>
                            @elseif($datas->user->role == 5)
                            <td> Pegawai HR </td>
                            @endif
                            <td>{{ $datas->ip_address }}</td>
                            <td>{{  Carbon\Carbon::parse($datas->updated_at)->format('M-d-Y h:i:s')  }}</td>
                            <td>{{ substr($datas->auditable_type, strpos($datas->auditable_type, "/") + 4) }}</td>

                            @if($datas->event == "Log Masuk")
                            <td><span class="badge m-1 badge-success" style="font-size:12px;">Log Masuk</span></td>
                            @else
                            <td><span class="badge m-1 badge-warning" style="font-size:12px;">Log Keluar</span></td>
                            @endif
                          </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
            </div>
@endsection
