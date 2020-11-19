
           <!--Page Body part -->
           <table>
           <tr>
             <td width="580px"><font style="color:red;">Rahsia</td>
             <td><h5>LAMPIRAN 'B'</h5></td>
           </tr>
           <tr>
             <td align="center" colspan="2"><img src="https://pbs.twimg.com/profile_images/1306147240814063621/DpSqT1KA_400x400.jpg" height="20%" width="20%"></td>
           </tr>
         </table>
           <div class="page-body p-4 text-dark">
               <div class="page-heading border-bottom d-flex flex-row">
                   <p align="center"><b>Lampiran B: LAPORAN PENERIMAAN HADIAH DIBAWAH SURAT PEKELILING PERKHIDMATAN DAN SOKONGAN BILANGAN 2 TAHUN 2015 BAGI HADIAH-HADIAH YANG BERNILAI RM {{ $nilaiHadiah ->nilai_hadiah }} DAN KE BAWAH</b></p><br>
                   <br>
               </div>


                                <p><b>1.KETERANGAN MENGENAI PEGAWAI</b></p>
                                <table>
                                  <tr>
                                      <td><p>Nama</p></td>
                                      <td>{{$info->users->name }}</td>
                                  </tr>
                                  <tr>
                                      <td><p>No. Kad Pengenalan</p></td>
                                      <td>{{$info->users->kad_pengenalan }}</td>
                                  </tr>
                                  <tr>
                                      <td><p>Jawatan / Gred</p></td>
                                      <td>{{$info->users->jawatan }}</tr>
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
                                   <td><p>v) Hubungan Pemberi</p></td>
                                   <td>{{ $info->hubungan_pemberi  }}</td>
                                </tr>
                                 <tr>
                                    <td><p>vi)Sebab Diberi</p></td>
                                    <td>{{ $info->sebab_gift  }}</td>
                                </tr>
                              <!--upload gambar hadiah-->
                              <tr>
                                 <td><p><b>3. GAMBAR HADIAH YANG DITERIMA</b></p></td>
                              </tr>
                              <tr>
                                 <td align="center">
                                   <div class="img-responsive" alt="Gambar Hadiah" align="center">
                                     <img src="{{ asset( $image_path = str_replace('public', 'storage',  $info->gambar_gift)) }}"  width="70%" height="70%">
                                  </div>
                                </td>
                             </tr>
                          </table>
