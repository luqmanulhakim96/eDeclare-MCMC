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
                              <form action="{{route('b.update', $info->id)}}" method="POST">
                                @csrf
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->nama_pegawai}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          {{$info->kad_pengenalan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->jawatan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            {{$info->jabatan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }}
                                          </div>
                                      </div>
                                  </div>

                                  <!-- keluarga -->
                                  @foreach($maklumat_pasangan as $maklumat_pasangan)
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
                                            @if($maklumat_pasangan->NOKNAME != null)
                                              <input type="hidden" name="nama_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->NOKNAME}}
                                              @else
                                              -
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>No.Kad Pengenalan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @if($maklumat_pasangan->ICNEW != null)
                                              <input type="hidden" name="ic_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->ICNEW}}
                                              @else
                                              -
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p>Pekerjaan Suami/Isteri</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            @if($maklumat_pasangan->NOKEMLOYER != NULL)
                                              <input type="hidden" name="pekerjaan_pasangan" value="{{$maklumat_pasangan->NOKNAME}}">{{$maklumat_pasangan->NOKEMLOYER}}
                                              @else
                                              -
                                              @endif

                                          </div>
                                      </div>
                                    </div>
                                    @endforeach
                                    @foreach($maklumat_anak as $maklumat_anak)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_pasangan->NOKNAME != null)
                                              <input type="hidden" name="nama_anak" value="{{$maklumat_anak->NOKNAME}}">{{$maklumat_anak->NOKNAME}}
                                              @else
                                              -
                                              @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>Umur Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="hidden" name="umur_anak" value="{{Auth::user()->umur_anak }}">{{Auth::user()->umur_anak }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($info->ic_anak != NULL)
                                                <input type="hidden" name="ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}}
                                                @else
                                                -
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                      @endforeach

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
                                              {{ $info->gaji  }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ $info->gaji_pasangan  }}">
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
                                                <input class="form-control bg-light" type="text" name="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ $info->jumlah_imbuhan  }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $info->jumlah_imbuhan_pasangan  }}">
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
                                                <input class="form-control bg-light" type="text" name="sewa" placeholder="Sewa Pegawai" value="{{ $info->sewa  }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $info->sewa_pasangan  }}">
                                        </div>
                                      </div>
                                      <!-- dividen -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <p> iv) Dividen</p>
                                        </div>
                                      </div>
                                      <input type="hidden" name="counter_dividen" value="{{$count_div}}" id="counter_dividen">
                                      <div id="dividen_field">


                                      @foreach($listDividenB as $data)
                                      <div id="dividen_add{{$data->dividen_id}}" class="row">
                                            <div class="col-md-3 mt-2 mt-md-0">
                                                <div class="input-group">
                                                    <input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen" value="{{$data->dividen_1}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2 mt-md-0">
                                                <div class="input-group">
                                                    <input class="form-control bg-light" type="text" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai" value="{{$data->dividen_1_pegawai}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2 mt-md-0">
                                                <input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{$data->dividen_1_pasangan}}">
                                            </div>
                                            <div class="col-md-1">
                                              @for($i=0;$i<$count_div; $i++)
                                                  @if($data->dividen_id == 1)
                                                    <button class="add_field_button" id="add_dividen_button">Tambah</button>
                                                    @break
                                                  @else
                                                    <a onclick="removeDividen(this,'{{$data->dividen_id}}');return false;" id ="button{{$data->dividen_id}}" class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a>
                                                    @break
                                                  @endif
                                              @endfor
                                          </div>
                                      </div>
                                      <br>
                                      @endforeach

                                      </div>

                                      <script type="text/javascript">

                                        $(document).ready(function() {
                                          // var dividen_count = $("div#dividen_add input").length;
                                          var dividen_count = <?php echo $count_div;?>;


                                      	var wrapper   		= $("#dividen_field"); //Fields wrapper
                                      	var add_button      = $("#add_dividen_button"); //Add button ID
                                        var counter_dividen = dividen_count;

                                        console.log("dividen_count",dividen_count);

                                        console.log(counter_dividen);

                                      	$(add_button).click(function(e){ //on add input button click
                                      		e.preventDefault();
                                            counter_dividen++;
                                            console.log(counter_dividen);

                                      			$(wrapper).append('<div id="dividen_add'+counter_dividen+'" class="row"><div class="col-md-3 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1[]" placeholder="Nyatakan Dividen"></div></div><div class="col-md-4 mt-2 mt-md-0"><div class="input-group"><input class="form-control bg-light" type="text" name="dividen_1_pegawai[]" placeholder="Dividen Pegawai"></div></div><div class="col-md-4 mt-2 mt-md-0"><input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan"></div><div class="col-md-1"><a onClick="removeDividen(this,'+counter_dividen+' ); return false;" id ="button'+counter_dividen+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeDividen(e,counter_dividen){//delete dividen
                                      console.log('masuk');
                                        $('#dividen_add'+counter_dividen+'').remove();
                                        $('#button'+counter_dividen+'').remove();
                                      }
                                      </script>


                                      <!-- jumlah pendapatan -->
                                      <div class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                          <p><b>JUMLAH</b></p>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <div class="input-group">
                                                <input class="form-control bg-light" type="text" name="pendapatan_pegawai" value="{{ $info->pendapatan_pegawai  }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="pendapatan_pasangan" value="{{ $info->pendapatan_pasangan  }}">
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
                                          <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" value="{{ $info->pinjaman_perumahan_pegawai  }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ $info->bulanan_perumahan_pegawai  }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ $info->pinjaman_perumahan_pasangan  }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ $info->bulanan_perumahan_pasangan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KENDERAAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>ii) Jumlah Pinjaman Kenderaan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" value="{{ $info->pinjaman_kenderaan_pegawai  }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ $info->bulanan_kenderaan_pegawai  }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ $info->pinjaman_kenderaan_pasangan  }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ $info->bulanan_kenderaan_pasangan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--CUKAI PENDAPATAN -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iii) Cukai Pendapatan</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_cukai_pegawai" value="{{ $info->jumlah_cukai_pegawai  }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ $info->bulanan_cukai_pegawai  }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ $info->jumlah_cukai_pasangan  }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ $info->bulanan_cukai_pasangan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <!--PINJAMAN KOPERASI -->
                                      <div class="row">
                                        <div class="col-md-3">
                                          <p>iv) Pinjaman Koperasi</p>
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_koperasi_pegawai" value="{{ $info->jumlah_koperasi_pegawai  }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai" value="{{ $info->bulanan_koperasi_pegawai  }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan" value="{{ $info->jumlah_koperasi_pasangan  }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan" value="{{ $info->bulanan_koperasi_pasangan  }}">
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
                                      <input type="hidden" name="counter_pinjaman" value="{{$count_pinjaman}}" id="counter_pinjaman">
                                      <div id="pinjaman_field">

                                        @foreach($listPinjamanB as $datapinjaman)
                                      <div id="pinjaman_add{{$datapinjaman->pinjaman_id}}" class="row">
                                        <div class="col-md-3">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman" value="{{ $datapinjaman->lain_lain_pinjaman  }}">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pegawai[]" value="{{ $datapinjaman->pinjaman_pegawai  }}">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ $datapinjaman->bulanan_pegawai  }}">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{ $datapinjaman->pinjaman_pasangan  }}">
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ $datapinjaman->bulanan_pasangan  }}">
                                          </div>
                                        </div>
                                        <div class="col-md-1">
                                          @for($i=0;$i<$count_pinjaman; $i++)
                                              @if($datapinjaman->pinjaman_id == 1)
                                                <button class="add_field_button" id="add_pinjaman_button">Tambah</button>
                                                @break
                                              @else
                                                <a onclick="removeData(this,'{{$datapinjaman->pinjaman_id}}');return false;" id ="del{{$datapinjaman->pinjaman_id}}" class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a>
                                                @break
                                              @endif
                                          @endfor
                                      </div>
                                      </div>
                                      <br>
                                      @endforeach
                                      </div>

                                      <!--script-->
                                      <script type="text/javascript">
                                        $(document).ready(function() {
                                          var pinjaman_count = <?php echo $count_pinjaman;?>;

                                      	// var max_fields      = 10; //maximum input boxes allowed
                                      	var wrapper   		= $("#pinjaman_field"); //Fields wrapper
                                      	var add_button      = $("#add_pinjaman_button"); //Add button ID
                                        var counter_pinjaman = pinjaman_count;

                                      	$(add_button).click(function(e){ //on add input button click
                                      		e.preventDefault();
                                            counter_pinjaman++;

                                      			$(wrapper).append('<div id="pinjaman_add'+counter_pinjaman+'"  class="row"><div class="col-md-3"><input class="form-control bg-light" type="text" name="lain_lain_pinjaman[]" placeholder="Nyatakan Lain-Lain Pinjaman"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pegawai[]"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pegawai[]"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="pinjaman_pasangan[]"></div><div class="col-md-2"><input class="form-control bg-light" type="text" name="bulanan_pasangan[]"></div><div class="col-md-1"><a onClick="removeData(this,'+
                                            counter_pinjaman+
                                            ' ); return false;" id ="del'+counter_pinjaman+'"class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a><br><br></div></div>'); //add input box

                                      	});
                                      });

                                      function removeData(e,counter_pinjaman){
                                      //$(e).parents('div'+counter+'').remove();
                                      console.log('masuk');
                                        $('#pinjaman_add'+counter_pinjaman+'').remove();
                                        $('#del'+counter_pinjaman+'').remove();
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
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pegawai" value="{{ $info->jumlah_pinjaman_pegawai  }}">
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="jumlah_bulanan_pegawai" value="{{ $info->jumlah_bulanan_pegawai  }}">
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_pinjaman_pasangan" value="{{ $info->jumlah_pinjaman_pasangan  }}">
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_bulanan_pasangan" value="{{ $info->jumlah_bulanan_pasangan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p><b>5. KETERANGAN MENGENAI HARTA</b></p>
                                        </div>
                                      </div>
                                      <!-- <div class="row">
                                        <div class="col-md-4">
                                          <p>Jenis Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="jenis_harta"  placeholder="Jenis Harta" value="{{ $info->jenis_harta  }}">
                                        </div>
                                      </div> -->
                                      <div class="row">
                                          <div class="col-md-4">
                                            <p class="required">Jenis Harta</p>
                                          </div>
                                          <div class="col-md-8">
                                            <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta" value="{{ old('jenis_harta')}}" required>
                                                <option value="" selected disabled hidden>Jenis Harta</option>

                                                @foreach($jenisHarta as $jenisharta)
                                                @if($jenisharta->status_jenis_harta == "Aktif")
                                                <option value="{{$jenisharta->jenis_harta}}">{{$jenisharta->jenis_harta}}</option>
                                                @endif
                                                @endforeach

                                                </select>
                                          </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum" value="{{ $info->pemilik_harta  }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <select id="select_hubungan" class="custom-select  bg-light" name="hubungan_pemilik" value="{{ $info->hubungan_pemilik  }}" required>
                                                <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                                <option value="Sendiri" {{ $info->hubungan_pemilik == "Sendiri" ? 'selected' : '' }}>Sendiri</option>
                                                <option value="Anak" {{ $info->hubungan_pemilik == "Anak" ? 'selected' : '' }}>Anak</option>
                                                <option value="Isteri/Suami" {{ $info->hubungan_pemilik == "Isteri/Suami" ? 'selected' : '' }}>Isteri/Suami</option>
                                                <option value="Ibu/Ayah" {{ $info->hubungan_pemilik == "Ibu/Ayah" ? 'selected' : '' }}>Ibu/Ayah</option>
                                                <option value="Lain-lain" {{ $info->hubungan_pemilik == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ $info->maklumat_harta  }}" required>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_pemilikan_harta"  value="{{ $info->tarikh_pemilikan_harta  }}" required>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="bilangan" placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ $info->bilangan  }}" required>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nilai Perolehan Harta (RM)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_perolehan" value="{{ $info->nilai_perolehan  }}" placeholder="Nilai Perolehan Harta (RM)" required>
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Cara Dan Dari Siapa Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select id="cara_perolehan" class="custom-select  bg-light" name="cara_perolehan" value="{{ $info->cara_perolehan  }}" required>
                                                <option value="" selected disabled hidden>Cara Perolehan</option>
                                                <option value="Dipusakai" {{ $info->cara_perolehan == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                                <option value="Dibeli" {{ $info->cara_perolehan == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                                <option value="Dihadiahkan" {{ $info->cara_perolehan == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                                <option value="Lain-lain" {{ $info->cara_perolehan == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="cara_perolehan" value="{{ session()->get('asset.cara_perolehan') }}">
                                        </div> -->
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ $info->nama_pemilikan_asal  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required"><b>Punca-punca Kewangan Bagi Memiliki Harta Dan Jumlahnya</b></p>
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
                                          <input class="form-control bg-light" type="text" name="jumlah_pinjaman" value="{{ $info->jumlah_pinjaman  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii)	Institusi memberi pinjaman</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="institusi_pinjaman" value="{{ $info->institusi_pinjaman  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii)	Tempoh bayaran balik</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="tempoh_bayar_balik" value="{{ $info->tempoh_bayar_balik  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Ansuran bulanan </p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="ansuran_bulanan" value="{{ $info->ansuran_bulanan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh ansuran pertama</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_ansuran_pertama" value="{{ $info->tarikh_ansuran_pertama  }}">
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
                                          <input class="form-control bg-light" type="text" name="jenis_harta_pelupusan" value="{{ $info->jenis_harta_pelupusan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>ii) Alamat</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="alamat_asset" value="{{ $info->alamat_asset  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iii) No Pendaftaran Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="no_pendaftaran" value="{{ $info->no_pendaftaran  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>iv) Harga Jualan</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="harga_jualan" value="{{ $info->harga_jualan  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p>v)	Tarikh lupus</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" name="tarikh_lupus" value="{{ $info->tarikh_lupus  }}">
                                        </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-1" align="right">
                                          <input type="checkbox" name="pengakuan" value="pengakuan pegawai" required>
                                        </div>
                                        <div class="col-md-11">
                                            <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan dirujuk kepada Jawatankuasa Tatatertib MCMC</b></label><br>
                                        </div>
                                      </div>

                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-2">
                                      <button type="submit" onclick=" return confirm('Hantar maklumat?');" class="btn btn-primary mt-4">Hantar</button>

                                    </div>
                              </form>
                          </div>
                      </div>
               </div>
           </div>
          </div>
@endsection
