<div>
    <div class="row">
        <div class="mt-4 col-12">

            <div class="rounded-lg card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <p><b>4. KETERANGAN MENGENAI HARTA</b></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <p class="required">Jenis Harta</p>
                        </div>
                        <!-- input select with text -->
                        <div class="col-md-8">
                            <input list="harta" class="custom-select bg-light"
                                wire:model="jenis_harta.0" placeholder="Sila masukan harta" autocomplete="off">
                            <datalist id="harta">
                            <option value="" selected disabled>Jenis Harta</option>
                                @foreach ($jenisHarta as $jenisharta)
                                    @if ($jenisharta->status_jenis_harta == 'Aktif')
                                        <option value="{{ $jenisharta->jenis_harta }}">
                                            {{ $jenisharta->jenis_harta }}
                                        </option>
                                    @endif
                                @endforeach
                            </datalist>
                            </input>
                            @error('jenis_harta.0')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="required">Pemilik Harta dan Hubungan Dengan Pegawai (sendiri, suami atau isteri,
                                anak dan sebagainya</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control bg-light" type="text"
                                wire:model="pemilik_harta.0" placeholder="Nama Pemilik"
                                value="{{ old('pemilik_harta') }}">
                                @error('pemilik_harta.0')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <select class="custom-select bg-light" wire:model="hubungan_pemilik.0" wire:change="showFormHubungan(0)">
                                <option value="" {{ old('hubungan_pemilik.0') == null ? 'selected' : '' }} disabled hidden>
                                    Hubungan dengan Pemilik</option>
                                <option value="Sendiri">Sendiri</option>
                                <option value="Anak">Anak</option>
                                <option value="Isteri/Suami">Isteri/Suami</option>
                                <option value="Ibu/Ayah">Ibu/Ayah</option>
                                <option value="Bersama">Milikan Bersama</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>

                        </div>

                    </div>

                        @if($showhubungan[0] == 1)

                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan nama pemilik bersama</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="nama_pemilik_bersama.0"autocomplete="off">
                                        @error('nama_pemilik_bersama.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                            </div>
                        @elseif($showhubungan[0] == 2)

                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan lain-lain hubungan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="lain_lain_hubungan.0"autocomplete="off">
                                        @error('lain_lain.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                            </div>
                        @endif

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control bg-light" type="text"
                                wire:model="maklumat_harta.0"
                                placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya"
                                value="{{ old('maklumat_harta') }}" autocomplete="off">

                        @error('maklumat_harta.0')
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
                            <input class="form-control bg-light" type="date"
                                wire:model="tarikh_pemilikan_harta.0" id="tarikh_pemilikan_harta.0" value="{{ old('tarikh_pemilikan_harta') }}"
                                autocomplete="off">
                                @error('tarikh_pemilikan_harta.0')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

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
                         document.getElementById("tarikh_pemilikan_harta.0").setAttribute("max", today);

                        </script>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="required">Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah,
                                nyatakan keluasan tanah tapak rumah itu)</p>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control bg-light" type="text"
                                 wire:model="bilangan.0" onkeypress="return isNumberKey(event,this)"
                                placeholder="Bilangan / Ekar / Kapasiti Enjin "
                                value="{{ old('bilangan') }}" autocomplete="nope">
                                @error('bilangan.0')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="col-md-4">
                            <input class="form-control bg-light" type="text"
                                 wire:model="unit_bilangan.0"
                                placeholder="Unit / Ekar / CC /Kaki Persegi"
                                value="{{ old('unit_bilangan') }}" autocomplete="nope">
                                @error('unit_bilangan.0')
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
                            <input class="form-control bg-light" type="text"
                                 wire:model="nilai_perolehan.0" onkeypress="return isNumberKey(event,this)"
                                placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan') }}"
                                autocomplete="off">
                                @error('nilai_perolehan.0')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="required">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)
                            </p>
                        </div>
                        <div class="col-md-8">
                            <select class="custom-select bg-light" wire:model="cara_perolehan.0"
                                wire:change="showForm(0)">
                                <option value="" disabled hidden>Cara Perolehan</option>
                                <option value="Dipusakai"
                                    {{ old('cara_perolehan') == 'Dipusakai' ? 'selected' : '' }}>Dipusakai</option>
                                <option value="Dibeli" {{ old('cara_perolehan') == 'Dibeli' ? 'selected' : '' }}>
                                    Dibeli</option>
                                <option value="Dihadiahkan"
                                    {{ old('cara_perolehan') == 'Dihadiahkan' ? 'selected' : '' }}>Dihadiahkan
                                </option>
                                <option value="Lain-lain"
                                    {{ old('cara_perolehan') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                            </select>

                        </div>

                    </div>
                    <br>
                    {{-- {{ $show }} --}}

                    @if ($show[0] == 1)
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required"> Dari Siapa Harta Diperolehi</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="nama_pemilikan_asal.0" placeholder="Nama Pemilik Sebelum"
                                        autocomplete="off">
                                        @error('nama_pemilikan_asal.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                            <br>
                        </div>
                    @elseif($show[0] == 2)
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required"> Cara Pembelian Harta</p>
                                </div>
                                <div class="col-md-8">
                                    <select class="custom-select bg-light"
                                        wire:model="cara_belian.0" wire:change="showFormBelian(0)">
                                        <option value="" disabled hidden>Cara Pembelian Harta</option>
                                        <option value="Pinjaman">Pinjaman</option>
                                        <option value="Pelupusan">Pelupusan</option>
                                        <option value="Tunai">Tunai</option>

                                    </select>

                                </div>

                            </div>
                            <br>
                        </div>
                    @elseif($show[0] == 3)
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required"> Nyatakan,</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="lain_lain.0" value="{{ old('lain_lain') }}" autocomplete="off">
                                        @error('lain_lain.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                            <br>
                        </div>

                    @endif

                    @if ($showbelian[0] == 1)
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">i) Jumlah Pinjaman</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="jumlah_pinjaman.0" onkeypress="return isNumberKey(event,this)"
                                         value="{{ old('jumlah_pinjaman') }}"
                                        autocomplete="off">
                                        @error('jumlah_pinjaman.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">ii) Institusi memberi pinjaman</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="institusi_pinjaman.0"
                                        value="{{ old('institusi_pinjaman') }}" autocomplete="off">
                                        @error('institusi_pinjaman.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">iii) Tempoh bayaran balik</p>
                                </div>
                                <div class="col-md-8">

                                    <input class="form-control bg-light" type="text"
                                    wire:model="tempoh_bayar_balik.0"
                                        value="{{ old('tempoh_bayar_balik') }}" autocomplete="off">
                                    <label for="tempoh_bayar_balik">Sila sertakan bulan atau tahun. cth: (9 Tahun / 10
                                        Bulan)</label>
                                        @error('tempoh_bayar_balik.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">iv) Ansuran bulanan </p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="ansuran_bulanan.0" onkeypress="return isNumberKey(event,this)"
                                         value="{{ old('ansuran_bulanan') }}"
                                        autocomplete="off">
                                        @error('ansuran_bulanan.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">v) Tarikh ansuran pertama</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="date"
                                    wire:model="tarikh_ansuran_pertama.0" id="tarikh_ansuran_pertama.0"
                                        value="{{ old('tarikh_ansuran_pertama') }}">
                                        @error('tarikh_ansuran_pertama.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

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
                             document.getElementById("tarikh_ansuran_pertama.0").setAttribute("max", today);

                            </script>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="">vi) Keterangan lain, Jika ada</p>
                                </div>
                                <div class="col-md-8">

                                    <input class="form-control bg-light" type="text"
                                    wire:model="keterangan_lain.0"
                                        value="{{ old('keterangan_lain') }}" autocomplete="off">

                                        @error('keterangan_lain.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                </div>

                            </div>
                            <br>
                        </div>
                    @elseif($showbelian[0] == 2)

                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">i) Jenis Harta</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="jenis_harta_pelupusan.0"
                                    value="{{ old('jenis_harta_pelupusan') }}" autocomplete="off">
                                    @error('jenis_harta_pelupusan.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">ii) Alamat</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="alamat_asset.0"
                                        value="{{ old('alamat_asset') }}" autocomplete="off">
                                        @error('alamat_asset.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">iii) No Pendaftaran Harta</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="no_pendaftaran.0"

                                        value="{{ old('no_pendaftaran') }}" autocomplete="off">
                                        @error('no_pendaftaran.0')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">iv) Harga Jualan</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                    wire:model="harga_jualan.0"  onkeypress="return isNumberKey(event,this)"
                                    value="{{ old('harga_jualan') }}" autocomplete="off">
                                    @error('harga_jualan.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required">v) Tarikh lupus</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="date"
                                    wire:model="tarikh_lupus.0" id="tarikh_lupus.0">
                                    @error('tarikh_lupus.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

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
                             document.getElementById("tarikh_lupus.0").setAttribute("max", today);

                            </script>
                        </div>
                    @elseif($showbelian[0] == 3)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required"> Nyatakan nilai belian tunai</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text"
                                    wire:model="tunai.0" value="{{ old('tunai') }}" onkeypress="return isNumberKey(event,this)" autocomplete="off">
                                    @error('tunai.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                        </div>
                        <br>
                    </div>
                    @endif




                    <br>

                </div>
            </div>
            <br>
            <br>

                    {{-- livewire part --}}
                <div>
                    @foreach ($inputs as $key => $value)
                    <div class="rounded-lg card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">Jenis Harta</p>
                            </div>
                            <!-- input select with text -->
                            <div class="col-md-8">
                                <input list="harta" class="custom-select bg-light"
                                    wire:model="jenis_harta.{{ $value }}" placeholder="Sila masukan harta"
                                    autocomplete="off">
                                <datalist id="harta">
                                <option value='' selected disabled hidden>Jenis Harta</option>
                                    @foreach ($jenisHarta as $jenisharta)
                                        @if ($jenisharta->status_jenis_harta == 'Aktif')
                                            <option value="{{ $jenisharta->jenis_harta }}">
                                                {{ $jenisharta->jenis_harta }}
                                            </option>
                                        @endif
                                    @endforeach
                                </datalist>
                                </input>
                                @error('jenis_harta.'.$value)
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">Pemilik Harta dan Hubungan Dengan Pegawai (sendiri, suami atau
                                    isteri,
                                    anak dan sebagainya</p>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control bg-light" type="text"
                                    wire:model="pemilik_harta.{{ $value }}" placeholder="Nama Pemilik">
                                    @error('pemilik_harta.'.$value)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                            </div>
                            <div class="col-md-4">
                                <select class="custom-select bg-light" wire:model="hubungan_pemilik.{{ $value }}" wire:change="showFormHubungan({{ $value }})">
                                    <option value="" selected disabled hidden>Hubungan dengan Pemilik</option>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Isteri/Suami">Isteri/Suami</option>
                                    <option value="Ibu/Ayah">Ibu/Ayah</option>
                                    <option value="Bersama">Milikan Bersama</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                                @error('hubungan_pemilik.'.$value)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if($showhubungan[$value] == 1)

                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan nama pemilik bersama</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="nama_pemilik_bersama.{{ $value }}"autocomplete="off">
                                        @error('nama_pemilik_bersama.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                            </div>
                        @elseif($showhubungan[$value] == 2)

                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan lain-lain hubungan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="lain_lain_hubungan.{{ $value }} "autocomplete="off">
                                        @error('lain_lain.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                            </div>
                        @endif
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text"
                                    wire:model="maklumat_harta.{{ $value }}"
                                    placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" autocomplete="off">
                                    @error('maklumat_harta.'.$value)
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
                                <input class="form-control bg-light" type="date"
                                    wire:model="tarikh_pemilikan_harta.{{ $value }}" id="tarikh_pemilikan_harta.{{ $value }}" autocomplete="off">
                                @error('tarikh_pemilikan_harta.'.$value)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                             document.getElementById("tarikh_pemilikan_harta.{{ $value }}").setAttribute("max", today);

                            </script>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah,
                                    nyatakan keluasan tanah tapak rumah itu)</p>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control bg-light" type="text"
                                     wire:model="bilangan.{{ $value }}" onkeypress="return isNumberKey(event,this)"
                                    placeholder="Bilangan / Ekar / Kapasiti Enjin " autocomplete="nope">
                                @error('bilangan.'.$value)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input class="form-control bg-light" type="text"
                                     wire:model="unit_bilangan.{{ $value }}"
                                    placeholder=" Unit / Ekar / CC / Kapasiti Enjin" autocomplete="nope">
                                @error('unit_bilangan.'.$value)
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
                                <input class="form-control bg-light" type="text"
                                onkeypress="return isNumberKey(event,this)"
                                    wire:model="nilai_perolehan.{{ $value }}"
                                    placeholder="Nilai Perolehan Harta (RM)"
                                    autocomplete="off">
                                    @error('nilai_perolehan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan
                                    sebagainya)
                                </p>
                            </div>
                            <div class="col-md-8">
                                <select class="custom-select bg-light"
                                    wire:model="cara_perolehan.{{ $value }}" wire:change="showForm({{ $value }})">
                                    <option value="" disabled hidden>Cara Perolehan</option>
                                    <option value="Dipusakai">Dipusakai
                                    </option>
                                    <option value="Dibeli">
                                        Dibeli</option>
                                    <option value="Dihadiahkan">Dihadiahkan
                                    </option>
                                    <option value="Lain-lain">Lain-lain
                                    </option>
                                </select>
                                @error('cara_perolehan.'.$value)
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>
                        <br>
                        {{-- {{ $show }} --}}

                        @if ($show[$value] == 1)
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Dari Siapa Harta Diperolehi</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="nama_pemilikan_asal.{{ $value }}"
                                            placeholder="Nama Pemilik Sebelum" autocomplete="off">
                                        @error('nama_pemilikan_asal.'.$value)
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                            </div>
                        @elseif($show[$value] == 2)
                            <div id="cara_belian_container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Cara Pembelian Harta</p>
                                    </div>
                                    <div class="col-md-8">
                                        <select id="select_cara_belian" class="custom-select bg-light"
                                            wire:model="cara_belian.{{ $value }}" wire:change="showFormBelian({{ $value }})">
                                            <option value="" disabled hidden>Cara Pembelian Harta</option>
                                            <option value="Pinjaman">Pinjaman</option>
                                            <option value="Pelupusan">Pelupusan</option>
                                            <option value="Tunai">Tunai</option>
                                        </select>
                                        @error('cara_belian.'.$value)
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>
                                <br>
                            </div>
                        @elseif($show[$value] == 3)
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan,</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="lain_lain.{{ $value }}"autocomplete="off">
                                        @error('lain_lain.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                            </div>
                        @endif

                        @if ($showbelian[$value] == 1)
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">i) Jumlah Pinjaman</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="jumlah_pinjaman.{{ $value }}" onkeypress="return isNumberKey(event,this)"
                                        autocomplete="off">
                                        @error('jumlah_pinjaman.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">ii) Institusi memberi pinjaman</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="institusi_pinjaman.{{ $value }}"
                                            autocomplete="off">
                                            @error('institusi_pinjaman.'.$value)
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">iii) Tempoh bayaran balik</p>
                                    </div>
                                    <div class="col-md-8">

                                        <input class="form-control bg-light" type="text"
                                        wire:model="tempoh_bayar_balik.{{ $value }}"
                                        autocomplete="off">
                                        <label for="tempoh_bayar_balik">Sila sertakan bulan atau tahun. cth: (9 Tahun /
                                            10
                                            Bulan)</label>
                                            @error('tempoh_bayar_balik.'.$value)
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <!-- <div class="col-md-4">
                        <select class="form-control bg-light" id="tempoh" name="tempoh">
                        <option selected value="years">Tahun</option>
                        <option value="months">Bulan</option>
                        </select>
                    </div> -->

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">iv) Ansuran bulanan </p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="ansuran_bulanan.{{ $value }}" onkeypress="return isNumberKey(event,this)"
                                        autocomplete="off">
                                        @error('ansuran_bulanan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">v) Tarikh ansuran pertama</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="date"
                                        wire:model="tarikh_ansuran_pertama.{{ $value }}" id="tarikh_ansuran_pertama.{{ $value }}">
                                        @error('tarikh_ansuran_pertama.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                     document.getElementById("tarikh_ansuran_pertama.{{ $value}}").setAttribute("max", today);

                                    </script>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="">vi) Keterangan lain, Jika ada</p>
                                    </div>
                                    <div class="col-md-8">

                                        <input class="form-control bg-light" type="text"
                                        wire:model="keterangan_lain.{{ $value }}"
                                            autocomplete="off">

                                            @error('keterangan_lain.{{ $value }}"')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                    </div>

                                </div>

                                <br>
                            </div>

                        @elseif($showbelian[$value] == 2)

                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">i) Jenis Harta</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="jenis_harta_pelupusan.{{ $value }}"
                                        autocomplete="off">
                                        @error('jenis_harta_pelupusan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">ii) Alamat</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="alamat_asset.{{ $value }}"
                                        autocomplete="off">
                                        @error('alamat_asset.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">iii) No Pendaftaran Harta</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="no_pendaftaran.{{ $value }}"
                                        autocomplete="off">
                                        @error('no_pendaftaran.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">iv) Harga Jualan</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                        wire:model="harga_jualan.{{ $value }}" onkeypress="return isNumberKey(event,this)"
                                        autocomplete="off">
                                        @error('harga_jualan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required">v) Tarikh lupus</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="date"
                                        wire:model="tarikh_lupus.{{ $value }}" id="tarikh_lupus.{{ $value }}">
                                        @error('tarikh_lupus.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                     document.getElementById("tarikh_lupus.{{ $value }}").setAttribute("max", today);

                                    </script>

                                </div>
                            </div>
                            @elseif($showbelian[$value] == 3)
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="required"> Nyatakan nilai belian tunai</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control bg-light" type="text"
                                            wire:model="tunai.{{ $value }}" onkeypress="return isNumberKey(event,this)" autocomplete="off">
                                            @error('tunai.{{ $value }}')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>
                                <br>
                            </div>

                        @endif

                    </div>
                </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        {{-- <div class="col-md-1">
                            <button class="btn btn-primary" wire:click.prevent="addform({{ $i }})">Tambah Data Harta</button>
                        </div> --}}
                        <div class="col-md-2">
                            <button class="btn btn-danger" wire:click.prevent="remove({{ $key }})">Padam Data Harta</button>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br>

                    @endforeach
                    @if($show2)
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button class="btn btn-primary"  wire:click="$set('show2', true)" wire:click.prevent="addform({{ $i }})">Tambah Data Harta</button>
                            </div>
                            {{-- <div class="col-md-1">
                                <button class="btn btn-danger" wire:click.prevent="remove({{ $i }})">Padam Data Harta</button>
                            </div> --}}
                            <div class="col-md-5"></div>
                        </div>
                        <br>
                    @endif




            </div>
        </div>
    </div>

    <br>
    <!-- <div class="rounded-lg card">
        <div class="card-body">
            <div class="card-title" style="text-align: center;">Keterangan Mengenai Harta</div>

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
                                <p class="mb-0">Bilangan / Ekar / kaki Persegi / Unit (kalau rumah, nyatakan keluasan
                                    tanah tapak rumah itu)</p>
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


                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
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
