@extends('user.layouts.app')
@section('content')


           <!--Page Body part -->
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <h5 class="font-weight-normal">Lampiran C: Borang Pelupusan Harta</h5>
               </div>

               <!-- All Basic Form elements -->
               <div class="row">
                 <div class="col-12 mt-4">
                      <div class="card rounded-lg">
                          <div class="card-body">
                              <form action="{{route('c.update', $data->id)}}" method="POST">
                                @csrf

                                <div id="hidden_input" name="hidden_input">
                                  <input type="hidden" id="counter_keterangan" name="counter_keterangan" value="0">
                                  <input type="hidden" id="increment_keterangan" name="increment_keterangan" value="0">
                                </div>
                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Nama</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          <input type="hidden" name="nama_pegawai"  value="{{$data->nama_pegawai}}">{{$data->nama_pegawai}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>No. Kad Pengenalan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="hidden" name="kad_pengenalan"  value="{{$data->kad_pengenalan}}">{{$data->kad_pengenalan}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jawatan / Gred</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                          <input type="hidden" name="jawatan"  value="{{$data->jawatan }}">{{$data->jawatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Jabatan</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <input type="hidden" name="jabatan" value="{{$data->jabatan }}">{{$data->jabatan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p>Alamat Tempat Bertugas</p>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="form-group">
                                              <input type="hidden" name="alamat_tempat_bertugas" value="{{$data->alamat_tempat_bertugas }}">{{$data->alamat_tempat_bertugas }}
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
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p><b>2. KETERANGAN MENGENAI PELUPUSAN HARTA</b></p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <p class="required">Jenis Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                        <select id="jenis_harta_lupus" class="custom-select name bg-light" value="{{ old('jenis_harta_lupus')}}" >
                                            <option value="" selected disabled hidden>Jenis Harta</option>

                                            @foreach($harta as $data)
                                                <option value="{{$data->maklumat_harta}}">{{$data->maklumat_harta}}</option>
                                            @endforeach

                                            </select>
                                            @error('jenis_harta_lupus_')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Pemilik Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input class="form-control bg-light" id="pemilik_harta_pelupusan" type="text"  placeholder="Nama Pemilik Sebelum" value="{{ old('pemilik_harta_pelupusan')}}" readonly>
                                      </div>
                                    </div>
                                    <br>

                                    <input type="hidden" id="id_harta">

                                      <div class="row">
                                        <div class="col-md-4">
                                            <p class="required">Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</p>
                                        </div>
                                        <div class="col-md-8">
                                          <input class="form-control bg-light" id="hubungan_pemilik_pelupusan" type="text"  placeholder="Hubungan dengan Pemilik" value="{{ old('pemilik_harta_pelupusan')}}" readonly>

                                            @error('hubungan_pemilik_pelupusan_')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                      </div>
                                      <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input id="no_pendaftaran_harta" class="form-control bg-light" type="text"  placeholder="Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya" value="{{ old('no_pendaftaran_harta')}}" readonly>
                                          @error('no_pendaftaran_')
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
                                          <input id="tarikh_pemilikan" class="form-control bg-light" type="date"  value="{{ old('tarikh_pemilikan')}}" readonly>
                                          @error('tarikh_pemilikan_')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Tarikh Pelupusan Harta</p>
                                      </div>
                                      <div class="col-md-8">
                                          <input id="tarikh_pelupusan" class="form-control bg-light" type="date"  value="{{ old('tarikh_pelupusan')}}" >
                                          @error('tarikh_pelupusan_')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <p class="required">Cara Pelupusan (sama ada dijual, dihadiahkan dan sebagainya). Jika dijual, Nyatakan nilai jualan.</p>
                                      </div>
                                      <div class="col-md-4">
                                          <select id="cara_pelupusan" class="custom-select  bg-light" value="{{ old('cara_pelupusan')}}" >
                                              <option value="" selected disabled hidden>Cara pelupusan</option>
                                              <option value="Dijual" {{ $data->cara_pelupusan == "Dijual" ? 'selected' : '' }}>Dijual</option>
                                              <option value="Dihadiahkan" {{ $data->cara_pelupusan == "Dihadiahkan" ? 'selected' : '' }}>Dihadiahkan</option>
                                              <option value="Lain-lain" {{ $data->cara_pelupusan == "Lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                          </select>
                                          @error('cara_pelupusan_')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                      <div class="col-md-4">
                                          <input id="nilai_pelupusan" class="form-control bg-light"  onkeypress="return onlyNumberKey(event,this)" type="text" placeholder="Nilai Jualan" value="{{ old('nilai_pelupusan')}}">
                                        @error('nilai_pelupusan_')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                      </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                        </div>
                                        <div class="col-md-4">
                                          <input class="btn btn-primary" type="button" value=" Tambah Data Pelupusan Harta" onclick="keterangan()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card rounded-lg">
                        <div class="card-body">
                          <div class="card-title" style="text-align: center;">Keterangan Mengenai Pelupusan Harta</div>
                          <!-- Table -->
                          <div class="table-responsive">
                              <table class="table table-bordered" id="table_keterangan">
                                  <thead>
                                      <tr class="text-center">
                                          <th width="5%"><p class="mb-0">Jenis Harta</p></th>
                                          <th width="5%"><p class="mb-0">Pemilik Harta</p></th>
                                          <th width="10%"><p class="mb-0">Hubungan</p></th>
                                          <th width="30%"><p class="mb-0">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</p></th>
                                          <th width="15%"><p class="mb-0">Tarikh Pemilikan Harta</p></th>
                                          <th width="15%"><p class="mb-0">Tarikh Pelupusan Harta</p></th>
                                          <th width="15%"><p class="mb-0">Cara Pelupusan</p></th>
                                          <th width="15%"><p class="mb-0">Nilai Pelupusan</p></th>
                                          <th width="5%"><p class="mb-0">Buang</p></th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                      <br>
                        <div class="row">
                          <div class="col-md-1" align="right">
                            <input type="checkbox" name="pengakuan" value="pengakuan pegawai" >
                          </div>
                          <div class="col-md-11">
                              <label for="pengakuan"> <b>Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang palsu atau meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC.</b></label><br>
                          </div>
                        </div>
                        <!-- button -->
                        <div class="row">
                          <div class="col-md-9">
                          </div>
                          <div class="col-md-3">
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#save" >Simpan</button>
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#publish" >Hantar</button>
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
                                          <button type="submit" class="btn btn-danger" name="save">Ya</button>
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
                                          <button type="submit" class="btn btn-danger" name="publish">Ya</button>
                                          </div>
                                      </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <br><br><br><br>


<script type="text/javascript">
function keterangan(){
 var jenis_harta_lupus = document.getElementById("jenis_harta_lupus").value;
 var pemilik_harta_pelupusan = document.getElementById("pemilik_harta_pelupusan").value;
 var hubungan_pemilik_pelupusan = document.getElementById("hubungan_pemilik_pelupusan").value;
 var no_pendaftaran_harta = document.getElementById("no_pendaftaran_harta").value;
 var tarikh_pemilikan = document.getElementById("tarikh_pemilikan").value;
 var tarikh_pelupusan = document.getElementById("tarikh_pelupusan").value;
 var cara_pelupusan = document.getElementById("cara_pelupusan").value;
 var nilai_pelupusan = document.getElementById("nilai_pelupusan").value;
 var id_harta = document.getElementById("id_harta").value;


 var counter_keterangan = document.getElementById("counter_keterangan").value;
 var increment_keterangan = document.getElementById("increment_keterangan").value;

 //tambah table
 $("#table_keterangan").append(
   '<tr><td><p class="mb-0 " style="text-align: center;">' +
   jenis_harta_lupus +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   pemilik_harta_pelupusan +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   hubungan_pemilik_pelupusan +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   no_pendaftaran_harta +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   tarikh_pemilikan +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   tarikh_pelupusan +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   cara_pelupusan +
   '</td><td><p class="mb-0 " style="text-align: center;">' +
   nilai_pelupusan +
   '</td><td><a onClick="removeData(this,'+ increment_keterangan  +'); return false;" class="btn btn-danger mr-1"><i class="fa fa-trash"></i></a></td></tr>'
 );

 jenis_harta_to_append = '<input type="hidden" id="jenis_harta_lupus'+ increment_keterangan +'" name="jenis_harta_lupus_[]"  value="'+ jenis_harta_lupus +'" readonly>';
 pemilik_harta_to_append = '<input type="hidden" id="pemilik_harta_pelupusan'+ increment_keterangan +'" name="pemilik_harta_pelupusan_[]"  value="'+ pemilik_harta_pelupusan +'" readonly>';
 hubungan_pemilik_pelupusan_to_append = '<input hidden="text" id="hubungan_pemilik_pelupusan'+ increment_keterangan +'" name="hubungan_pemilik_pelupusan_[]"  value="'+ hubungan_pemilik_pelupusan +'" readonly>';
 no_pendaftaran_to_append = '<input type="hidden" id="no_pendaftaran_harta'+ increment_keterangan +'" name="no_pendaftaran_harta_[]"  value="'+ no_pendaftaran_harta +'" readonly>';
 tarikh_pemilikan_to_append = '<input type="hidden" id="tarikh_pemilikan'+ increment_keterangan +'" name="tarikh_pemilikan_[]"  value="'+ tarikh_pemilikan +'" readonly>';
 tarikh_pelupusan_to_append = '<input type="hidden" id="tarikh_pelupusan'+ increment_keterangan +'" name="tarikh_pelupusan_[]"  value="'+ tarikh_pelupusan +'" readonly>';
 cara_pelupusan_to_append = '<input type="hidden" id="cara_pelupusan'+ increment_keterangan +'" name="cara_pelupusan_[]"  value="'+ cara_pelupusan +'" readonly>';
 nilai_pelupusan_to_append = '<input type="hidden" id="nilai_pelupusan'+ increment_keterangan +'" onkeypress="return onlyNumberKey(event,this)" name="nilai_pelupusan_[]"  value="'+ nilai_pelupusan +'" readonly>';
 id_harta_to_append = '<input type="hidden" id="id_harta'+ increment_keterangan +'" name="id_harta_[]"  value="'+ id_harta +'" readonly>';

 increment_keterangan++;
 counter_keterangan++;

 document.getElementById("increment_keterangan").value = increment_keterangan;
 document.getElementById("counter_keterangan").value = counter_keterangan;

 $("#counter_keterangan").append(counter_keterangan);
 $("#increment_keterangan").append(increment_keterangan);

 $("#hidden_input").append(jenis_harta_to_append);
 $("#hidden_input").append(pemilik_harta_to_append);
 $("#hidden_input").append(hubungan_pemilik_pelupusan_to_append);
 $("#hidden_input").append(no_pendaftaran_to_append);
 $("#hidden_input").append(tarikh_pemilikan_to_append);
 $("#hidden_input").append(tarikh_pelupusan_to_append);
 $("#hidden_input").append(cara_pelupusan_to_append);
 $("#hidden_input").append(nilai_pelupusan_to_append);
 $("#hidden_input").append(id_harta_to_append);


 //reset form
 $("#pemilik_harta_pelupusan").val("")
 $("#jenis_harta_lupus").prop('selectedIndex', 0);
 $("#hubungan_pemilik_pelupusan").prop('selectedIndex', 0);
 $("#cara_pelupusan").prop('selectedIndex', 0);
 $("#no_pendaftaran_harta").val("")
 $("#tarikh_pemilikan").val("")
 $("#tarikh_pelupusan").val("")
 $("#nilai_pelupusan").val("")
 $("#id_harta").val("")


 document.getElementById("jenis_harta_lupus").value = "";
 document.getElementById("pemilik_harta_pelupusan").value = "";
 document.getElementById("hubungan_pemilik_pelupusan").value = "";
 document.getElementById("no_pendaftaran_harta").value = "";
 document.getElementById("tarikh_pemilikan").value = "";
 document.getElementById("tarikh_pelupusan").value = "";
 document.getElementById("nilai_pelupusan").value = "";
  document.getElementById("id_harta").value = "";

}

function removeData(e,counter){
//remove table row
$(e).parents('tr').remove();

//remove input text in form
$('#jenis_harta_lupus'+counter+'').remove();
$('#pemilik_harta_pelupusan'+counter+'').remove();
$('#hubungan_pemilik_pelupusan'+counter+'').remove();
$('#no_pendaftaran_harta'+counter+'').remove();
$('#tarikh_pemilikan'+counter+'').remove();
$('#tarikh_pelupusan'+counter+'').remove();
$('#nilai_pelupusan'+counter+'').remove();
$('#id_harta'+counter+'').remove();

//fetch data from jumlah data input
var counter_keterangan = document.getElementById("counter_keterangan").value;
counter_keterangan--;

//update data into jumlah data input
document.getElementById("counter_keterangan").value = counter_keterangan;
}
</script>



<script type="text/javascript">
        function submitForm() {
          $('#submit-form').html('<i class="fa fa-spinner fa-spin"></i>');
          $('#submit-form').attr('disabled', 'disabled');
      }
      // $(document).on('submit', '#formbpost', function() {
      //     $('#submit-form').html('<i class="fa fa-spinner fa-spin"></i>');
      //     $('#submit-form').attr('disabled', 'disabled');
      // });

</script>

<script type="text/javascript">
$('#jenis_harta_lupus').change(function(){

  //fetch data from jenis_dokumen
  var jenis_harta_lupus = $(this).val();

  //clear jenis_data selection
  // $("#pemilik_harta_pelupusan").empty();
  // $("#hubungan_pemilik_pelupusan_").empty();
  // $("#no_pendaftaran_harta").empty();
  // $("#tarikh_pemilikan").empty();

  //clear input field
  $("#pemilik_harta_pelupusan").val('');
  $("#hubungan_pemilik_pelupusan").val('');
  $("#no_pendaftaran_harta").val('');
  $("#tarikh_pemilikan").val('');

  //initialize selection
  // $("#pemilik_harta_pelupusan").append('<input class="form-control bg-light" id="pemilik_harta_pelupusan" type="text" >');
  // $("#hubungan_pemilik_pelupusan_").append('<option value="" selected disabled hidden>Pilih Daerah</option>');
  // $("#no_pendaftaran_harta").append('<input class="form-control bg-light" id="no_pendaftaran_harta" type="text">');
  // $("#tarikh_pemilikan").append('<input class="form-control bg-light" id="tarikh_pemilikan" type="text">');

  //ajax
  if(jenis_harta_lupus){
    $.ajax({
      type:"get",
       url:"/Lampiran-C/ajax/get-harta/"+jenis_harta_lupus,
      success: function(respond){
        console.log(respond);
        var data = JSON.parse(respond);
        data.forEach(function(data)
        {
          console.log(data.cara_pelupusan);
          $('#pemilik_harta_pelupusan').val($('#pemilik_harta_pelupusan').val() + data.pemilik_harta);
          $('#hubungan_pemilik_pelupusan').val($('#hubungan_pemilik_pelupusan').val() + data.hubungan_pemilik);
          $('#no_pendaftaran_harta').val($('#no_pendaftaran_harta').val() + data.maklumat_harta);
          $('#tarikh_pemilikan').val($('#tarikh_pemilikan').val() + data.tarikh_pemilikan_harta);
          $('#tarikh_pelupusan').val($('#tarikh_pelupusan').val() + data.tarikh_pelupusan);
          // $('#cara_pelupusan').val($('#cara_pelupusan').val() + data.cara_pelupusan);
          $('#nilai_pelupusan').val($('#nilai_pelupusan').val() + data.nilai_pelupusan);
          $('#id_harta').val($('#id_harta').val() + data.id);

        });
            // $.each(JSON.parse(respond),function(key,value){
            //     $("#jenis_data").append('<option value="'+value+'">'+value+'</option>');
            // });
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log("Status: " + textStatus);
          console.log("Error: " + errorThrown);
      }
    })
  }
});
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
 document.getElementById("tarikh_pelupusan").setAttribute("max", today);

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
 document.getElementById("tarikh_pemilikan").setAttribute("max", today);

</script>
<script>
function onlyNumberKey(evt, element) {
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
@endsection
