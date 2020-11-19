
           <!--Page Body part -->
           <table>
             <tr>
               <td colspan="4"><font style="color:red;">Rahsia</td>
               <td><h5>LAMPIRAN 'B'<br> Borang SKMM(R)1/02</h5></td>
             </tr>
             <tr>
               <td><img src="https://pbs.twimg.com/profile_images/1306147240814063621/DpSqT1KA_400x400.jpg" height="20%" width="20%"></td>
             </tr>
               <tr>
                   <td align="center" colspan="5"><b>BORANG PERISYTHARAN HARTA</b></td>
               </tr>
               <tr>
                 <td colspan="4"><h5>1.KETERANGAN MENGENAI PEGAWAI</h5></td>
               </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        {{$listHarta ->formbs->name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        No. Kad Pengenalan
                    </td>
                    <td>
                        {{$listHarta ->formbs->kad_pengenalan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Jawatan / Gred
                    </td>
                    <td>
                        {{$listHarta ->formbs->jawatan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Jabatan
                    </td>
                    <td>
                        {{$listHarta ->jabatan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat Tempat Bertugas
                    </td>
                    <td>
                        {{$listHarta ->formbs->alamat_tempat_bertugas }}
                    </td>
                </tr>
                <tr>
                  <td colspan="4">
                    <h5>2.KETERANGAN MENGENAI KELUARGA</h5>
                  </td>
                </tr>
                <tr>
                    <td>
                        Nama Suami / Isteri
                    </td>
                    <td>
                        {{$listHarta ->formbs->nama_pasangan }}
                    </td>
                </tr>
                <tr>
                    <td>
                      No.Kad Pengenalan Suami/Isteri
                    </td>
                    <td>
                      {{$listHarta ->formbs->kad_pengenalan_pasangan }}
                    </td>
                </tr>
                <tr>
                    <td>
                      Pekerjaan Suami/Isteri
                    </td>
                    <td>
                      {{$listHarta ->formbs->pekerjaan_pasangan }}
                    </td>
                </tr>
                <tr>
                    <td>
                      Nama Anak
                    </td>
                    <td>
                      {{$listHarta ->formbs->nama_anak }}
                    </td>
                </tr>
                <tr>
                    <td>
                      Umur Anak/Tanggungan
                    </td>
                    <td>
                      {{$listHarta ->formbs->umur_anak }}
                    </td>
                </tr>
                <tr>
                    <td>
                      No.Kad Pengenalan Anak/Tanggungan
                    </td>
                    <td>
                      {{$listHarta ->formbs->no_kad_pengenalan_anak }}
                    </td>
                </tr>
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
                    <td colspan="2" align="center">{{$listHarta ->formbs->gaji }}</td>
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

                  <!-- jumlah pendapatan -->
                  <tr>
                    <td><b><h5>JUMLAH</h5></b></td>
                    <td colspan="2" align="center"><b>{{ $listHarta ->pendapatan_pegawai }}</b></td>
                    <td colspan="2" align="center"><b>{{ $listHarta ->pendapatan_pasangan }}</b></td>
                  </tr>

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
                  <tr>
                    <td><b><h5>JUMLAH</h5></b></td>
                    <td align="center"><b>{{ $listHarta ->jumlah_pinjaman_pegawai }}</b></td>
                    <td align="center"><b>{{ $listHarta ->jumlah_bulanan_pegawai }}</b></td>
                    <td align="center"><b>{{ $listHarta ->jumlah_pinjaman_pasangan }}</b></td>
                    <td align="center"><b>{{ $listHarta ->jumlah_bulanan_pasangan }}</b></td>
                  </tr>


                  <!-- Harta -->
                  <tr>
                    <td colspan="2"><b><h5>5. KETERANGAN MENGENAI HARTA</h5></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Jenis Harta</td>
                    <td>{{ $listHarta ->jenis_harta }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Pemilik Harta</td>
                    <td>
                      @if('{{ $listHarta ->tarikh_lupus }}' == !null)
                      {{ $listHarta ->pemilik_harta }}
                      @else
                      Tiada
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</td>
                    <td>{{ $listHarta ->hubungan_pemilik }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</td>
                    <td>{{ $listHarta ->maklumat_harta }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Tarikh Pemilikan Harta</td>
                    <td>{{ $listHarta ->tarikh_pemilikan_harta }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Bilangan / Ekar / kaki Persegi / Unit (jika rumah, nyatakan keluasan tanah tapak rumah itu)</td>
                    <td>{{ $listHarta ->bilangan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Nilai Perolehan Harta (RM)</td>
                    <td>{{ $listHarta ->nilai_perolehan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Cara Harta Diperolehi, (dipusakai, dibeli, dihadiahkan dan sebagainya)</td>
                    <td>{{ $listHarta ->cara_perolehan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Dari Siapa Harta Diperolehi</td>
                    <td>{{ $listHarta ->nama_pemilikan_asal }}</td>
                  </tr>
                  <tr>
                    <td colspan="2"><b><h5>PUNCA-PUNCA KEWANGAN BAGI MEMILIKI HARTA DAN JUMLAHNYA</h5></b></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b><h5>a)	Jika Pinjaman, Nyatakan</h5></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">i) Jumlah Pinjaman</td>
                    <td>{{ $listHarta ->jumlah_pinjaman }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">ii)	Institusi memberi pinjaman</td>
                    <td>{{ $listHarta ->institusi_pinjaman }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">iii)	Tempoh bayaran balik</td>
                    <td>{{ $listHarta ->tempoh_bayar_balik }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">iv) Ansuran bulanan</td>
                    <td>{{ $listHarta ->ansuran_bulanan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">v)	Tarikh ansuran pertama</td>
                    <td>{{ $listHarta ->tarikh_ansuran_pertama }}</td>
                  </tr>
                  <tr>
                    <td colspan="4"><b><h5>b) Hasil Pelupusan Harta, Nyatakan</h5></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">i)	Jenis Harta</td>
                    <td>{{ $listHarta ->jenis_harta_pelupusan }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">ii) Alamat</td>
                    <td>  {{ $listHarta ->alamat_asset }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">iii) No Pendaftaran Harta</td>
                    <td>{{ $listHarta ->no_pendaftaran }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">iv) Harga Jualan</td>
                    <td>
                    @if('{{ $listHarta ->tarikh_lupus }}' == !null)
                    {{ $listHarta ->harga_jualan }}
                    @else
                    <p>Tiada</p>
                    @endif
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">v)	Tarikh lupus</td>
                    <td>
                      @if('{{ $listHarta ->tarikh_lupus }}' == NULL)
                      <p>Tiada</p>
                      @else
                      {{ $listHarta ->tarikh_lupus }}
                      @endif
                    </td>
                  </tr>
                </table>
