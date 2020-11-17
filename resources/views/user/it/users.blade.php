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
                      <div class="card-title">Senarai Pengguna</div>
                        <!-- Tab nav -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-active-tab" data-toggle="pill" href="#pills-active" role="tab" aria-controls="pills-active" aria-selected="true">Pengguna Aktif</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-deactivate-tab" data-toggle="pill" href="#pills-deactivate" role="tab" aria-controls="pills-deactivate" aria-selected="false">Pengguna Nyahaktif</a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                              <table class="table table-striped table-bordered" id="example" style="width: 100%;">

                                <thead>
                                  <tr>
                                    <th class="all">Nama</th>
                                    <th class="all">Email</th>
                                    <th class="all">Peranan</th>
                                    <th class="all">Kad Pengenalan</th>
                                    <th class="all">Butang Tindakan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($user as $data)
                                  <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email  }}</td>
                                    <td>
                                      <form action="{{route('user.update', $data->id)}}" method="POST">
                                      @csrf
                                      <div class="row">
                                      <div class="col-md-8">
                                        <select id="role" class="custom-select  bg-light" name="role" value="{{ old('role', $data->role) }}">
                                            <option value="1" {{ old('role',$data->role)=='1' ? 'selected' : ''  }}>Pentadbir Sistem</option>
                                            <option value="2" {{ old('role',$data->role)=='2' ? 'selected' : ''  }}>Ketua Jabatan Integriti</option>
                                            <option value="3" {{ old('role',$data->role)=='3' ? 'selected' : ''  }}>Ketua Bahagian</option>
                                            <option value="4"{{ old('role',$data->role)=='4' ? 'selected' : ''  }}>IT Admin</option>
                                            <option value="5"{{ old('role',$data->role)=='5' ? 'selected' : ''  }}>Pengguna</option>
                                        </select>
                                      </div>
                                      <div class="col-md-2">
                                        <button type="submit" name="submit" onclick=" return confirm('Set Peranan ?');" class="btn btn-primary mt-4">Set</button>
                                      </div>
                                      </div>
                                    </form>
                                    </td>
                                    <!-- @if($data->role == 1)
                                    <td> Pentadbir Sistem (Admin) </td>
                                    @elseif($data->role == 2)
                                    <td> Ketua Bahagian Integriti </td>
                                    @elseif($data->role == 3)
                                    <td> Ketua Bahagian </td>
                                    @elseif($data->role == 4)
                                    <td> Pegawai IT </td>
                                    @elseif($data->role == 5)
                                    <td> Pengguna </td>
                                    @endif -->
                                    <td>{{ $data->kad_pengenalan }}</td>
                                    <td class="p-3">
                                          <div class="d-flex flex-row justify-content-around align-items-center">
                                              @if($currentUser->id != $data->id)
                                              <a href="{{ route('user.it.users.deactivate', $data->id) }}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
                                              @else
                                              <a href="#" class="btn btn-dark"><i class="fas fa-times-circle"></i></a>
                                              @endif
                                          </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane fade" id="pills-deactivate" role="tabpanel" aria-labelledby="pills-deactivate-tab">
                              <div class="table-responsive">

                              <table class="table table-striped table-bordered" id="example1" style="width: 100%;">

                                <thead>
                                  <tr>
                                    <th class="all">Nama</th>
                                    <th class="all">Email</th>
                                    <th class="all">Peranan</th>
                                    <th class="all">Kad Pengenalan</th>
                                    <th class="all">Butang Tindakan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($user_deact as $data)
                                  <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email  }}</td>
                                    <td>{{ $data->email  }}</td>
                                    <td>{{ $data->kad_pengenalan }}</td>
                                    <td class="p-3">
                                          <div class="d-flex flex-row justify-content-around align-items-center">
                                              @if($currentUser->id != $data->id)
                                              <a href="{{ route('user.it.users.deactivate', $data->id) }}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
                                              @else
                                              <a href="#" class="btn btn-dark"><i class="fas fa-times-circle"></i></a>
                                              @endif
                                          </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>

                            </div>
                      </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function() {
                var buttonCommon = {
                  exportOptions: {
                       // Any other settings used
                       grouped_array_index: 0,
                  },
                };
                var groupColumn = 1;
                var table = $('#example').DataTable({
                     dom: 'Bfrtip',
                     buttons: [
                     $.extend( true, {}, buttonCommon, {
                         extend: 'copyHtml5'
                     } ),
                     $.extend( true, {}, buttonCommon, {
                         extend: 'excelHtml5'
                     } ),
                     $.extend( true, {}, buttonCommon, {
                         extend: 'pdfHtml5'
                     } )
                 ]
                 } );
             } );
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
                 var table = $('#example1').DataTable({
                      dom: 'Bfrtip',
                      buttons: [
                      $.extend( true, {}, buttonCommon, {
                          extend: 'copyHtml5'
                      } ),
                      $.extend( true, {}, buttonCommon, {
                          extend: 'excelHtml5'
                      } ),
                      $.extend( true, {}, buttonCommon, {
                          extend: 'pdfHtml5'
                      } )
                  ]
                  } );
              } );
              </script>
@endsection
