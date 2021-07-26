
<div wire:init='loadData'>
    <!--Page Body part -->
    <div class="page-body p-4 text-dark">
        <div class="page-heading border-bottom d-flex flex-row">
            <h5 class="font-weight-normal">Lampiran B: Borang Perisytiharan Harta</h5>
        </div>

        <form>
        @csrf
        <!-- All Basic Form elements -->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded-lg" >
                    <div class="card-body">
                        @if($staffinfo)
                            @foreach($staffinfo as $data)
                                <input type="hidden" wire:model="no_staff" value="{{$data->STAFFNO}}">
                            @endforeach
                        @endif
                        <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="hidden" wire:model="nama_pegawai"  value="{{Auth::user()->name }}">{{Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>No. Kad Pengenalan</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    @if($staffinfo)
                                    @foreach($staffinfo as $ic)
                                        <input type="hidden" wire:model="kad_pengenalan" value="{{$ic->ICNUMBER}}">{{$ic->ICNUMBER}}
                                    @endforeach
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Jawatan / Gred</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    @if($staffinfo)

                                    @foreach($staffinfo as $data)
                                        <input type="hidden" wire:model="jawatan" value="{{$data->GRADE}}">{{$data->GRADE}}
                                    @endforeach
                                    <!-- <input type="hidden" name="jawatan"  value="{{Auth::user()->jawatan }}">{{Auth::user()->jawatan }} -->
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
                                        <input type="hidden" wire:model="jabatan" value="{{ucwords(strtolower($jabatan->OLEVEL5NAME))}}">{{ucwords(strtolower($jabatan->OLEVEL5NAME))}}
                                    @endforeach
                                    @endif
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
                                        <input type="hidden" wire:model="alamat_tempat_bertugas" value="{{Auth::user()->alamat_tempat_bertugas }}">{{Auth::user()->alamat_tempat_bertugas }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($maklumat_pasangan == null && $maklumat_anak == null)
            @else
            @include('livewire.form-b-keterangan-mengenai-keluarga')
            @endif
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
                                        @if($staffinfo)
                                            @foreach ($staffinfo as $gaji)
                                                <input type="hidden" wire:model="gaji" value="{{ $gaji->SALARY }}">{{ $gaji->SALARY }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">
                                    <input class="form-control bg-light @error('gaji_pasangan') is-invalid @enderror" type="text" onkeypress="return isNumberKey(event,this)"
                                    wire:model="gaji_pasangan" placeholder="Gaji Pasangan" value="0">
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
                                    <input class="form-control bg-light" type="text" onkeypress="return isNumberKey(event,this)"
                                    wire:model="jumlah_imbuhan" placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan') }}"
                                        autocomplete="off">
                                    @error('jumlah_imbuhan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">
                                    <input class="form-control bg-light" type="text" onkeypress="return isNumberKey(event,this)"
                                    wire:model="jumlah_imbuhan_pasangan" placeholder="Imbuhan Pasangan"
                                        value="{{ old('jumlah_imbuhan_pasangan') }}" autocomplete="off">
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

                                    <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)" type="text"
                                    wire:model="sewa" placeholder="Sewa Pegawai" autocomplete="off">
                                    @error('sewa')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror


                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">

                                    <input class="form-control bg-light" type="text" wire:model="sewa_pasangan"
                                    onkeypress="return isNumberKey(event,this)" placeholder="Sewa Pasangan"
                                        value="{{ old('sewa_pasangan') }}" autocomplete="off">
                                    @error('sewa_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            @include('livewire.form-b-pendapatan-bulanan')
                        </div>
                    </div>
                </div>
            </div>


            {{-- Soalan 4 --}}
            @include('livewire.form-b-keterangan-mengenai-harta')

            {{-- Soalan 5 --}}
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card rounded-lg">
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
                                <div class="col-md-2" style="text-align:center;">
                                    <input class="form-control bg-light" type="hidden" id="pinjaman_perumahan_pegawai"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="pinjaman_perumahan_pegawai"
                                    value="0" readonly>
                                    {{ $pinjaman_perumahan_pegawai }}

                                    <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_perumahan_pegawai') }}"> -->
                                    @error('pinjaman_perumahan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="bulanan_perumahan_pegawai"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="bulanan_perumahan_pegawai" value="0" readonly>
                                    {{ $bulanan_perumahan_pegawai }}
                                    <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_perumahan_pegawai') }}"> -->
                                    @error('bulanan_perumahan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="pinjaman_perumahan_pasangan"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="pinjaman_perumahan_pasangan" value="0" readonly>
                                    {{$pinjaman_perumahan_pasangan}}
                                    <!-- <input class="form-control bg-light" type="text" name="pinjaman_perumahan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_perumahan_pasangan') }}"> -->
                                    @error('pinjaman_perumahan_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="bulanan_perumahan_pasangan"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="bulanan_perumahan_pasangan" value="0" readonly>
                                    {{$bulanan_perumahan_pasangan}}
                                    <!-- <input class="form-control bg-light" type="text" name="bulanan_perumahan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_perumahan_pasangan') }}"> -->
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
                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="pinjaman_kenderaan_pegawai"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="pinjaman_kenderaan_pegawai" value="0" readonly>
                                    {{$pinjaman_kenderaan_pegawai}}
                                    <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_kenderaan_pegawai') }}"> -->
                                    @error('pinjaman_kenderaan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="bulanan_kenderaan_pegawai"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="bulanan_kenderaan_pegawai" value="0" readonly>
                                    {{$bulanan_kenderaan_pegawai}}
                                    <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pegawai" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_kenderaan_pegawai') }}"> -->
                                    @error('bulanan_kenderaan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="pinjaman_kenderaan_pasangan"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="pinjaman_kenderaan_pasangan" value="0" readonly>
                                    {{$pinjaman_kenderaan_pasangan}}
                                    <!-- <input class="form-control bg-light" type="text" name="pinjaman_kenderaan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('pinjaman_kenderaan_pasangan') }}"> -->
                                    @error('pinjaman_kenderaan_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2" style="text-align:center;">

                                    <input class="form-control bg-light" type="hidden" id="bulanan_kenderaan_pasangan"
                                    onkeypress="return isNumberKey(event,this)"
                                    wire:model="bulanan_kenderaan_pasangan" value="0" readonly>
                                    {{$bulanan_kenderaan_pasangan}}

                                    <!-- <input class="form-control bg-light" type="text" name="bulanan_kenderaan_pasangan" onkeypress="return onlyNumberKey(event)"  value="{{ old('bulanan_kenderaan_pasangan') }}"> -->
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
                                    <input class="form-control bg-light" type="text" wire:model="jumlah_cukai_pegawai"
                                    onkeypress="return isNumberKey(event,this)" value="0"
                                        autocomplete="off">
                                    @error('jumlah_cukai_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <!-- <input class="form-control bg-light" type="text" wire:model="bulanan_cukai_pegawai"
                                    onkeypress="return isNumberKey(event,this)" value="0"
                                        autocomplete="off">
                                    @error('bulanan_cukai_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror -->
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text" wire:model="jumlah_cukai_pasangan"
                                    onkeypress="return isNumberKey(event,this)" value="0"
                                        autocomplete="off">
                                    @error('jumlah_cukai_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <!-- <input class="form-control bg-light" type="text" wire:model="bulanan_cukai_pasangan"
                                    onkeypress="return isNumberKey(event,this)" value="0"
                                        autocomplete="off">
                                    @error('bulanan_cukai_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror -->
                                </div>

                            </div>
                            <br>
                            <!--PINJAMAN KOPERASI -->
                            <div class="row">
                                <div class="col-md-3">
                                    <p>iv) Pinjaman Koperasi</p>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="jumlah_koperasi_pegawai"
                                        value="0" onkeypress="return isNumberKey(event,this)"
                                        id="jumlah_koperasi_pegawai" autocomplete="off">
                                    @error('jumlah_koperasi_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="bulanan_koperasi_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="0" id="bulanan_koperasi_pegawai"
                                        autocomplete="off">
                                    @error('bulanan_koperasi_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="jumlah_koperasi_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="0" id="jumlah_koperasi_pasangan"
                                        autocomplete="off">
                                    @error('jumlah_koperasi_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="bulanan_koperasi_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="0" id="bulanan_koperasi_pasangan"
                                        autocomplete="off">
                                    @error('bulanan_koperasi_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                        @include('livewire.form-b-tanggungan')
                        </div>
                    </div>
                </div>
            </div>
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
              <div wire:loading>
                  <button type="button" class="btn btn-primary mt-4" >Menghantar lampiran....</button>
              </div>
              <div wire:loading.remove>
                <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#save">Simpan</button>
                <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish">Hantar</button>
              </div>
            </div>
            <br>
            <br>
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
                        <button type="submit" class="btn btn-danger" wire:click.prevent="store('simpan')" data-dismiss="modal">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="publish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-danger" wire:click.prevent="store('hantar')" data-dismiss="modal">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                    </div>
                    </div>
                </div>
                <script type="text/javascript">
                    @if(count($errors) > 0)
                        $('#publish').modal('hide');
                    @endif
                </script>
        </div>
        <br>
        <br>
    </form>
    <script class="">
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


</div>
