
           <!--Page Body part -->
           <table>
             <tr>
               <td colspan="4"><font style="color:red;">Rahsia</td>
               <td><h5>LAMPIRAN 'B'<br> Borang SKMM(R)1/02</h5></td>
             </tr>
             <tr>
               <td><img src="{{asset('qbadminui/img/MCMC.png')}}" height="20%" width="20%"></td>
             </tr>
               <tr>
                   <td align="center" colspan="5"><b>BORANG PERISYTIHARAN HARTA</b></td>
               </tr>
               <tr>
                 <td colspan="4"><h5>1.KETERANGAN MENGENAI PEGAWAI</h5></td>
               </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td colspan="4">
                        {{$listHarta->nama_pegawai }}
                    </td>
                </tr>
                <tr>
                    <td>
                        No. Kad Pengenalan
                    </td colspan="4">
                    <td>
                        {{$listHarta->kad_pengenalan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Jawatan / Gred
                    </td>
                    <td colspan="4">
                        {{$listHarta ->jawatan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Jabatan
                    </td>
                    <td colspan="4">
                        {{$listHarta ->jabatan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat Tempat Bertugas
                    </td>
                    <td colspan="4">
                        {{$listHarta ->alamat_tempat_bertugas }}
                    </td>
                </tr>
                @if($maklumat_pasangan->isEmpty())
                @else
                @foreach($maklumat_pasangan as $maklumat_pasangan)
                <tr>
                  <td colspan="4">
                    <h5>2.KETERANGAN MENGENAI KELUARGA</h5>
                  </td>
                </tr>
                <tr>
                    <td>
                        Nama Suami / Isteri
                    </td>
                    <td colspan="4">
                        {{$maklumat_pasangan->NOKNAME}}
                    </td>
                </tr>
                <tr>
                    <td>
                      No.Kad Pengenalan Suami/Isteri
                    </td>
                    <td colspan="4">
                      {{$maklumat_pasangan->ICNEW}}
                    </td>
                </tr>
                <tr>
                    <td>
                      Pekerjaan Suami/Isteri
                    </td>
                    <td colspan="4">
                    {{ $listHarta->pekerjaan_pasangan }}
                    </td>
                </tr>
                @endforeach
                @endif

                @if($maklumat_anak->isEmpty())
                @else

                @foreach($maklumat_anak as $maklumat_anak)
                <tr>
                    <td>
                      Nama Anak
                    </td>
                    <td colspan="4">
                      {{$maklumat_anak->NOKNAME}}
                    </td>
                </tr>
                <tr>
                    <td>
                      Umur Anak/Tanggungan
                    </td>
                    <td colspan="4">
                      <?php
                        $ic = $maklumat_anak->ICNEW;
                        if($ic != ""){
                            $year = substr($ic, 0, 2);
                            $curYear = Date('Y');
                            $cutoff = Date('Y') - 2000;
                        }
                        if($year > $cutoff)
                        {
                          $above = $curYear - ($year + 1900);
                          echo $above;
                        }
                        else{
                          $above = $curYear - ($year + 2000);
                          echo $above;
                        }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td>
                      No.Kad Pengenalan Anak/Tanggungan
                    </td>
                    <td colspan="4">
                      {{$maklumat_anak->ICNEW}}
                    </td>
                </tr>
            @endforeach
            @endif
                <tr>
                  <td colspan="4">
                    <h5>3. PENDAPATAN BULANAN</h5>
                  </td>
                </tr>
                  <!-- Gaji -->
                  <tr align="center">
                    <td></td>
                    <td colspan="2" align="center"> PEGAWAI</td>
                    <td colspan="2" align="center"> PASANGAN</td>
                  </tr>
                  <tr>
                    <td>1) Gaji</td>
                    <td colspan="2" align="center">{{$listHarta ->gaji }}</td>
                    <td colspan="2" align="center">{{ $listHarta ->gaji_pasangan }}</td>
                  </tr>
                <!-- imbuhan -->
                  <tr>
                    <td>ii) Jumlah Semua Imbuhan Tetap atau Elaun</td>
                    <td colspan="2" align="center">{{ $listHarta ->jumlah_imbuhan }}</td>
                    <td colspan="2" align="center">{{ $listHarta ->jumlah_imbuhan_pasangan }}</td>
                  </tr>
                <!-- sewa -->
                  <tr>
                    <td>iii) Sewa Rumah/Kedai</td>
                    <td colspan="2" align="center">{{ $listHarta ->sewa }}</td>
                    <td colspan="2" align="center">{{ $listHarta ->sewa_pasangan }}</td>
                  </tr>
                <!-- dividen -->
                  <tr>
                    <td>iv) Dividen</td>
                  </tr>
                  @foreach($listDividenB as $data)
                  <tr>
                    <td>{{ $data ->dividen_1 }}</td>
                    <td colspan="2" align="center">{{ $data ->dividen_1_pegawai }}</td>
                    <td colspan="2" align="center">{{ $data ->dividen_1_pasangan }}</td>
                  </tr>
                  @endforeach

                  <!-- Tanggungan -->
                  <tr>
                    <td colspan="4"><h5>4. TANGGUNGAN / ANSURAN BULANAN ATAS HUTANG / PINJAMAN</h5></td>
                  </tr>
                  <tr align="center">
                    <td></td>
                    <td colspan="2" align="center">PEGAWAI</td>
                    <td colspan="2" align="center">PASANGAN</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Jumlah Pinjaman / Tanggungan (RM)</td>
                    <td>Jumlah Bayaran Bulanan (RM)</td>
                    <td>Jumlah Pinjaman / Tanggungan (RM)</td>
                    <td>Jumlah Bayaran Bulanan (RM)</td>
                  </tr>
                  <tr>
                    <td>i) Jumlah Pinjaman Perumahan</td>
                    <td align="center">{{ $listHarta ->pinjaman_perumahan_pegawai }}</td>
                    <td align="center">{{ $listHarta ->bulanan_perumahan_pegawai }}</td>
                    <td align="center">{{ $listHarta ->pinjaman_perumahan_pasangan }}</td>
                    <td align="center">{{ $listHarta ->bulanan_perumahan_pasangan }}</td>
                  </tr>
                  <tr>
                    <td>ii) Jumlah Pinjaman Kenderaan</td>
                    <td align="center">{{ $listHarta ->pinjaman_kenderaan_pegawai }}</td>
                    <td align="center">{{ $listHarta ->bulanan_kenderaan_pegawai }}</td>
                    <td align="center">{{ $listHarta ->pinjaman_kenderaan_pasangan }}</td>
                    <td align="center">{{ $listHarta ->bulanan_kenderaan_pasangan }}</td>
                  </tr>
                  <tr>
                    <td>iii) Cukai Pendapatan</td>
                    <td align="center">{{ $listHarta ->jumlah_cukai_pegawai }}</td>
                    <td align="center">{{ $listHarta ->bulanan_cukai_pegawai }}</td>
                    <td align="center">{{ $listHarta ->jumlah_cukai_pasangan }}</td>
                    <td align="center">{{ $listHarta ->bulanan_cukai_pasangan }}</td>
                  </tr>
                  <tr>
                    <td>iv) Pinjaman Koperasi</td>
                    <td align="center">{{ $listHarta ->jumlah_koperasi_pegawai }}</td>
                    <td align="center">{{ $listHarta ->bulanan_koperasi_pegawai }}</td>
                    <td align="center">{{ $listHarta ->jumlah_koperasi_pasangan }}</td>
                    <td align="center">{{ $listHarta ->bulanan_koperasi_pasangan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">v) Lain-Lain Pinjaman</td>
                  </tr>

                  @foreach($listPinjamanB as $datas)
                  <tr>
                    <td>{{ $datas ->lain_lain_pinjaman }}</td>
                    <td align="center">{{ $datas ->pinjaman_pegawai }}</td>
                    <td align="center">{{ $datas ->bulanan_pegawai }}</td>
                    <td align="center">{{ $datas ->pinjaman_pasangan }}</td>
                    <td align="center">{{ $datas ->bulanan_pasangan }}</td>
                  </tr>
                  @endforeach



                  <!-- Harta -->
                  <tr>
                    <td colspan="2"><b><h5>5. KETERANGAN MENGENAI HARTA</h5></b></td>
                  </tr>
                  <tr>

                    <!-- <table border="1"> -->
                      <th>Jenis Harta</th>
                      <th>Pemilik Harta</th>
                      <th>Hubungan Dengan Pegawai</th>
                      <th>Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</th>
                      <th>Tarikh Pemilikan Harta</th>
                      <th>Bilangan / Ekar / kaki Persegi / Unit</th>
                      <th>Nilai Perolehan</th>
                      <th>Cara Perolehan</th>

                      @foreach($hartaB as $data)
                      <tr>
                        <td>{{ $data ->jenis_harta }}</td>
                        <td>{{ $data ->pemilik_harta }}</td>
                        <td>{{ $data ->hubungan_pemilik }}</td>
                        <td>{{ $data ->maklumat_harta }}</td>
                        <td>{{ $data ->tarikh_pemilikan_harta }}</td>
                        <td> {{ $data ->bilangan }} {{ $data ->unit_bilangan }}</td>
                        <td>{{ $data ->nilai_perolehan }}</td>
                        <td>{{ $data ->cara_perolehan }}</td>
                      </tr>
                      @endforeach
                    <!-- </table> -->
                    <tr>
                      <td colspan="4"><b><h5>6. PUNCA PUNCA KEWANGAN BAGI MEMILIKI HARTA DAN JUMLAHNYA</h5></b></td>
                    </tr>

                  @foreach($hartaB as $data)
                    @if($data->cara_perolehan == "Dipusakai"||$data->cara_perolehan == "Dihadiahkan")
                    <tr>
                      <td colspan="2">Dari Siapa Harta Diperolehi</td>
                      <td colspan="3">{{$data ->nama_pemilikan_asal}}</td>
                    </tr>
                    @elseif($data->cara_perolehan == "Lain-lain")
                    <tr>
                      <td colspan="2">Nyatakan,</td>
                      <td colspan="3">{{ $data ->lain_lain }}</td>
                    </tr>
                    @elseif($data->cara_perolehan == "Dibeli")
                      @if($data->cara_belian == "Pinjaman")

                        <tr>
                          <td colspan="2">i) Jumlah Pinjaman</td>
                          <td colspan="3">{{ $data ->jumlah_pinjaman }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">ii)	Institusi memberi pinjaman</td>
                          <td colspan="3">{{ $data ->institusi_pinjaman }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">iii)	Tempoh bayaran balik</td>
                          <td colspan="3">{{ $data ->tempoh_bayar_balik }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">iv) Ansuran bulanan</td>
                          <td colspan="3">{{ $data ->ansuran_bulanan }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">v)	Tarikh ansuran pertama</td>
                          <td colspan="3">{{ $data ->tarikh_ansuran_pertama }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">vi)	Keterangan Lain</td>
                          <td colspan="3">{{ $data ->keterangan_lain }}</td>
                        </tr>
                        @elseif($data->cara_belian == "Pelupusan")
                          <tr>
                            <td colspan="2">i)	Jenis Harta</td>
                            <td colspan="3">{{ $data ->jenis_harta_pelupusan }}</td>
                          </tr>
                          <tr>
                            <td colspan="2">ii) Alamat</td>
                            <td colspan="3">  {{ $data ->alamat_asset }}</td>
                          </tr>
                          <tr>
                            <td colspan="2">iii) No Pendaftaran Harta</td>
                            <td colspan="3">{{ $data ->no_pendaftaran }}</td>
                          </tr>
                          <tr>
                            <td colspan="2">iv) Harga Jualan</td>
                            <td colspan="3">{{ $data ->harga_jualan }}</td>
                          </tr>
                          <tr>
                            <td colspan="2">v)	Tarikh lupus</td>
                            <td colspan="3">{{ $data ->tarikh_lupus }}</td>
                          </tr>
                          @else
                          <tr>
                            <td colspan="2">i)	Nilai Belian Harta</td>
                            <td colspan="3">{{ $data ->tunai }}</td>
                          </tr>
                      @endif
                    @endif
                    <tr>
                      <td><br></td>
                    </tr>
                  @endforeach
                </table>
