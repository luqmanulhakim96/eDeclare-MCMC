<div>

                    <!--LAIN2 PINJAMAN -->
                    <input type="hidden" wire:model="counter" value="0" id="counter1">

                    <div class="row">
                        <div class="col-md-3">
                            <p>v) Lain-Lain Pinjaman</p>
                        </div>
                    </div>
                    <div class="table_lain" id="table_lain">
                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control bg-light" type="text" wire:model="lain_lain_pinjaman.0"
                                    placeholder="Nyatakan Lain-Lain Pinjaman" value="lain_lain_pinjaman.0"
                                    autocomplete="off">
                                @error('lain_lain_pinjaman.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input class="form-control bg-light" type="text" wire:model="pinjaman_pegawai.0"
                                    onkeypress="return isNumberKey(event,this)"
                                    value="pinjaman_pegawai.0"
                                    autocomplete="off">
                                @error('pinjaman_pegawai.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input class="form-control bg-light" type="text" wire:model="bulanan_pegawai.0"
                                    value="bulanan_pegawai.0"
                                    onkeypress="return isNumberKey(event,this)"
                                    autocomplete="off">
                                @error('bulanan_pegawai.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input class="form-control bg-light" type="text" wire:model="pinjaman_pasangan.0"
                                    value="pinjaman_pasangan.0"
                                    onkeypress="return isNumberKey(event,this)"
                                    autocomplete="off">
                                @error('pinjaman_pasangan.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <input class="form-control bg-light" type="text" wire:model="bulanan_pasangan.0"
                                    value="bulanan_pasangan.0"
                                    onkeypress="return isNumberKey(event,this)"
                                    autocomplete="off">
                                @error('bulanan_pasangan.0')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-1">
                                <button class="btn btn-primary"
                                    wire:click.prevent="addformpinjaman({{ $j }})">Tambah</button>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="table_lain" id="table_lain">
                    @foreach ($inputpinjaman as $key => $value)
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="lain_lain_pinjaman.{{ $value }}"
                                        placeholder="Nyatakan Lain-Lain Pinjaman" autocomplete="off">
                                    @error('lain_lain_pinjaman.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="pinjaman_pegawai.{{ $value }}"
                                        onkeypress="return isNumberKey(event,this)" {{-- onkeypress="return onlyNumberKey(event)" --}}
                                        autocomplete="off">
                                    @error('pinjaman_pegawai.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="bulanan_pegawai.{{ $value }}"
                                        onkeypress="return isNumberKey(event,this)"{{-- onkeypress="return onlyNumberKey(event)" --}}
                                        autocomplete="off">
                                    @error('bulanan_pegawai.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="pinjaman_pasangan.{{ $value }}"
                                        onkeypress="return isNumberKey(event,this)" {{-- onkeypress="return onlyNumberKey(event)" --}}
                                        autocomplete="off">
                                    @error('pinjaman_pasangan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control bg-light" type="text"
                                        wire:model="bulanan_pasangan.{{ $value }}"
                                        onkeypress="return isNumberKey(event,this)"{{-- onkeypress="return onlyNumberKey(event)" --}}
                                        autocomplete="off">
                                    @error('bulanan_pasangan.'.$value)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-1">

                                    <a wire:click.prevent="removepinjaman({{ $key }})" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a>

                                </div>
                            </div>
                            <br>
                    @endforeach
                    </div>
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
