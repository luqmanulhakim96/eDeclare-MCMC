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
                                            @foreach($staffinfo as $jabatan)
                                              <input type="hidden" name="jabatan" value="{{$jabatan->OLEVEL4NAME}}">{{$jabatan->OLEVEL4NAME}}
                                            @endforeach
                                            <!-- <input type="hidden" name="jabatan" value="{{Auth::user()->jabatan }}">{{Auth::user()->jabatan }} -->
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
                                </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-12 mt-4">
                         <div class="card rounded-lg">
                             <div class="card-body">

                                  <!-- keluarga -->
                                  @if($maklumat_pasangan->isEmpty())
                                  @else
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
                                    <hr>
                                    @endforeach
                                    @endif

                                    @if($maklumat_anak->isEmpty())
                                    @else
                                    @foreach($maklumat_anak as $maklumat_anak)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->NOKNAME != null)
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
                                              <span></span>
                                              <?php
                                                $ic = $maklumat_anak->ICNEW;
                                                if($ic != ""){
                                                    $year = substr($ic, 0, 2);
                                                    $curYear = Date('Y');
                                                    $cutoff = Date('Y') - 2000;
                                                }
                                                if($year > $cutoff)
                                                {
                                                  $above = $curYear - ($year + 1900);
                                                  echo $above;
                                                }
                                                else{
                                                  $above = $curYear - ($year + 2000);
                                                  echo $above;
                                                }
                                              ?>
                                                <!-- <input type="hidden" name="umur_anak" value="{{Auth::user()->umur_anak }}">{{Auth::user()->umur_anak }} -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->NOKNAME != null)
                                                <!-- <input type="hidden" name="ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}} -->
                                                <span id = "ic_anak" value="{{$maklumat_anak->ICNEW}}">{{$maklumat_anak->ICNEW}}</span>
                                                @else
                                                -
                                                @endif
                                            </div>
                                        </div>
                                      </div>
                                      <hr>
                                      @endforeach
                                      @endif
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-4">
                             <div class="card rounded-lg">
                                 <div class="card-body">
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
                                            @error('gaji_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                            @error('jumlah_imbuhan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $info->jumlah_imbuhan_pasangan  }}">
                                            @error('jumlah_imbuhan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                                @error('sewa')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <input class="form-control bg-light" type="text" name="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $info->sewa_pasangan  }}">
                                            @error('sewa_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                                    @error('dividen_1_pegawai[]')
                                                       <div class="alert alert-danger">{{ $message }}</div>
                                                   @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2 mt-md-0">
                                                <input class="form-control bg-light" type="text" name="dividen_1_pasangan[]" placeholder="Dividen Pasangan" value="{{$data->dividen_1_pasangan}}">
                                                @error('dividen_1_pasangan[]')
                                                   <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
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
                                      <!-- <div class="row">
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
                                      </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                               <div class="card rounded-lg">
                                   <div class="card-body">
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
                                          @error('pinjaman_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" value="{{ $info->bulanan_perumahan_pegawai  }}">
                                          @error('bulanan_perumahan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" value="{{ $info->pinjaman_perumahan_pasangan  }}">
                                            @error('pinjaman_perumahan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" value="{{ $info->bulanan_perumahan_pasangan  }}">
                                            @error('bulanan_perumahan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                          @error('pinjaman_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" value="{{ $info->bulanan_kenderaan_pegawai  }}">
                                          @error('bulanan_kenderaan_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" value="{{ $info->pinjaman_kenderaan_pasangan  }}">
                                            @error('pinjaman_kenderaan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" value="{{ $info->bulanan_kenderaan_pasangan  }}">
                                            @error('bulanan_kenderaan_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                          @error('jumlah_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_cukai_pegawai" value="{{ $info->bulanan_cukai_pegawai  }}">
                                          @error('bulanan_cukai_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_cukai_pasangan" value="{{ $info->jumlah_cukai_pasangan  }}">
                                            @error('jumlah_cukai_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_cukai_pasangan" value="{{ $info->bulanan_cukai_pasangan  }}">
                                            @error('bulanan_cukai_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                          @error('jumlah_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                        <div class="col-md-2">
                                          <input class="form-control bg-light" type="text" name="bulanan_koperasi_pegawai" value="{{ $info->bulanan_koperasi_pegawai  }}">
                                          @error('bulanan_koperasi_pegawai')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="jumlah_koperasi_pasangan" value="{{ $info->jumlah_koperasi_pasangan  }}">
                                            @error('jumlah_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                          <div class="col-md-2">
                                            <input class="form-control bg-light" type="text" name="bulanan_koperasi_pasangan" value="{{ $info->bulanan_koperasi_pasangan  }}">
                                            @error('bulanan_koperasi_pasangan')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                            @error('pinjaman_pegawai[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="bulanan_pegawai[]" value="{{ $datapinjaman->bulanan_pegawai  }}">
                                            @error('bulanan_pegawai[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="pinjaman_pasangan[]" value="{{ $datapinjaman->pinjaman_pasangan  }}">
                                            @error('pinjaman_pasangan[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                          </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="input-group">
                                            <input class="form-control bg-light" type="text" name="bulanan_pasangan[]" value="{{ $datapinjaman->bulanan_pasangan  }}">
                                            @error('bulanan_pasangan[]')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
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
                                      <!-- <div class="row">
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
                                      </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-12 mt-4">
                               <div class="card rounded-lg">
                                   <div class="card-body">
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
                                            <select id="jenis_harta" class="custom-select  bg-light" name="jenis_harta" value="{{ $info->jenis_harta}}" required>
                                                <option value="" selected disabled hidden>Jenis Harta</option>

                                                @foreach($jenisHarta as $jenisharta)
                                                @if($jenisharta->status_jenis_harta == "Aktif")
                                                <option value="{{$jenisharta->jenis_harta}}" {{ $info->jenis_harta =="$jenisharta->jenis_harta" ? 'selected' :'' }}>{{$jenisharta->jenis_harta}}</option>
                                                @endif
                                                @endforeach

                                                </select>
                                          </div>
                                          @error('jenis_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Pemilik Harta  dan Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="pemilik_harta" placeholder="Nama Pemilik Sebelum" value="{{ $info->pemilik_harta  }}" required>
                                          @error('pemilik_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
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
                                        @error('hubungan_pemilik')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="maklumat_harta" placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ $info->maklumat_harta  }}" required>
                                          @error('maklumat_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Tarikh Pemilikan Harta</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="date" id="datefield" name="tarikh_pemilikan_harta"  value="{{ $info->tarikh_pemilikan_harta  }}" required>
                                          @error('tarikh_pemilikan_harta')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="bilangan" placeholder="Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)" value="{{ $info->bilangan  }}" required>
                                          @error('bilangan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Nilai Perolehan Harta (RM)</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" type="text" name="nilai_perolehan" value="{{ $info->nilai_perolehan  }}" placeholder="Nilai Perolehan Harta (RM)" required>
                                          @error('nilai_perolehan')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        </div>
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <p class="required">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</p>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="cara_perolehan" class="custom-select  bg-light" name="cara_perolehan" onchange="showCaraPerolehan()" value="{{ $info->cara_perolehan  }}" required >
                                                <option value="" selected disabled hidden>Cara Perolehan</option>
                                                <option value="" selected hidden></option>
                                                <option value="Dipusakai" {{ $info->cara_perolehan  == "Dipusakai" ? 'selected' : '' }}>Dipusakai</option>
                                                <option value="Dibeli" {{ $info->cara_perolehan == "Dibeli" ? 'selected' : '' }}>Dibeli</option>
                                                <option value="Dihadiahkan" {{ $info->cara_perolehan == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                                <option value="Lain-lain" {{ $info->cara_perolehan == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                            </select>
                                        </div>
                                        @error('cara_perolehan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                     </div>

                                     <!-- dipusakai / dihadiahkan -->
                                       <div id="nama_pemilikan_asal" style="display: none;">
                                         <div class="row">
                                           <div class="col-md-4">
                                             <p class="required"> Dari Siapa Harta Diperolehi</p>
                                           </div>
                                           <div class="col-md-8">
                                             <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ $info->nama_pemilikan_asal  }}">
                                             @error('nama_pemilikan_asal')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                           </div>
                                         </div>
                                         <br>
                                       </div>

                                    <!-- lain lain -->
                                       <div id="lain" style="display:none;">
                                         <div class="row">
                                           <div class="col-md-4">
                                             <p class="required"> Nyatakan,</p>
                                           </div>
                                           <div class="col-md-8">
                                             <input class="form-control bg-light" type="text" name="lain-lain" placeholder="" value="{{ old('lain')}}">
                                             @error('lain')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                           </div>
                                         </div>
                                         <br>
                                       </div>
                                       <script type="text/javascript">
                                        function showCaraPerolehan(){
                                          var cara_peroleh = $('#cara_perolehan').val();

                                          if(cara_peroleh == "Dipusakai" || cara_peroleh == "Dihadiahkan"){
                                            document.getElementById('nama_pemilikan_asal').style.display ="block";
                                          }
                                          else{
                                            document.getElementById('nama_pemilikan_asal').style.display ="none";
                                            document.getElementById('pinjaman').style.display ="none";
                                            document.getElementById('pelupusan').style.display ="none";
                                          }

                                          if (cara_peroleh == "Dibeli") {
                                            document.getElementById('dibeli').style.display ="block";
                                          }
                                          else{
                                            document.getElementById('dibeli').style.display ="none";
                                            document.getElementById('pinjaman').style.display ="none";
                                            document.getElementById('pelupusan').style.display ="none";
                                          }

                                          if (cara_peroleh == "Lain-lain") {
                                            document.getElementById('lain').style.display ="block";
                                          }
                                          else{
                                            document.getElementById('lain').style.display ="none";
                                            document.getElementById('pinjaman').style.display ="none";
                                            document.getElementById('pelupusan').style.display ="none";
                                          }
                                        }

                                        </script>

                                      <!-- dibeli -->
                                        <div id="dibeli" style="display: none;">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <p class="required"> Cara Pembelian Harta</p>
                                            </div>
                                            <div class="col-md-8">
                                              <select id="cara_belian" class="custom-select  bg-light" name="cara_belian" onchange="showCaraBelian()" required >
                                                  <option value="" selected disabled hidden>Cara Belian</option>
                                                  <option value="" selected hidden></option>
                                                  <option value="Pinjaman" {{ old('cara_belian') == "Pinjaman" ? 'selected' : '' }}>Pinjaman</option>
                                                  <option value="Pelupusan" {{ old('cara_belian') == "Pelupusan" ? 'selected' : '' }}>Hasil Pelupusan Harta</option>
                                              </select>
                                               @error('cara_belian')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                          </div>
                                          <br>
                                        </div>

                                        <script type="text/javascript">
                                         function showCaraBelian(){
                                           var cara_belian = $('#cara_belian').val();

                                           if(cara_belian == "Pinjaman"){
                                             document.getElementById('pinjaman').style.display ="block";
                                           }
                                           else{
                                             document.getElementById('pinjaman').style.display ="none";
                                           }

                                           if(cara_belian == "Pelupusan"){
                                             document.getElementById('pelupusan').style.display ="block";
                                           }
                                           else{
                                             document.getElementById('pelupusan').style.display ="none";
                                           }
                                         }

                                         </script>
                                        <!-- <div class="col-md-4">
                                          <input class="form-control bg-light" type="text" name="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum" value="{{ old('nama_pemilikan_asal')}}">
                                        </div>
                                        @error('nama_pemilikan_asal')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror -->
                                      </div>
                                      <br>
                                    <!-- pinjaman -->
                                      <div id="pinjaman" style="display: none;">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <p>i) Jumlah Pinjaman</p>
                                            </div>
                                            <div class="col-md-8">
                                              <input class="form-control bg-light" type="text" name="jumlah_pinjaman" value="{{ $info->jumlah_pinjaman  }}">
                                              @error('jumlah_pinjaman')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
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
                                              @error('ansuran_bulanan')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-4">
                                              <p>v)	Tarikh ansuran pertama</p>
                                            </div>
                                            <div class="col-md-8">
                                              <input class="form-control bg-light" id="datefield1" type="date" name="tarikh_ansuran_pertama" value="{{ $info->tarikh_ansuran_pertama  }}">
                                              @error('tarikh_ansuran_pertama')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                            </div>
                                          </div>
                                        </div>

                                        <div id="pelupusan" style="display: none;">
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
                                                  @error('harga_jualan')
                                                     <div class="alert alert-danger">{{ $message }}</div>
                                                 @enderror
                                                </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <p>v)	Tarikh lupus</p>
                                                </div>
                                                <div class="col-md-8">
                                                  <input class="form-control bg-light" id="datefield2" type="date" name="tarikh_lupus" value="{{ $info->tarikh_lupus  }}">
                                                  @error('tarikh_lupus')
                                                     <div class="alert alert-danger">{{ $message }}</div>
                                                 @enderror
                                                </div>
                                              </div>
                                            </div>
                                            <div class="hidden">
                                              <input class="form-control bg-light" type="text" name="status" value="{{ $info->status }}">
                                            </div>
                                          </div>
                                      </div>
                               </div>
                           </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-1" align="right">
                                          <input type="checkbox" name="pengakuan" value="pengakuan pegawai" required>
                                        </div>
                                        <div class="col-md-11">
                                            <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
                                        </div>
                                      </div>

                                  <!-- button -->
                                  <div class="row">
                                    <div class="col-md-10">
                                      </div>
                                      <div class="col-md-2">
                                        <!-- <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#save" >Simpan</button> -->
                                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
                                        </div>
                                            <!-- <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p align="center">Simpan maklumat perisytiharan?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="save">Ya</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> -->

                                              <div class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-sm" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                      </div>
                                                      <div class="modal-body">
                                                      <p align="center">Hantar maklumat perisytiharan?</p>
                                                      </div>
                                                      <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                      <button type="submit" class="btn btn-primary" name="publish">Ya</button>
                                                      </div>
                                                  </div>
                                                  </div>
                                              </div>
                              </form>

                              </div>
          <script type="text/javascript">
          var today = new Date();
           var dd = today.getDate();
           var mm = today.getMonth()+1; //January is 0!
           var yyyy = today.getFullYear();
            if(dd<10){
                   dd='0'+dd
               }
               if(mm<10){
                   mm='0'+mm
               }

           today = yyyy+'-'+mm+'-'+dd;
           document.getElementById("datefield").setAttribute("max", today);

          </script>
          <script type="text/javascript">
          var today = new Date();
           var dd = today.getDate();
           var mm = today.getMonth()+1; //January is 0!
           var yyyy = today.getFullYear();
            if(dd<10){
                   dd='0'+dd
               }
               if(mm<10){
                   mm='0'+mm
               }

           today = yyyy+'-'+mm+'-'+dd;
           document.getElementById("datefield1").setAttribute("max", today);

          </script>
          <script type="text/javascript">
          var today = new Date();
           var dd = today.getDate();
           var mm = today.getMonth()+1; //January is 0!
           var yyyy = today.getFullYear();
            if(dd<10){
                   dd='0'+dd
               }
               if(mm<10){
                   mm='0'+mm
               }

           today = yyyy+'-'+mm+'-'+dd;
           document.getElementById("datefield2").setAttribute("max", today);

          </script>

          <script type="text/javascript">
           // var MyIDCard = $("#anak.value");//ID number
           var MyIDCard =document.getElementById("ic_anak").innerText;
           console.log(MyIDCard);
           var MyAge;//age
           // Get the birthday, gender, age according to the ID number
           function IDCardData() {
                if (MyIDCard != "") {
                    var Year = parseInt(MyIDCard.substring(0, 2));
                    var Newdate =new Date();
                    var cutoff = (new Date()).getFullYear() - 2000;
                    // console.log(parseInt(MyDate.getFullYear()));
                    if(Year > cutoff){
                      var MyAge = parseInt(Newdate.getFullYear()) - (parseInt(MyIDCard.substring(0, 2)) + 1900);
                    }
                    else{
                      var MyAge = parseInt(Newdate.getFullYear()) - (parseInt(MyIDCard.substring(0, 2)) + 2000);
                    }
                }
                return MyAge;
           }
          // IDCardData();
          console.log(IDCardData());
          window.onload = function() {
            document.getElementById("umur_anak").innerHTML = IDCardData();
          };
           </script>
@endsection
