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
                      <div class="card-title">Backup</div>
                      <div class="row">
                       <div class="col-md-2">
                         <a href="{{route('user.it.backup.run')}}"><button class="btn btn-primary mb-4">Create Full Backup</button></a>
                       </div>
                       <div class="col-md-2">
                         <a href="{{route('user.it.backup.run-system')}}"><button class="btn btn-primary mb-4">Create System Backup</button></a>
                       </div>
                       <div class="col-md-2">
                         <a href="{{route('user.it.backup.run-database')}}"><button class="btn btn-primary mb-4">Create Database Backup</button></a>
                       </div>
                     </div>
                      <div class="table-responsive">

                      <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                        <!-- Table head -->
                        <thead>
                            <tr>
                              <th class="all">Nama</th>
                              <th class="all">Disk</th>
                              <th class="all">Reachable</th>
                              <th class="all">Healty</th>
                              <th class="all">Newest Backup</th>
                              <th class="all">Used Storage</th>
                              <th class="all">Fail</th>

                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="table table-striped table-bordered" id="responsiveDataTable">
                          @foreach($rows as $row)
                          <td>{{$row["backupName"]}}</td>
                          <td>{{$row["disk"]}}</td>
                          <td>{{$row["reachable"]}}</td>
                          <td>{{$row["healthy"]}}</td>
                          <td>{{$row["newest"]}}</td>
                          <td>{{$row["usedStorage"]}}</td>
                          @endforeach
                          <td>
                            <table>
                              <thead>
                                  <th class="all">Nama Fail</th>
                                  <th class="all">Tarikh</th>
                                  <th class="all">Tindakan</th>
                              </thead>
                              <tbody>
                                @if(!is_null($data))
                                @foreach($data as $file)
                                <tr>
                                  <td>{{$file['filename']}}</td>
                                  <td>{{Carbon\Carbon::parse($file['date'])->format('d-m-Y h:i:s') }}</td>

                                  <td><a href="{{route('user.it.backup.download', ['filename'=>$file['filename']])}}" class="btn btn-success"><i class="fas fa-download"></i></a></td>
                                </tr>
                                @endforeach
                                @endif
                              </tbody>
                            </table>
                          </td>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
            </div>
        </main>
        <script type="text/javascript">

        </script>
@endsection
