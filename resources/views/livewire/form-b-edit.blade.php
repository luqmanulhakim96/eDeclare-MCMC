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
                    <div class="card rounded-lg">
                        <div class="card-body">

                            <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="hidden" name="nama_pegawai"
                                            value="{{ auth()->user()->name }}">{{ auth()->user()->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>No. Kad Pengenalan</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @if ($staffinfo)
                                            @foreach ($staffinfo as $data)
                                                <input type="hidden" name="kad_pengenalan"
                                                    value="{{ $data->ICNUMBER }}">{{ $data->ICNUMBER }}
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
                                        @if ($staffinfo)
                                            @foreach ($staffinfo as $data)
                                                <input type="hidden" name="jawatan"
                                                    value="{{ $data->GRADE }}">{{ $data->GRADE }}
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Jabatan</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @if ($staffinfo)

                                            @foreach ($staffinfo as $jabatan)
                                                <input type="hidden" name="jabatan"
                                                    value="{{ ucwords(strtolower($jabatan->OLEVEL5NAME)) }}">{{ ucwords(strtolower($jabatan->OLEVEL5NAME)) }}
                                            @endforeach
                                        @endif
                                        <!-- <input type="hidden" name="jabatan" value="{{ Auth::user()->jabatan }}">{{ Auth::user()->jabatan }} -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Alamat Tempat Bertugas</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="hidden" name="alamat_tempat_bertugas"
                                            value="{{ Auth::user()->alamat_tempat_bertugas }}">{{ Auth::user()->alamat_tempat_bertugas }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Soalan 2 --}}
            @if ($maklumat_pasangan == null)

            @else
                @livewire('form-b-keterangan-mengenai-keluarga')
            @endif

            {{-- Soalan 3 --}}
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
                                        @if ($staffinfo)
                                            @foreach ($staffinfo as $gaji)
                                                <input type="text" wire:model="gaji"
                                                    value="{{ $gaji->SALARY }}">{{ $gaji->SALARY }}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">
                                    <input class="form-control bg-light @error('gaji_pasangan') is-invalid @enderror"
                                        type="text" onkeypress="return isNumberKey(event,this)"
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
                                    <input class="form-control bg-light" type="text"
                                        onkeypress="return isNumberKey(event,this)" wire:model="jumlah_imbuhan"
                                        placeholder="Imbuhan Pegawai" value="{{ old('jumlah_imbuhan') }}"
                                        autocomplete="off">
                                    @error('jumlah_imbuhan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">
                                    <input class="form-control bg-light" type="text"
                                        onkeypress="return isNumberKey(event,this)" wire:model="jumlah_imbuhan_pasangan"
                                        placeholder="Imbuhan Pasangan" value="{{ old('jumlah_imbuhan_pasangan') }}"
                                        autocomplete="off">
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

                                    <input class="form-control bg-light" onkeypress="return isNumberKey(event,this)"
                                        type="text" wire:model="sewa" placeholder="Sewa Pegawai"
                                        value="{{ old('sewa') }}" autocomplete="off">
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
                            @livewire('form-b-pendapatan-bulanan-edit', ['id_formb'=>$id_formb])
                        </div>
                    </div>
                </div>
            </div>


            {{-- Soalan 4 --}}
            {{-- @livewire('form-b-keterangan-mengenai-harta') --}}
            <div id="harta_container">
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
                                    <th width="5%">
                                        <p class="mb-0">Jenis Harta</p>
                                    </th>
                                    <th width="5%">
                                        <p class="mb-0">Pemilik Harta</p>
                                    </th>
                                    <th width="10%">
                                        <p class="mb-0">Tarikh Pemilikan Harta</p>
                                    </th>
                                    <th width="30%">
                                        <p class="mb-0">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan
                                            keluasan tanah tapak rumah itu)</p>
                                    </th>
                                    <th width="15%">
                                        <p class="mb-0">Nilai Perolehan Harta (RM)</p>
                                    </th>
                                    <th width="5%">
                                        <p class="mb-0">Tindakan</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($hartaB as $data)
                                    <tr>
                                        <td>
                                            <p class="mb-0 " style="text-align: center;"
                                                id="jenis_harta_table{{ $data->id }}">{{ $data->jenis_harta }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 " style="text-align: center;"
                                                id="pemilik_harta_table{{ $data->id }}">{{ $data->pemilik_harta }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="mb-0 " style="text-align: center;"
                                                id="tarikh_pemilikan_harta_table{{ $data->id }}">
                                                {{ $data->tarikh_pemilikan_harta }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 " style="text-align: center;"
                                                id="bilangan_table{{ $data->id }}">{{ $data->bilangan }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 " style="text-align: center;"
                                                id="nilai_perolehan_table{{ $data->id }}">
                                                {{ $data->nilai_perolehan }}</p>
                                        </td>

                                        <td>
                                            <a class="mr-1 btn btn-success" wire:click="editharta({{ $data->id }})"
                                                onclick="scrollToTop()"><i class="fa fa-pencil-alt"></i></a>
                                            <a class="mr-1 btn btn-danger"
                                                wire:click="deleteharta({{ $data->id }})"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="pinjaman_perumahan_pegawai" value="0" readonly>

                                    @error('pinjaman_perumahan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="bulanan_perumahan_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="bulanan_perumahan_pegawai" value="0" readonly>

                                    @error('bulanan_perumahan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="pinjaman_perumahan_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="pinjaman_perumahan_pasangan" value="0" readonly>

                                    @error('pinjaman_perumahan_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="bulanan_perumahan_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="bulanan_perumahan_pasangan" value="0" readonly>

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

                                    <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="pinjaman_kenderaan_pegawai" value="0" readonly>

                                    @error('pinjaman_kenderaan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="bulanan_kenderaan_pegawai" value="0" readonly>

                                    @error('bulanan_kenderaan_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="pinjaman_kenderaan_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="pinjaman_kenderaan_pasangan" value="0" readonly>

                                    @error('pinjaman_kenderaan_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">

                                    <input class="form-control bg-light" type="text" id="bulanan_kenderaan_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        wire:model="bulanan_kenderaan_pasangan" value="0" readonly>

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
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('jumlah_cukai_pegawai') }}" autocomplete="off">
                                    @error('jumlah_cukai_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text" wire:model="bulanan_cukai_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('bulanan_cukai_pegawai') }}" autocomplete="off">
                                    @error('bulanan_cukai_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text" wire:model="jumlah_cukai_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('jumlah_cukai_pasangan') }}" autocomplete="off">
                                    @error('jumlah_cukai_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text" wire:model="bulanan_cukai_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('bulanan_cukai_pasangan') }}" autocomplete="off">
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
                                    <input class="form-control bg-light" wire:model="jumlah_koperasi_pegawai"
                                        value="{{ old('jumlah_koperasi_pegawai') }}"
                                        onkeypress="return isNumberKey(event,this)" id="jumlah_koperasi_pegawai"
                                        autocomplete="off">
                                    @error('jumlah_koperasi_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="bulanan_koperasi_pegawai"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('bulanan_koperasi_pegawai') }}" id="bulanan_koperasi_pegawai"
                                        autocomplete="off">
                                    @error('bulanan_koperasi_pegawai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="jumlah_koperasi_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('jumlah_koperasi_pasangan') }}" id="jumlah_koperasi_pasangan"
                                        autocomplete="off">
                                    @error('jumlah_koperasi_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" wire:model="bulanan_koperasi_pasangan"
                                        onkeypress="return isNumberKey(event,this)"
                                        value="{{ old('bulanan_koperasi_pasangan') }}" id="bulanan_koperasi_pasangan"
                                        autocomplete="off">
                                    @error('bulanan_koperasi_pasangan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            @livewire('form-b-tanggungan')
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-1" align="right">
                    <input type="checkbox" name="pengakuan" value="pengakuan pegawai">
                </div>
                <div class="col-md-11">
                    <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah
                            lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan,
                            perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
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
                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal"
                        data-target="#save">Simpan</button>
                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal"
                        data-target="#publish">Hantar</button>
                </div>
                <br>
                <br>
                <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                <button type="submit" class="btn btn-danger" wire:click.prevent="store('simpan')"
                                    data-dismiss="modal">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="publish" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                {{-- <button type="submit" class="btn btn-danger" wire:click.prevent="store('hantar')" data-dismiss="modal">Ya</button> --}}
                                <button type="submit" class="btn btn-danger" wire:click.prevent="store('hantar')"
                                    data-dismiss="modal">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    @if (count($errors) > 0)
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

</div>
