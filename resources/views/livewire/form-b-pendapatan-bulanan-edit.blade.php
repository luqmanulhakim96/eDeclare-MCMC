<div wire:init='loadData'>

    <!-- dividen -->
    <div class="row">
        <div class="col-md-3 mt-2 mt-md-0">
            <p> iv) Dividen</p>
        </div>
    </div>


    <div id="dividen_field">
        <div class="row">
            <div class="col-md-3 mt-2 mt-md-0">
                <div class="input-group">
                    <input class="form-control bg-light" type="text" wire:model="dividen_1.0"
                        placeholder="Nyatakan Dividen" autocomplete="off">

                </div>
                @error('dividen_1.0')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-md-4 mt-2 mt-md-0">
                <div class="input-group">
                    <input class="form-control bg-light" wire:model="dividen_1_pegawai.0" {{-- onkeypress="" id="dividen0"/ --}}
                        onkeypress="return isNumberKey(event,this)" placeholder="Dividen Pegawai" autocomplete="off">

                </div>
                @error('dividen_1_pegawai.0')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-md-4 mt-2 mt-md-0">
                <input class="form-control bg-light" wire:model="dividen_pasangan.0" {{-- onkeypress="" id="dividen0" --}}
                    onkeypress="return isNumberKey(event,this)" placeholder="Dividen Pasangan" autocomplete="off">
                @error('dividen_pasangan.0')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-1">
                <button class="btn btn-primary" wire:click.prevent="addformdividen({{ $i }})">Tambah</button>
            </div>


        </div>
    </div>
    <br>
    <br>
    <div id="dividen_field">
        @foreach ($inputs as $key => $value)
            <div class="row">
                <div class="col-md-3 mt-2 mt-md-0">
                    <div class="form-group">
                        <input class="form-control bg-light" type="text" wire:model="dividen_1.{{ $value }}"
                            placeholder="Nyatakan Dividen" autocomplete="off">
                        @error('dividen_1.' . $value)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mt-2 mt-md-0">
                    <div class="form-group">
                        <input class="form-control bg-light" wire:model="dividen_1_pegawai.{{ $value }}"
                            {{-- onkeypress="" id="dividen0" --}} onkeypress="return isNumberKey(event,this)"
                            placeholder="Dividen Pegawai" autocomplete="off">
                        @error('dividen_1_pegawai.' . $value)
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4 mt-2 mt-md-0">
                    <input class="form-control bg-light" wire:model="dividen_pasangan.{{ $value }}"
                        {{-- onkeypress="" id="dividen0" --}} onkeypress="return isNumberKey(event,this)" placeholder="Dividen Pasangan"
                        autocomplete="off">
                    @error('dividen_pasangan.' . $value)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1">
                    <a wire:click.prevent="remove({{ $key }})" class="btn btn-danger"><i
                            class="fas fa-trash"></i></a>
                    {{-- <i class="fa fa-trash"  wire:click.prevent="remove({{$key}})"></i> --}}
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
