@extends('user.layouts.app')
@section('content')
           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran G: Permohonan bagi mendapatkan kebenaran untuk memohon dan memiliki saham</h5>
               </div>
               @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                               <form action="{{route('d.update', $info->id)}}" method="post">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->name }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->kad_pengenalan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Tarikh Lantikan Ke Perkhidmatan Sekarang</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="date" class="form-control bg-light" name="tarikh_lantikan" placeholder="Tarikh Lantikan Ke Perkhidmatan Sekarang" value="{{ session()->get('asset.tarikh_lantikan') }}">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama Perkhidmatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" name="nama_perkhidmatan" placeholder="Nama Perkhidmatan" value="{{ session()->get('asset.nama_perkhidmatan') }}">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" name="gelaran" placeholder="Kumpulan Perkhidmatan,Gred/ Tingkatan Hakiki dan Gelaran Jawatan" value="{{ session()->get('asset.gelaran') }}">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <p><b>2.KETERANGAN MENGENAI KELUARGA</b></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama Suami / Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                                {{Auth::user()->nama_pasangan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>No.Kad Pengenalan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->kad_pengenalan_pasangan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Pekerjaan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              {{Auth::user()->pekerjaan_pasangan }}
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{Auth::user()->pekerjaan_pasangan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Umur Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{Auth::user()->pekerjaan_pasangan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{Auth::user()->pekerjaan_pasangan }}
                                            </div>
                                        </div>
                                      </div>
                                      <!-- pendapatan bulanan-->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>3. PENDAPATAN BULANAN</b></p>
                                        </div>
                                      </div>
                                      <!-- Gaji -->
                                      <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-4">
                                          <p align="center"> PEGAWAI</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p align="center"> PASANGAN</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p> 1) Gaji</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                {{Auth::user()->gaji }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ session()->get('asset.gaji_pasangan') }}">
                                        </div>
                                      </div>
                                    </br>
                                    <!-- imbuhan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ session()->get('asset.jumlah_imbuhan') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ session()->get('asset.jumlah_imbuhan_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!-- sewa -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> iii) Sewa Rumah/Kedai</p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ session()->get('asset.sewa') }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ session()->get('asset.sewa_pasangan') }}" >
                                        </div>
                                      </div>
                                      <!-- dividen -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> iv) Dividen</p>
                                        </div>
                                      </div>
                                      <input type="hidden" name="counter_dividen" value="0" id="counter_dividen">
                                      <div id="dividen_field">
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="dividen_1[]"" placeholder="Nyatakan Dividen" value="{{ session()->get('asset.jenis_dividen') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{ session()->get('asset.dividen') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{ session()->get('asset.dividen_pasangan') }}">
                                        </div>
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_dividen_button">Add</button>
                                      </div>
                                      </div>
                                      <br>
                                      </div>


                                      <script type="text/javascript">

                                        $(document).ready(function() {
                                      	// var max_fields      = 10; //maximum input boxes allowed
                                      	var wrapper   		= $("#dividen_field"); //Fields wrapper
                                      	var add_button      = $("#add_dividen_button"); //Add button ID
                                        var counter_dividen = document.getElementById("counter_dividen").value;

                                      	$(add_button).click(function(e){ //on add input button click
                                      		e.preventDefault();
                                            counter_dividen++;
                                            console.log(counter_dividen);

                                      			$(wrapper).append('<div id="dividen_add'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1['+
                                            counter_dividen+
                                            ']" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1_pegawai['+
                                            counter_dividen+
                                            ']" placeholder="Dividen Pegawai"></div></div><div class="col-md-4 mt-2 mt-md-0"><input class="form-control bg-light" type="text" name="dividen_1_pasangan['+
                                            counter_dividen+
                                            ']" placeholder="Dividen Pasangan"></div><div class="col-md-1"><a onClick="removeDividen(this,'+
                                            counter_dividen+
                                            ' ); return false;" id ="button'+counter_dividen+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeDividen(e,counter_dividen){
                                        // $(e).parents('div'+counter_pndptn+'').remove();
                                      console.log('masuk');
                                        $('#dividen_add'+counter_dividen+'').remove();
                                        $('#button'+counter_dividen+'').remove();
                                      //   var counter = document.getElementById("counter").value;
                                      //   counter--;
                                      // doctype.getElementById("counter").value = counter;
                                      }

                                      </script>

                                      <!-- lain-lain -->
                                      <!-- <input type="hidden" name="counter_pndptn" value="0" id="counter_pndptn">
                                      <div class="lain_pendapatan" id="lain_pendapatan">
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> v) Lain-Lain</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="lain3[]" placeholder="Nyatakan Lain-Lain" value="{{ session()->get('asset.lain3[]') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="lain3_pegawai[]" value="{{ session()->get('asset.lain3_pegawai[]') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" name="lain3_pasangan[]" value="{{ session()->get('asset.lain3_pasangan[]') }}">
                                        </div>
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_pendapatan_button">Add</button>
                                      </div>
                                      </div>
                                      <br>
                                      </div>



                                      <script type="text/javascript">

                                        $(document).ready(function() {
                                      	// var max_fields      = 10; //maximum input boxes allowed
                                      	var wrapper   		= $("#lain_pendapatan"); //Fields wrapper
                                      	var add_button      = $("#add_pendapatan_button"); //Add button ID
                                        var counter_pndptn = document.getElementById("counter_pndptn").value;

                                      	$(add_button).click(function(e){ //on add input button click
                                      		e.preventDefault();
                                            counter_pndptn++;

                                      			$(wrapper).append('<div id="div'+counter_pndptn+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="lain3['+
                                            counter_pndptn+
                                            ']" placeholder="Nyatakan Lain-Lain"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="lain3_pegawai['+
                                            counter_pndptn+
                                            ']"></div></div><div class="col-md-4 mt-2 mt-md-0"><input class="form-control bg-light" type="text" name="lain3_pasangan['+
                                            counter_pndptn+
                                            ']"></div><div class="col-md-1"><a onClick="removeData1(this,'+
                                            counter_pndptn+
                                            ' ); return false;" id ="gg'+counter_pndptn+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeData1(e,counter_pndptn){
                                        // $(e).parents('div'+counter_pndptn+'').remove();
                                      console.log('masuk');
                                        $('#div'+counter_pndptn+'').remove();
                                        $('#gg'+counter_pndptn+'').remove();
                                      //   var counter = document.getElementById("counter").value;
                                      //   counter--;
                                      // doctype.getElementById("counter").value = counter;
                                      }

                                      </script> -->

                                      <!-- jumlah pendapatan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                              <input class="form-control bg-light" type="text" name="pendapatan_pegawai" value="{{ session()->get('asset.pendapatan_pegawai') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                          <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ session()->get('asset.pendapatan_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>

                                      <!-- Tanggungan -->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>4. TANGGUNGAN / ANSURAN BULANAN ATAS HUTANG / PINJAMAN</b></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-4">
                                          <p align="center"> PEGAWAI</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p align="center"> PASANGAN</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>i) Jumlah Pinjaman Perumahan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" value="{{ session()->get('asset.pinjaman_perumahan_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ session()->get('asset.bulanan_perumahan_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ session()->get('asset.pinjaman_perumahan_pasangan') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ session()->get('asset.bulanan_perumahan_pasangan') }}">
                                        </div>
                                      </div>
                                      <!--PINJAMAN PERUMAHAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>i) Jumlah Pinjaman Perumahan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ session()->get('asset.pinjaman_kenderaan_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ session()->get('asset.bulanan_kenderaan_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ session()->get('asset.pinjaman_kenderaan_pasangan') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ session()->get('asset.bulanan_kenderaan_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KENDERAAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>ii) Jumlah Pinjaman Kenderaan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ session()->get('asset.pinjaman_kenderaan_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ session()->get('asset.bulanan_kenderaan_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ session()->get('asset.pinjaman_kenderaan_pasangan') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ session()->get('asset.bulanan_kenderaan_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--CUKAI PENDAPATAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iii) Cukai Pendapatan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" value="{{ session()->get('asset.jumlah_cukai_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ session()->get('asset.bulanan_cukai_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ session()->get('asset.jumlah_cukai_pasangan') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ session()->get('asset.bulanan_cukai_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KOPERASI -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iv) Pinjaman Koperasi</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_koperasi_pegawai" value="{{ session()->get('asset.jumlah_koperasi_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai" value="{{ session()->get('asset.bulanan_koperasi_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan" value="{{ session()->get('asset.jumlah_koperasi_pasangan') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan" value="{{ session()->get('asset.bulanan_koperasi_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--LAIN2 PINJAMAN -->
                                      <input type="hidden" name="counter" value="0" id="counter">

                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>v) Lain-Lain Pinjaman</p>
                                        </div>
                                      </div>
                                      <div class="table_lain" id="table_lain">
                                      <div class="row">
                                        <div class="col-md-3">
                                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ session()->get('asset.lain_lain_pinjaman[]') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" value="{{ session()->get('asset.pinjaman_pegawai[]') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ session()->get('asset.bulanan_pegawai[]') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{ session()->get('asset.pinjaman_pasangan[]') }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ session()->get('asset.bulanan_pasangan[]') }}">
                                        </div>
                                        <div class="col-md-1">
                                          <button class="add_field_button" id="add_pinjaman_button">Add</button>
                                      </div>
                                      </div>
                                      <br>
                                      </div>

                                      <!--script-->
                                      <script type="text/javascript">
                                        $(document).ready(function() {
                                      	// var max_fields      = 10; //maximum input boxes allowed
                                      	var wrapper   		= $("#table_lain"); //Fields wrapper
                                      	var add_button      = $("#add_pinjaman_button"); //Add button ID
                                        var counter = document.getElementById("counter").value;

                                      	$(add_button).click(function(e){ //on add input button click
                                      		e.preventDefault();
                                            counter++;

                                      			$(wrapper).append('<div id="divi'+counter+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="text" name="lain_lain_pinjaman['+
                                            counter+
                                            ']" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pegawai['+
                                            counter+
                                            ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pegawai['+
                                            counter+
                                            ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pasangan['+
                                            counter+
                                            ']"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pasangan['+
                                            counter+
                                            ']"></div><div class="col-md-1"><a onClick="removeData(this,'+
                                            counter+
                                            ' ); return false;" id ="del'+counter+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeData(e,counter){
                                      //$(e).parents('div'+counter+'').remove();
                                      console.log('masuk');
                                        $('#divi'+counter+'').remove();
                                        $('#del'+counter+'').remove();
                                       //  var counter = document.getElementById("counter").value;
                                       //  counter--;
                                       // doctype.getElementById("counter").value = counter;
                                      }
                                      </script>

                                      <!--JUMLAH PINJAMAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai" value="{{ session()->get('asset.jumlah_pinjaman_pegawai') }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai" value="{{ session()->get('asset.jumlah_bulanan_pegawai') }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan" value="{{ session()->get('asset.jumlah_pinjaman_pasangan')}}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" value="{{ session()->get('asset.jumlah_bulanan_pasangan') }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. BUTIR-BUTIR TANAH YANG TELAH DIBERIMILIK OLEH KERAJAAN DI MANA MANA TEMPAT DI MALAYSIA</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Tanah Pertanian</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light"name="luas_pertanian" placeholder="Luas" value="{{ session()->get('asset.luas_pertanian') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light"name="lot_pertanian" placeholder="No. Lot" value="{{ session()->get('asset.lot_pertanian') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_pertanian" placeholder="Mukim" value="{{ session()->get('asset.mukim_pertanian') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_pertanian" placeholder="Negeri" value="{{ session()->get('asset.negeri_pertanian') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Tanah Perumahan</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas_perumahan"placeholder="Luas" value="{{ session()->get('asset.luas_perumahan') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot_perumahan" placeholder="No. Lot" value="{{ session()->get('asset.lot_perumahan') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim_perumahan" placeholder="Mukim" value="{{ session()->get('asset.mukim_perumahan') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri_perumahan" placeholder="Negeri" value="{{ session()->get('asset.negeri_perumahan') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Tarikh Diperolehi</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="date" class="form-control bg-light" name="tarikh_diperolehi" placeholder="Luas" value="{{ session()->get('asset.tarikh_diperolehi') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>6. BUTIR-BUTIR TANAH ATAU SAHAM YANG DIPOHON</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>i) Butir- butir lengkap mengenai tanah Kerajaan yang hendak dipohon dan dimiliki: </b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Luas</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="luas" placeholder="Luas" value="{{ session()->get('asset.luas') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>No.Lot</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="lot" placeholder="No. Lot" value="{{ session()->get('asset.lot') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Mukim</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="mukim" placeholder="Mukim" value="{{ session()->get('asset.mukim') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Negeri</p>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <input type="text" class="form-control bg-light" name="negeri" placeholder="Negeri" value="{{ session()->get('asset.negeri') }}">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p>Jenis Tanah</p>
                                          </div>
                                          <div class="col-md-8">
                                            <input type="radio" id="pertanian" name="jenis_tanah" value="pertanian" {{ old('jenis_tanah') == "pertanian" ? 'selected' : '' }}>
                                                <label for="pertanian">Tanah Pertanian</label><br>
                                            <input type="radio" id="perumahan" name="jenis_tanah" value="perumahan" {{ old('jenis_tanah') == "perumahan" ? 'selected' : '' }}>
                                                <label for="perumahan">Tanah Perumahan</label><br>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-8">
                                        <p><b>ii) Butir- butir saham yang dipohon </b></p>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Nama Syarikat</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="nama_syarikat" placeholder="Nama Syarikat" value="{{ session()->get('asset.nama_syarikat') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Modal Berbayar (Paid Up Capital)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="modal_berbayar" placeholder="Modal Berbayar (Paid Up Capital)" value="{{ session()->get('asset.modal_berbayar') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Jumlah Unit Nilai Saham Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="jumlah_unit_saham" placeholder="Jumlah Unit" value="{{ session()->get('asset.jumlah_unit_saham') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Nilai Saham</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="nilai_saham" placeholder="Nilai Saham" value="{{ session()->get('asset.nilai_saham') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Sumber Kewangan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" name="sumber_kewangan" placeholder="Sumber Kewangan" value="{{ session()->get('asset.sumber_kewangan') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-8">
                                        <p><b>iii) Jika melibatkan pinjaman, Nyatakan: </b></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-2">
                                        <p><b>Nama Institusi </b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Alamat Institusi</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Ansuran Bulanan</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Tarikh Ansuran Pertama</b></p>
                                      </div>
                                      <div class="col-md-2">
                                        <p><b>Tempoh Pinjaman</b></p>
                                      </div>
                                    </div>

                                  <input type="hidden" name="counter_saham" value="0" id="counter_saham">
                                  <div class="saham" id="saham">
                                    <div class="row">
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi" value="{{ session()->get('asset.institusi') }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="alamat_institusi[]" placeholder="Alamat Institusi" value="{{ session()->get('asset.alamat_institusi') }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="ansuran_bulanan[]" placeholder="Ansuran Bulanan" value="{{ session()->get('asset.ansuran_bulanan') }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="date" class="form-control bg-light" name="tarikh_ansuran[]" placeholder="Tarikh Ansuran Pertama" value="{{ session()->get('asset.tarikh_ansuran') }}">
                                      </div>
                                      <div class="col-md-2">
                                        <input type="text" class="form-control bg-light" name="tempoh_pinjaman[]" placeholder="Tempoh Pinjaman" value="{{ session()->get('asset.tempoh_pinjaman') }}">
                                      </div>
                                      <div class="col-md-1">
                                        <button class="add_field_button" id="add_saham_button">Add</button>
                                    </div>
                                    </div>
                                    <br>
                                </div>
                                    <br>
                                    <br>



                                      <div class="row">
                                          <div class="col-md-12">
                                            <input type="checkbox" name="pengakuan" value="pengakuan_pegawai" >
                                            <label for="pengakuan"> Saya mengaku bahawa segala maklumat yang diberikan dalam borang ini adalah lengkap dan benar.</label><br>
                                            <label> Dengan ini saya memohon kelulusan untuk memiliki tanah/saham* seperti yang dinyatakan di atas dan berjanji akan mematuhi syarat-syarat yang ditetapkan.</label><br>
                                          </div>
                                      </div>
                                  <!-- button -->
                                     <div class="row">
                                      <div class="col-md-2">
                                        <a class="btn btn-primary mt-4" href="">Kembali</a>
                                        <!-- <button type="submit" class="btn btn-primary mt-4">Kembali</button> -->
                                      </div>
                                      <div class="col-md-8">
                                      </div>
                                      <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary mt-4">Hantar</button>
                                    <!-- <button type="submit" class="btn btn-primary mt-4">Seterusnya</button> -->
                                      </div>
                                </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>



           <!--script-->
           <script type="text/javascript">
             $(document).ready(function() {
             // var max_fields      = 10; //maximum input boxes allowed
             var wrapper   		= $("#saham"); //Fields wrapper
             var add_button      = $("#add_saham_button"); //Add button ID
             var counter_saham = document.getElementById("counter_saham").value;

             $(add_button).click(function(e){ //on add input button click
               e.preventDefault();
                 counter_saham++;
                 console.log(counter_saham);

                 $(wrapper).append('<div id="saham'+counter_saham+'"  class="row"><div class="col-md-2"><input type="text" class="form-control bg-light" name="institusi[]" placeholder="Nama Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="alamat_institusi['+
                 counter_saham+']" placeholder="Alamat Institusi"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="ansuran_bulanan['+
                 counter_saham+']" placeholder="Ansuran Bulanan"></div><div class="col-md-2"><input type="date" class="form-control bg-light" name="tarikh_ansuran['+
                 counter_saham+']" placeholder="Tarikh Ansuran Pertama"></div><div class="col-md-2"><input type="text" class="form-control bg-light" name="tempoh_pinjaman['+
                 counter_saham+']" placeholder="Tempoh Pinjaman"></div><div class="col-md-1"><a onClick="removeDataSaham(this,'+counter_saham+' ); return false;" id ="delsaham'+counter_saham+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

             });
           });

           function removeDataSaham(e,counter_saham){
           //$(e).parents('div'+counter+'').remove();
           console.log('masuk');
             $('#saham'+counter_saham+'').remove();
             $('#delsaham'+counter_saham+'').remove();
            //  var counter = document.getElementById("counter").value;
            //  counter--;
            // doctype.getElementById("counter").value = counter;
           }
           </script>
@endsection
