@extends('user.layouts.appPrint')
           <!--Page Body part -->
           <table>
           <tr>
             <td width="580px"><font style="color:red;">Rahsia</td>
             <td><h5>LAMPIRAN 'A'</h5></td>
           </tr>
           <tr>
             <td align="center" colspan="2">

                <img src="D:\MCMC-Gift-Asset-System\public\storage\uploads\gambar_hadiah\MCMC.png" height="20%" width="20%"></td>
           </tr>
         </table>
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p class="font-weight-normal"><b>Borang A: PERMOHONAN BAGI MENDAPATKAN KEBENARAN PENERIMAAN HADIAH DI BAWAH PERATURAN 10, PERATURAN-PERATURAN TATATERTIB SKMM 2007 DAN SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN
                                                BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI LEBIH DARIPADA RM {{ $nilaiHadiah ->nilai_hadiah }}</b></p>
               </div>


                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                <table>
                                  <tr>
                                      <td><p>Nama</p></td>
                                      <td>{{$info->nama_pegawai }}</td>
                                  </tr>
                                  <tr>
                                      <td><p>No. Kad Pengenalan</p></td>
                                      <td>{{$info->no_kad_pengenalan }}</td>
                                  </tr>
                                  <tr>
                                      <td><p>Jawatan / Gred</p></td>
                                      <td>{{$info->jawatan }}</tr>
                                  </tr>
                                  <tr>
                                      <td>Jabatan/ Bahagian</td>
                                      <td>{{ $info->jabatan}}</td>
                                  </tr>
                                  <tr>
                                      <td><p><b>2. KETERANGAN MENGENAI HADIAH</b></p></td>
                                  </tr>
                                  <tr>
                                      <td><p>i) Jenis</p></td>
                                      <td>{{$info->jenis_gift}}</td>
                                  </tr>
                                  <tr>
                                      <td><p>ii) Nilai/ Anggaran Nilai</p></td>
                                      <td>{{ $info->nilai_gift  }}</td>
                                  </tr>
                                  <tr>
                                      <td><p>iii) Tarikh diterima</p></td>
                                      <td>{{ $info->tarikh_diterima}}</td>
                                  </tr>
                                  <tr>
                                    <td><p>iv) Nama Pemberi</p></td>
                                    <td>{{ $info->nama_pemberi  }}</td>
                                  </tr>
                                  <tr>
                                    <td><p>v) Alamat Pemberi</p></td>
                                    <td>{{ $info->alamat_pemberi  }}</td>
                                 </tr>
                                 <tr>
                                   <td><p>vi) Hubungan Pemberi</p></td>
                                   <td>{{ $info->hubungan_pemberi  }}</td>
                                </tr>
                                 <tr>
                                    <td><p>vii)Sebab Diberi</p></td>
                                    <td>{{ $info->sebab_gift  }}</td>
                                </tr>
                              <!--upload gambar hadiah-->
                              <tr>
                                 <td><p><b>3. LAMPIRAN HADIAH YANG DITERIMA</b></p></td>
                              </tr>
                              <tr>
                                 <td align="center" colspan="2">
                                   <?php $image_path = str_replace('public', 'storage',  $info->gambar_gift); ?>
                                    <img src="{{ $image_path }}" style="width:70%;">
                                </td>
                             </tr>
                          </table>
