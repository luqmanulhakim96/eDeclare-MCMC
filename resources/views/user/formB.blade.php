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
                              <form action="#">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Name">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="No. Kad Pengenalan">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Jawatan / Gred">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Alamat Tempat Bertugas">
                                          </div>
                                      </div>
                                  </div>

                                  <!-- keluarga -->
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
                                              <input type="text" class="form-control bg-light" placeholder="Nama Pasangan">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>No.Kad Pengenalan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="No. Kad Pengenalan Pasangan">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Pekerjaan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="text" class="form-control bg-light" placeholder="Pekerjaan Pasangan">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" placeholder="Nama Anak/ Tanggungan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Umur Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" placeholder="Umur Anak/ Tanggungan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-light" placeholder="No.Kad Pengenalan Anak/ Tanggungan">
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
                                                <input class="form-control bg-light" type="text" name="gaji_pegawai" placeholder="Gaji Pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan">
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
                                                <input class="form-control bg-light" type="text" name="imbuhan_pegawai" placeholder="Imbuhan Pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="imbuhan_pasangan" placeholder="Imbuhan Pasangan">
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
                                                <input class="form-control bg-light" type="text" name="sewa_pegawai" placeholder="Sewa Pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan">
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
                                                <input class="form-control bg-light" type="text" name="dividen_1" placeholder="Nyatakan Dividen">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="dividen_1_pegawai" placeholder="Dividen Pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="dividen_1_pasangan" placeholder="Dividen Pasangan">
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
                                      <input type="hidden" name="counter_pndptn" value="0" id="counter_pndptn">
                                      <div class="lain_pendapatan" id="lain_pendapatan">
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> v) Lain-Lain</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="lain3[]" placeholder="Nyatakan Lain-Lain">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="lain3_pegawai[]">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="lain3_pasangan[]">
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
                                            ' ); return false;" id ="delete'+counter_pndptn+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeData1(e,counter_pndptn){
                                        // $(e).parents('div'+counter_pndptn+'').remove();
                                      console.log('masuk');
                                        $('#div'+counter_pndptn+'').remove();
                                        $('#delete'+counter_pndptn+'').remove();
                                      //   var counter = document.getElementById("counter").value;
                                      //   counter--;
                                      // doctype.getElementById("counter").value = counter;
                                      }

                                      </script>

                                      <!-- jumlah pendapatan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="pendapatan_pegawai">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="pendapatan_pasangan">
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
                                        </div>
                                        <div class="col-md-2">
                                          <p align="center">Jumlah Pinjaman / Tanggungan (RM)</p>
                                        </div>
                                        <div class="col-md-2">
                                          <p align="center">Jumlah Bayaran Bulanan (RM)</p>
                                        </div>
                                          <div class="col-md-2">
                                            <p align="center">Jumlah Pinjaman / Tanggungan (RM)</p>
                                          </div>
                                          <div class="col-md-2">
                                            <p align="center">Jumlah Bayaran Bulanan (RM)</p>
                                        </div>
                                      </div>
                                      <!--PINJAMAN PERUMAHAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>i) Jumlah Pinjaman Perumahan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KENDERAAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>ii) Jumlah Pinjaman Kenderaan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan">
                                        </div>
                                      </div>
                                      <br>
                                      <!--CUKAI PENDAPATAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iii) Cukai Pendapatan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KOPERASI -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iv) Pinjaman Koperasi</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_koperasi_pegawai">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan">
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
                                          <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_pegawai[]">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_pasangan[]">
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
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Jenis Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jenis_harta">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum">
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Hubungan dengan Pemilik">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Tarikh Pemilikan Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="kuantiti_harta">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Nilai Perolehan Harta (RM)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_harta">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>Cara Dan Dari Siapa Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_peroleh">
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nama_pemilikan_asal">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>a)	Jika Pinjaman, Nyatakan</b></p>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>i) Jumlah Pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii)	Institusi memberi pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="institusi_pinjaman">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii)	Tempoh bayaran balik</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="tempoh_bayaran">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Ansuran bulanan </p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="ansuran_bulanan">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh ansuran pertama</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_ansuran_pertama">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>b) Hasil Pelupusan Harta, Nyatakan</b></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>i)	Jenis Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jenis_harta">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii) Alamat</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="alamat_asset">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii) No Pendaftaran Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Harga Jualan</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="harga_jualan">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh lupus</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_lupus">
                                        </div>
                                      </div>
                                      <br>
                                      <br>

                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-2">
                                      <a class="btn btn-primary mt-4"href="{{ route('user.formC') }}">Seterusnya</a>
                                      <!-- <button type="button" class="btn btn-primary mt-4" a href="{{ route('user.formC') }}">Seterusnya</button> -->
                                    </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
@endsection
