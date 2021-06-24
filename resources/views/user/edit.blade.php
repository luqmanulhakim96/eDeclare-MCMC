@extends('user.layouts.app')
@section('content')
      <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                </div>
                <!-- Small card component -->

                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Edit Permohonan</div>

                      <form action="{{route('user.update', $info->id)}}" method="post">
                        @csrf
                        <!-- jenis data input-->
                        <div class="form-group">
                            <label for="select-1">Pilih Jenis Dokumen:</label>
                              <select id="select-1" class="custom-select  bg-light" name="jenis_dokumen">
                                <option value="" selected disabled hidden>Pilih Jenis Dokumen</option>
                                <option value="Bercetak" {{ $info->jenis_dokumen == "Bercetak" ? 'selected' : '' }}>Bercetak</option>
                                <option value="Vektor Shapefile" {{ $info->jenis_dokumen == "Vektor Shapefile" ? 'selected' : '' }}>Vektor Shapefile (Digital)</option>
                                <option value="Lain-lain" {{ $info->jenis_dokumen == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                              </select>
                              @error('jenis_dokumen')
                              <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                              </div>
                              @enderror
                        </div>

                        <!-- jenis hutan input-->
                        <div class="form-group">
                            <label for="select-1">Jenis Data:</label>
                              <select id="select-1" class="custom-select  bg-light" name="jenis_data" onChange="showDiv(this)">
                                  <option value="" selected disabled hidden>Pilih Jenis Data</option>
                                  <option value="Litupan Kawasan Hutan" {{ $info->jenis_data == "Litupan Kawasan Hutan" ? 'selected' : '' }}>Litupan Kawasan Hutan</option>
                                  <option value="Sempadan Hutan Simpanan Kekal" {{ $info->jenis_data == "Sempadan Hutan Simpanan Kekal" ? 'selected' : '' }}>Sempadan Hutan Simpanan Kekal</option>
                                  <option value="Inventori Hutan Nasional" {{ $info->jenis_data == "Inventori Hutan Nasional" ? 'selected' : '' }}>Inventori Hutan Nasional</option>
                                  <option value="Kelas Fungsi Hutan" {{ $info->jenis_data == "Kelas Fungsi Hutan" ? 'selected' : '' }}>Kelas Fungsi Hutan</option>
                                  <option value="Petak Kajian" {{ $info->jenis_data == "Petak Kajian" ? 'selected' : '' }}>Petak Kajian</option>
                                  <option value="Lain-lain" {{ $info->jenis_data == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                              </select>
                              @error('jenis_data')
                              <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                              </div>
                              @enderror
                        </div>

                        @if($info->jenis_data == "Petak Kajian")
                        <!--tahun input -->
                        <div class="form-group" id="tahun_div" style="display: none;">
                            <label for="tahun">Tahun:</label>
                            <input type="text" class="form-control bg-light" name="tahun" id="tahun" aria-describedby="tahun" placeholder="Masukkan Tahun" value="{{ $info->tahun }}">
                            @error('tahun')
                            <div class="alert alert-danger">
                              <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!--kategori data input -->
                        <div class="form-group" id="kategori_data_div" style="display: block;">
                            <label for="kategori_data">Kategori Data:</label>
                              <select id="kategori_data" class="custom-select  bg-light" name="kategori_data" >
                                  <option value="" selected disabled hidden>Pilih Jenis Data</option>
                                  <option value="Fenologi" {{ $info->kategori_data == "Fenologi" ? 'selected' : '' }}>Fenologi</option>
                                  <option value="Growth Ploth" {{ $info->kategori_data == "Growth Ploth" ? 'selected' : '' }}>Growth Ploth</option>
                                  <option value="G&Y" {{ $info->kategori_data == "G&Y" ? 'selected' : '' }}>G&Y</option>
                                  <option value="Restorasi" {{ $info->kategori_data == "Restorasi" ? 'selected' : '' }}>Restorasi</option>
                                  <option value="CFI" {{ $info->kategori_data == "CFI" ? 'selected' : '' }}>CFI</option>
                              </select>
                              @error('kategori_data')
                              <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                              </div>
                              @enderror
                        </div>
                        @elseIf($info->jenis_data != "Petak Kajian")
                        <!--tahun input -->
                        <div class="form-group" id="tahun_div" style="display: block;">
                            <label for="tahun">Tahun:</label>
                            <input type="text" class="form-control bg-light" name="tahun" id="tahun" aria-describedby="tahun" placeholder="Masukkan Tahun" value="{{ $info->tahun }}">
                            @error('tahun')
                            <div class="alert alert-danger">
                              <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!--kategori data input -->
                        <div class="form-group" id="kategori_data_div" style="display: none;">
                            <label for="kategori_data">Kategori Data:</label>
                              <select id="kategori_data" class="custom-select  bg-light" name="kategori_data" >
                                  <option value="" selected disabled hidden>Pilih Jenis Data</option>
                                  <option value="Fenologi" {{ $info->kategori_data == "Fenologi" ? 'selected' : '' }}>Fenologi</option>
                                  <option value="Growth Ploth" {{ $info->kategori_data == "Growth Ploth" ? 'selected' : '' }}>Growth Ploth</option>
                                  <option value="G&Y" {{ $info->kategori_data == "G&Y" ? 'selected' : '' }}>G&Y</option>
                                  <option value="Restorasi" {{ $info->kategori_data == "Restorasi" ? 'selected' : '' }}>Restorasi</option>
                                  <option value="CFI" {{ $info->kategori_data == "CFI" ? 'selected' : '' }}>CFI</option>
                              </select>
                              @error('kategori_data')
                              <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                              </div>
                              @enderror
                        </div>
                        @endif

                        <!-- negeri input -->
                        <div class="form-group">
                          <label for="select-1">Pilih Negeri:</label>
                            <select id="select-1" class="custom-select  bg-light" name="negeri">
                              <option value="" selected disabled hidden>Pilih Negeri</option>
                              <option value="Semenanjung Malaysia" {{ $info->negeri == "Semenanjung Malaysia" ? 'selected' : '' }}>Semenanjung Malaysia</option>
                              <option value="Johor" {{ $info->negeri == "Johor" ? 'selected' : '' }}>Johor</option>
                              <option value="Kedah" {{ $info->negeri == "Kedah" ? 'selected' : '' }}>Kedah</option>
                              <option value="Kelantan" {{ $info->negeri == "Kelantan" ? 'selected' : '' }}>Kelantan</option>
                              <option value="Negeri Sembilan" {{ $info->negeri == "Johor" ? 'selected' : '' }}>Negeri Sembilan</option>
                              <option value="Pahang" {{ $info->negeri == "Pahang" ? 'selected' : '' }}>Pahang</option>
                              <option value="Perak" {{ $info->negeri == "Perak" ? 'selected' : '' }}>Perak</option>
                              <option value="Perlis" {{ $info->negeri == "Perlis" ? 'selected' : '' }}>Perlis</option>
                              <option value="Pulau Pinang" {{ $info->negeri == "Pulau Pinang" ? 'selected' : '' }}>Pulau Pinang</option>
                              <option value="Selangor" {{ $info->negeri == "Selangor" ? 'selected' : '' }}>Selangor</option>
                              <option value="Terengganu" {{ $info->negeri == "Terengganu" ? 'selected' : '' }}>Terengganu</option>
                              <option value="Melaka" {{ $info->negeri == "Melaka" ? 'selected' : '' }}>Melaka</option>
                              <option value="Wilayah Persekutuan" {{ $info->negeri == "Wilayah Persekutuan" ? 'selected' : '' }}>Wilayah Persekutuan</option>
                            </select>
                            @error('negeri')
                            <div class="alert alert-danger">
                              <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- attachment input -->
                        <div class="form-group">
                            <label for="attachment_permohonan">Muatnaik Lampiran:</label>
                            @if($info->attachment_permohonan != NULL)
                            <a href="#">{{ $info->attachment_permohonan }}</a>
                            @endif
                            <input type="file" class="form-control bg-light" id="attachment_permohonan" name="attachment_permohonan" aria-describedby="attachment_permohonan">
                            <small id="saiz_data" class="form-text text-secondary">Muat naik fail tidak melebihi 120MB</small>
                            @error('attachment_permohonan')
                            <div class="alert alert-danger">
                              <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <!-- dokumen ke luar negara input -->
                        <div class="form-group">
                            <label for="dokumen_ke_luar_negara">Dokumen Ke Luar Negara:</label>

                            <!-- All Radio Button  -->
                            <div class="switchs">
                                <!-- Primary Radio Button  -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="Ya" name="dokumen_ke_luar_negara" class="custom-control-input" value="Ya" {{ $info->dokumen_ke_luar_negara == 'Ya' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="Ya">Ya</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="Tidak" name="dokumen_ke_luar_negara" class="custom-control-input" value="Tidak" {{ $info->dokumen_ke_luar_negara == 'Tidak' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="Tidak">Tidak</label>
                                </div>
                            @error('dokumen_ke_luar_negara')
                            <div class="alert alert-danger">
                              <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <input type="text" class="form-control bg-light" name="status_permohonan"    value="Sedang Diproses"hidden>
                            <input type="text" class="form-control bg-light" name="status_pembayaran"   value="Belum Dibayar" hidden>

                        </div>

                          <button type="submit" class="btn btn-primary">Mohon</button>
                      </form>

                  </div>
                </div>
            </div>
          </div>
          <br><br><br><br>
          
        </main>
        <script type="text/javascript">
        function showDiv(select){
           if(select.value=='Petak Kajian'){
            document.getElementById('kategori_data_div').style.display = "block";
            document.getElementById('tahun_div').style.display = "none";
           } else{
             document.getElementById('kategori_data_div').style.display = "none";
             document.getElementById('tahun_div').style.display = "block";
           }
        }
        </script>
@endsection
