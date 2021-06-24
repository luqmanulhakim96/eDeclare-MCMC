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
                      <div class="card-title">Konfigurasi Sistem</div>
                      <div class="col-mr-2">
                        <form method="POST" action="{{route('user.it.konfigurasi.edit')}}" enctype="multipart/form-data">
                          @csrf
                          <div class="col-md-6">
                            <button type="submit" onclick="return confirm('Anda pasti maklumat ini tepat? ');" class="btn btn-primary mb" id="submit-form">Kemaskini Maklumat</button>
                          </div>
                          <div class="card-body">
                            <h5>Aplikasi</h5>
                            <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th class="all">Atribut</th>
                                  <th class="all">Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td  style="width: 20%;">{{ucfirst($attributes_config_app[0])}} <small>(*Changes in Name will require user to logout the system)</small></td>
                                  <td><input id="aplikasi_name" type="text" class="form-control bg-light" name="aplikasi_name" value="{{$config_app['name']}}" autocomplete="aplikasi_name" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_app[2])}} <small>(1=true/0=false)</small></td>
                                  <td><input id="aplikasi_debug" type="text" class="form-control bg-light" name="aplikasi_debug" value="{{$config_app['debug']}}" autocomplete="aplikasi_debug" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_app[3])}}</td>
                                  <td><input id="aplikasi_url" type="text" class="form-control bg-light" name="aplikasi_url" value="{{$config_app['url']}}" autocomplete="aplikasi_url" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <!-- <tr>
                                  <td>{{ucfirst($attributes_config_app[5])}}</td>
                                  <td><input id="aplikasi_timezone" type="text" class="form-control bg-light" name="aplikasi_timezone" value="{{$config_app['timezone']}}" autocomplete="aplikasi_timezone" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr> -->
                              </tbody>
                            </table>
                          </div>
                          <div class="card-body">
                            <h5>Pengkalan Data</h5>
                            <table class="table table-striped table-bordered" id="responsiveDataTable2" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th class="all">Atribut</th>
                                  <th class="all">Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style="width: 20%;">{{ucfirst($attributes_config_database[2])}}</td>
                                  <td><input id="database_host" type="text" class="form-control bg-light" name="database_host" value="{{$config_database_sqlsrv['host']}}" autocomplete="database_host" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_database[3])}}</td>
                                  <td><input id="database_port" type="text" class="form-control bg-light" name="database_port" value="{{$config_database_sqlsrv['port']}}" autocomplete="database_port" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_database[4])}}</td>
                                  <td><input id="database_database" type="text" class="form-control bg-light" name="database_database" value="{{$config_database_sqlsrv['database']}}" autocomplete="database_database" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_database[5])}}</td>
                                  <td><input id="database_username" type="text" class="form-control bg-light" name="database_username" value="{{$config_database_sqlsrv['username']}}" autocomplete="database_username" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_database[6])}}</td>
                                  <td><input id="database_password" type="text" class="form-control bg-light" name="database_password" value="{{$config_database_sqlsrv['password']}}" autocomplete="database_password" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="card-body">
                            <h5>Emel</h5>
                            <table class="table table-striped table-bordered" id="responsiveDataTable3" style="width: 100%;">
                              <thead>
                                <tr>
                                  <th class="all">Atribut</th>
                                  <th class="all">Nilai</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style="width: 20%;">{{ucfirst($attributes_config_mail_smtp[1])}}</td>
                                  <td><input id="smtp_host" type="text" class="form-control bg-light" name="smtp_host" value="{{$config_mail_smtp['host']}}" autocomplete="smtp_host" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_smtp[2])}}</td>
                                  <td><input id="smtp_port" type="text" class="form-control bg-light" name="smtp_port" value="{{$config_mail_smtp['port']}}" autocomplete="smtp_port" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_smtp[3])}} <small>(tls/ssl)</small></td>
                                  <td><input id="smtp_encryption" type="text" class="form-control bg-light" name="smtp_encryption" value="{{$config_mail_smtp['encryption']}}" autocomplete="smtp_encryption" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_smtp[4])}}</td>
                                  <td><input id="smtp_username" type="text" class="form-control bg-light" name="smtp_username" value="{{$config_mail_smtp['username']}}" autocomplete="smtp_username" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_smtp[5])}}</td>
                                  <td><input id="smtp_password" type="text" class="form-control bg-light" name="smtp_password" value="{{$config_mail_smtp['password']}}" autocomplete="smtp_password" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_from[0])}}</td>
                                  <td><input id="smtp_address" type="text" class="form-control bg-light" name="smtp_address" value="{{$config_mail_from['address']}}" autocomplete="smtp_address" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                                <tr>
                                  <td>{{ucfirst($attributes_config_mail_from[1])}}</td>
                                  <td><input id="smtp_name" type="text" class="form-control bg-light" name="smtp_name" value="{{$config_mail_from['name']}}" autocomplete="smtp_name" onchange=""="this.value = this.value.toUpperCase();"></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
            <br><br><br><br>
            
          </main>
@endsection
