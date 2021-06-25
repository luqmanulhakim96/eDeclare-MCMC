<div wire:init='loadData'>

        <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        </head>
           <!--Page Body part -->
           <div class="p-4 page-body text-dark">
               <div class="flex-row page-heading border-bottom d-flex">
                   <h5 class="font-weight-normal">Lampiran B: Borang Perisytiharan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="mt-4 col-12">
                      <div class="rounded-lg card">
                          <div class="card-body">

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
                                            {{$info->alamat_tempat_bertugas}}
                                              <!-- <input type="hidden" name="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }} -->
                                          </div>
                                      </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="mt-4 col-12">
                         <div class="rounded-lg card">
                             <div class="card-body">

                                  <!-- keluarga -->
                                  @if($maklumat_pasangan== null)
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
                                              <input type="hidden" name="nama_pasangan" value="{{ucwords(strtolower($maklumat_pasangan->NOKNAME))}}">{{ucwords(strtolower($maklumat_pasangan->NOKNAME))}}
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

                                    @if($maklumat_anak== null)
                                    @else
                                    @foreach($maklumat_anak as $maklumat_anak)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Nama Anak</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                              @if($maklumat_anak->NOKNAME != null)
                                              <input type="hidden" name="nama_anak" value="{{ucwords(strtolower($maklumat_anak->NOKNAME))}}">{{ucwords(strtolower($maklumat_anak->NOKNAME))}}
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
                        <div class="mt-4 col-12">
                             <div class="rounded-lg card">
                                 <div class="card-body">
                                    <!-- pendapatan bulanan-->
                                    @if($info)
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
                                            {{$info->gaji}}
                                          </div>
                                      </div>
                                      <div class="mt-2 col-md-4 mt-md-0">
                                        <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="gaji_pasangan" placeholder="Gaji Pasangan" value="{{ $info->gaji_pasangan  }}">
                                      </div>
                                      @error('gaji_pasangan')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                    </div>
                                  </br>
                                <!-- imbuhan -->
                                  <div class="row">
                                    <div class="mt-2 col-md-3 mt-md-0">
                                        <p> ii) Jumlah Semua Imbuhan Tetap atau Elaun</p>
                                    </div>
                                    <div class="mt-2 col-md-4 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ $info->jumlah_imbuhan}}">
                                        </div>
                                        @error('jumlah_imbuhan')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mt-2 col-md-4 mt-md-0">
                                        <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan" value="{{ $info->jumlah_imbuhan_pasangan}}">
                                    </div>
                                    @error('jumlah_imbuhan_pasangan')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                  </div>
                                  <br>
                                  <!-- sewa -->
                                  <div class="row">
                                    <div class="mt-2 col-md-3 mt-md-0">
                                        <p> iii) Sewa Rumah/Kedai</p>
                                    </div>
                                    <div class="mt-2 col-md-4 mt-md-0">
                                        <div class="input-group">
                                            <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="sewa" placeholder="Sewa Pegawai" value="{{ $info->sewa}}">
                                        </div>
                                        @error('sewa')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mt-2 col-md-4 mt-md-0">
                                        <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="sewa_pasangan" placeholder="Sewa Pasangan" value="{{ $info->sewa_pasangan}}">
                                    </div>
                                  </div>

                                  @include('livewire.form-b-dividen-edit-old')

                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="">
                      @include('livewire.harta-form-b')
                    </div>



                <div class="rounded-lg card">
                    <div class="card-body">
                      <div class="card-title" style="text-align: center;">Keterangan Mengenai Harta</div>
                      <!-- Table -->
                      <div class="table-responsive">
                          <table class="table table-bordered" id="table_keterangan">
                              <thead>
                                  <tr class="text-center">
                                      <th width="5%"><p class="mb-0">Jenis Harta</p></th>
                                      <th width="5%"><p class="mb-0">Pemilik Harta</p></th>
                                      <th width="10%"><p class="mb-0">Tarikh Pemilikan Harta</p></th>
                                      <th width="30%"><p class="mb-0">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan tanah tapak rumah itu)</p></th>
                                      <th width="15%"><p class="mb-0">Nilai Perolehan Harta (RM)</p></th>
                                      <th width="5%"><p class="mb-0">Tindakan</p></th>
                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach($hartaB as $data)
                                  <tr>
                                      <td><p class="mb-0 " style="text-align: center;" id="jenis_harta_table{{$data->id}}">{{$data->jenis_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="pemilik_harta_table{{$data->id}}">{{$data->pemilik_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="tarikh_pemilikan_harta_table{{$data->id}}">{{$data->tarikh_pemilikan_harta}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="bilangan_table{{$data->id}}">{{$data->bilangan}}</p></td>
                                      <td><p class="mb-0 " style="text-align: center;" id="nilai_perolehan_table{{$data->id}}">{{$data->nilai_perolehan}}</p></td>

                                      <td>
                                        <a class="mr-1 btn btn-success" wire:click="editharta({{$data->id}})" id="editHarta{{$data->id}}" ><i class="fa fa-pencil-alt" ></i></a>
                                        <a class="mr-1 btn btn-danger" wire:click="deleteharta({{$data->id}})"><i class="fa fa-trash" ></i></a>
                                      </td>
                                  </tr>
                                    @endforeach

                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>

          <div class="row">
            <div class="mt-4 col-12">
                 <div class="rounded-lg card">
                     <div class="card-body">

                    <!-- Tanggungan -->
                    <div class="row">
                      <div class="col-md-8">
                        <p><b>5. TANGGUNGAN / ANSURAN BULANAN ATAS HUTANG / PINJAMAN</b></p>
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
                        <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai" wire:model="pinjaman_perumahan_pegawai" value="{{$info->pinjaman_perumahan_pegawai}}" readonly>

                      </div>
                      @error('pinjaman_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai" wire:model="bulanan_perumahan_pegawai" value="{{$info->bulanan_perumahan_pegawai}}" readonly>

                      </div>
                      @error('bulanan_perumahan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan" wire:model="pinjaman_perumahan_pasangan" value="{{$info->pinjaman_perumahan_pasangan}}" readonly>
                          </div>
                        @error('pinjaman_perumahan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan" wire:model="bulanan_perumahan_pasangan" value="{{$info->bulanan_perumahan_pasangan}}" readonly>
                          </div>
                      @error('bulanan_perumahan_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--PINJAMAN KENDERAAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>ii) Jumlah Pinjaman Kenderaan</p>
                      </div>
                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai" wire:model="pinjaman_kenderaan_pegawai" value="{{$info->pinjaman_kenderaan_pegawai}}" readonly>
                        </div>
                      @error('pinjaman_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">

                        <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai" wire:model="bulanan_kenderaan_pegawai" value="{{$info->bulanan_kenderaan_pegawai}}" readonly>
                        </div>
                      @error('bulanan_kenderaan_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan" wire:model="pinjaman_kenderaan_pasangan" value="{{$info->pinjaman_kenderaan_pasangan}}" readonly>
                          </div>
                        @error('pinjaman_kenderaan_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">

                          <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan" wire:model="bulanan_kenderaan_pasangan" value="{{$info->bulanan_kenderaan_pasangan}}" readonly>
                          </div>
                      @error('bulanan_kenderaan_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--CUKAI PENDAPATAN -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iii) Cukai Pendapatan</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="jumlah_cukai_pegawai" value="{{ $info->jumlah_cukai_pegawai}}">
                      </div>
                      @error('jumlah_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="bulanan_cukai_pegawai" value="{{ $info->bulanan_cukai_pegawai}}">
                      </div>
                      @error('bulanan_cukai_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="jumlah_cukai_pasangan" value="{{ $info->jumlah_cukai_pasangan}}">
                        </div>
                        @error('jumlah_cukai_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" type="text"onkeypress="return isNumberKey(event,this)" wire:model="bulanan_cukai_pasangan" value="{{ $info->bulanan_cukai_pasangan}}">
                      </div>
                      @error('bulanan_cukai_pasangan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                    <br>
                    <!--PINJAMAN KOPERASI -->
                    <div class="row">
                      <div class="col-md-3">
                        <p>iv) Pinjaman Koperasi</p>
                      </div>
                      <div class="col-md-2">
                        <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)" wire:model="jumlah_koperasi_pegawai" value="{{ $info->jumlah_koperasi_pegawai}}" id="jumlah_koperasi_pegawai">
                      </div>
                      @error('jumlah_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                      <div class="col-md-2">
                        <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)" wire:model="bulanan_koperasi_pegawai" value="{{ $info->bulanan_koperasi_pegawai}}" id="bulanan_koperasi_pegawai">
                      </div>
                      @error('bulanan_koperasi_pegawai')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)" wire:model="jumlah_koperasi_pasangan" value="{{ $info->jumlah_koperasi_pasangan}}" id="jumlah_koperasi_pasangan">
                        </div>
                        @error('jumlah_koperasi_pasangan')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                        <div class="col-md-2">
                          <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)" wire:model="bulanan_koperasi_pasangan" value="{{ $info->bulanan_koperasi_pasangan}}" id="bulanan_koperasi_pasangan">
                      </div>
                    </div>

                    @include('livewire.form-b-pinjaman-edit')

                  </div>
                </div>
              </div>
          </div>
          @endif

          {{-- @if($showharta == 1)
          <div id="harta_container">
            @if($updateMode)
            @include('livewire.edit-harta')
            @endif
          </div>
          @endif --}}



                    <br>
                    <br>
                    <div class="row">
                      <div class="col-md-1" align="right">
                        <input type="checkbox" wire:model="pengakuan" value="pengakuan" >
                      </div>
                      <div class="col-md-11">
                          <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
                      </div>
                      @error('pengakuan')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>

                <!-- button -->
                <div class="row">
                  <div class="col-md-9">
                  </div>
                  <div class="col-md-3">
                  <button type="button" class="mt-4 btn btn-primary" data-toggle="modal" data-target="#save" >Simpan</button>
                  <button type="button" class="mt-4 btn btn-primary" data-toggle="modal" data-target="#publish" >Hantar</button>
                  </div>
                      <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                              <button type="submit" wire:click.prevent="store('simpan')" class="btn btn-danger" data-dismiss="modal">Ya</button>
                              </div>
                          </div>
                          </div>
                      </div>
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
                              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                              <button type="submit" wire:click.prevent="store('hantar')" class="btn btn-danger" data-dismiss="modal">Ya</button>
                              </div>
                          </div>
                          </div>
                      </div>
            </div>


<script>
    function isNumberKey(evt, element) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
        return false;
    else {
        var len = $(element).val().length;
        var index = $(element).val().indexOf('.');
        if (index > 0 && charCode == 46) {
        return false;
        }
        if (index > 0) {
        var CharAfterdot = (len + 1) - index;
        if (CharAfterdot > 3) {
            return false;
        }
        }

    }
    return true;
    }
</script>

</div>
<br>
<br>
<br>
<br>
</div>
