<div>

  <div class="row">
    <div class="mt-4 col-12">

        <div class="rounded-lg card">
            <div class="card-body">
              
                <div class="row">
                    <div class="col-md-4">
                        <p><b> KEMASKINI HARTA</b></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <p class="required">Jenis Harta</p>
                    </div>
                    <!-- input select with text -->
                    <div class="col-md-8">
                        <input list="harta" class="custom-select bg-light"
                            wire:model="jenis_harta" placeholder="Sila masukan harta" autocomplete="off">
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
                        @error('jenis_harta')
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
                            wire:model="pemilik_harta" placeholder="Nama Pemilik"
                            value="{{ old('pemilik_harta') }}">
                            @error('pemilik_harta')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-md-4">
                        <select class="custom-select bg-light" wire:model="hubungan_pemilik" wire:change="showFormHubungan">
                            <option value="" {{ old('hubungan_pemilik') == null ? 'selected' : '' }} disabled hidden>
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
                
                    @if($showhubungan == 1)
                    
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required"> Nyatakan nama pemilik bersama</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="nama_pemilik_bersama"autocomplete="off">
                                    @error('nama_pemilik_bersama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <br>
                        </div>
                    @elseif($showhubungan == 2)

                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="required"> Nyatakan lain-lain hubungan</p>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="lain_lain_hubungan"autocomplete="off">
                                    @error('lain_lain')
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
                            wire:model="maklumat_harta"
                            placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya"
                            value="{{ old('maklumat_harta') }}" autocomplete="off">
                        
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
                        <input class="form-control bg-light" type="date" 
                            wire:model="tarikh_pemilikan_harta" value="{{ old('tarikh_pemilikan_harta') }}"
                            autocomplete="off">
                            @error('tarikh_pemilikan_harta')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <p class="required">Bilangan / Ekar / Kapasiti Enjin / Kaki Persegi / Unit (kalau rumah,
                            nyatakan keluasan tanah tapak rumah itu)</p>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control bg-light" type="text" 
                             wire:model="bilangan" onkeypress="return isNumberKey(event,this)"
                            placeholder="Bilangan / Ekar / Kapasiti Enjin "
                            value="{{ old('bilangan') }}" autocomplete="nope">
                            @error('bilangan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-md-4">
                        <input class="form-control bg-light" type="text" 
                             wire:model="unit_bilangan" 
                            placeholder="Unit / Ekar / CC /Kaki Persegi"
                            value="{{ old('unit_bilangan') }}" autocomplete="nope">
                            @error('unit_bilangan')
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
                             wire:model="nilai_perolehan" onkeypress="return isNumberKey(event,this)"
                            placeholder="Nilai Perolehan Harta (RM)" value="{{ old('nilai_perolehan') }}"
                            autocomplete="off">
                            @error('nilai_perolehan')
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
                        <select class="custom-select bg-light" wire:model="cara_perolehan"
                            wire:change="showForm">
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

                @if ($show == 1)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required"> Dari Siapa Harta Diperolehi</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text" 
                                    wire:model="nama_pemilikan_asal" placeholder="Nama Pemilik Sebelum"
                                    autocomplete="off">
                                    @error('nama_pemilikan_asal')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                        </div>
                        <br>
                    </div>
                @elseif($show == 2)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required"> Cara Pembelian Harta</p>
                            </div>
                            <div class="col-md-8">
                                <select class="custom-select bg-light"
                                    wire:model="cara_belian" wire:change="showFormBelian">
                                    <option value="" disabled hidden>Cara Pembelian Harta</option>
                                    <option value="Pinjaman">Pinjaman</option>
                                    <option value="Pelupusan">Pelupusan</option>
                                    <option value="Tunai">Tunai</option>

                                </select>

                            </div>

                        </div>
                        <br>
                    </div>
                @elseif($show == 3)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required"> Nyatakan,</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text" 
                                    wire:model="lain_lain" value="{{ old('lain_lain') }}" autocomplete="off">
                                    @error('lain_lain')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                        </div>
                        <br>
                    </div>
                
                @endif

                @if ($showbelian == 1)
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">i) Jumlah Pinjaman</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text" 
                                    wire:model="jumlah_pinjaman" onkeypress="return isNumberKey(event,this)"
                                     value="{{ old('jumlah_pinjaman') }}"
                                    autocomplete="off">
                                    @error('jumlah_pinjaman')
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
                                wire:model="institusi_pinjaman"
                                    value="{{ old('institusi_pinjaman') }}" autocomplete="off">
                                    @error('institusi_pinjaman')
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
                                wire:model="tempoh_bayar_balik"
                                    value="{{ old('tempoh_bayar_balik') }}" autocomplete="off">
                                <label for="tempoh_bayar_balik">Sila sertakan bulan atau tahun. cth: (9 Tahun / 10
                                    Bulan)</label>
                                    @error('tempoh_bayar_balik')
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
                                wire:model="ansuran_bulanan" onkeypress="return isNumberKey(event,this)"
                                     value="{{ old('ansuran_bulanan') }}"
                                    autocomplete="off">
                                    @error('ansuran_bulanan')
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
                                wire:model="tarikh_ansuran_pertama"
                                    value="{{ old('tarikh_ansuran_pertama') }}">
                                    @error('tarikh_ansuran_pertama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="">vi) Keterangan lain, Jika ada</p>
                            </div>
                            <div class="col-md-8">

                                <input class="form-control bg-light" type="text" 
                                wire:model="keterangan_lain"
                                    value="{{ old('keterangan_lain') }}" autocomplete="off">
                                
                                    @error('keterangan_lain')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                            </div>                              

                        </div>
                        <br>
                    </div>
                @elseif($showbelian == 2)

                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="required">i) Jenis Harta</p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control bg-light" type="text" 
                                wire:model="jenis_harta_pelupusan"                                    
                                value="{{ old('jenis_harta_pelupusan') }}" autocomplete="off">
                                @error('jenis_harta_pelupusan')
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
                                wire:model="alamat_asset"                                    
                                    value="{{ old('alamat_asset') }}" autocomplete="off">
                                    @error('alamat_asset')
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
                                wire:model="no_pendaftaran"                                    

                                    value="{{ old('no_pendaftaran') }}" autocomplete="off">
                                    @error('no_pendaftaran')
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
                                wire:model="harga_jualan"  onkeypress="return isNumberKey(event,this)"                                  
                                value="{{ old('harga_jualan') }}" autocomplete="off">
                                @error('harga_jualan')
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
                                wire:model="tarikh_lupus"                                    
                                value="{{ old('tarikh_lupus') }}">
                                @error('tarikh_lupus')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                @elseif($showbelian == 3)
                <div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="required"> Nyatakan nilai belian tunai</p>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control bg-light" type="text" 
                                wire:model="tunai" value="{{ old('tunai') }}" onkeypress="return isNumberKey(event,this)" autocomplete="off">
                                @error('tunai')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>

                    </div>
                    <br>
                </div>
                @endif
                <br>
                <br>
                <input class="hidden" wire:model="harta_id">
                <div class="row">
                  <div class="col-md-5">
    
                  </div>
                  <div class="col-md-4">
                    <button wire:click.prevent="update()" type="button" class="btn btn-primary" >Kemaskini</button>
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
          </div>
        </div>
      </div>
</div>
            
          
