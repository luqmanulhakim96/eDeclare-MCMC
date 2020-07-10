@extends('layouts.app_user')
@section('content')
      <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                
                <!-- Small card component -->

                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Senarai Pemohonan</div>
                      <a class="btn btn-primary m-2" href="{{ route('user.add') }}">Pemohonan Baru</a>
                      <table class="table table-striped table-bordered" id="list_permohonan_user" style="width: 100%;">
                        <!-- Table head -->
                        <thead>
                            <tr>
                              <th class="all">JENIS DOKUMEN</th>
                              <th class="all">JENIS DATA</th>
                              <th class="all">NEGERI</th>
                              <th class="all">TAHUN / KATEGORI DATA</th>
                              <th class="all">TARIKH PERMOHONAN</th>
                              <th class="all">STATUS PERMOHONAN</th>
                              <th class="all">STATUS PEMBAYARAN</th>
                              <th class="all">UPDATE PERMOHONAN</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                          @foreach($list as $data)
                          <tr>
                            <td>{{ $data->jenis_dokumen  }}</td>
                            <td>{{ $data->jenis_data  }}</td>
                            <td>{{ $data->negeri  }}</td>
                            <td>{{ $data->tahun  }} {{ $data->kategori_data  }}</td>
                            <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>{{ $data->status_permohonan  }}</td>
                            <td>{{ $data->status_pembayaran  }}</td>
                            <td class="p-3">
                                  <div class="d-flex flex-row justify-content-around align-items-center">
                                      <a href="{{ route('user.edit', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                  </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </main>
@endsection
