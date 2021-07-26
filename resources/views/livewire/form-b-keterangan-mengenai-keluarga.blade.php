<div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card rounded-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>2.KETERANGAN MENGENAI KELUARGA</b></p>
                        </div>
                    </div>
                    @if ($maklumat_pasangan != null)
                    @foreach ($maklumat_pasangan as $maklumat_pasangan)
                        <div class="row">
                            <div class="col-md-4">
                                <p>Nama Suami / Isteri</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    @if ($maklumat_pasangan->NOKNAME != null)
                                        <input type="hidden" name="nama_pasangan"
                                            value="{{ ucwords(strtolower($maklumat_pasangan->NOKNAME)) }}">{{ ucwords(strtolower($maklumat_pasangan->NOKNAME)) }}
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
                                    @if ($maklumat_pasangan->ICNEW != null)
                                        <input type="hidden" name="ic_pasangan"
                                            value="{{ $maklumat_pasangan->NOKNAME }}">{{ $maklumat_pasangan->ICNEW }}
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
                                    @if ($maklumat_pasangan->NOKEMLOYER != null)
                                        <input type="text" class="form-control bg-light" wire:model="pekerjaan_pasangan" placeholder="Pekerjaan Pasangan">
                                    @else
                                        <input type="text" class="form-control bg-light" wire:model="pekerjaan_pasangan" placeholder="Pekerjaan Pasangan">
                                    @endif
                                    @error('pekerjaan_pasangan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @endif

                    @if ($maklumat_anak != null)
                        @foreach ($maklumat_anak as $maklumat_anak)
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama Anak</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @if ($maklumat_anak->NOKNAME != null)
                                            <input type="hidden" name="nama_anak"
                                                value="{{ ucwords(strtolower($maklumat_anak->NOKNAME)) }}">{{ ucwords(strtolower($maklumat_anak->NOKNAME)) }}
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
                                        if ($ic != '') {
                                        $year = substr($ic, 0, 2);
                                        $curYear = Date('Y');
                                        $cutoff = Date('Y') - 2000;

                                        if ($year > $cutoff) {
                                        $above = $curYear - ($year + 1900);
                                        echo $above;
                                        } else {
                                        $above = $curYear - ($year + 2000);
                                        echo $above;
                                        }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>No.Kad Pengenalan Anak/Tanggungan</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @if ($maklumat_anak->NOKNAME != null)
                                            <!-- <input type="hidden" name="ic_anak" value="{{ $maklumat_anak->ICNEW }}">{{ $maklumat_anak->ICNEW }} -->
                                            <span id="ic_anak"
                                                value="{{ $maklumat_anak->ICNEW }}">{{ $maklumat_anak->ICNEW }}</span>
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
</div>
