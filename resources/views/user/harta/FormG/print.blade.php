<table>
  <tr>
    <td colspan="4"><font style="color:red;">Rahsia</td>
    <td><h5>LAMPIRAN 'G'</h5></td>
  </tr>
  <tr>
    <td><img src="https://pbs.twimg.com/profile_images/1306147240814063621/DpSqT1KA_400x400.jpg" height="20%" width="20%"></td>
  </tr>
    <tr>
        <td align="center" colspan="5"><b>PERMOHONAN BAGI MENDAPATKAN KEBENARAN UNTUK MEMOHON DAN MEMILIKI SAHAM</b></td>
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
            {{$listHarta ->formgs->nama_pasangan }}
        </td>
    </tr>
    <tr>
        <td>
          No.Kad Pengenalan Suami/Isteri
        </td>
        <td>
          {{$listHarta ->formgs->kad_pengenalan_pasangan }}
        </td>
    </tr>
    <tr>
        <td>
          Pekerjaan Suami/Isteri
        </td>
        <td>
          {{$listHarta ->formgs->pekerjaan_pasangan }}
        </td>
    </tr>
    <tr>
        <td>
          Nama Anak
        </td>
        <td>
          {{$listHarta ->formgs->nama_anak }}
        </td>
    </tr>
    <tr>
        <td>
          Umur Anak/Tanggungan
        </td>
        <td>
          {{$listHarta ->formgs->umur_anak }}
        </td>
    </tr>
    <tr>
        <td>
          No.Kad Pengenalan Anak/Tanggungan
        </td>
        <td>
          {{$listHarta ->formgs->no_kad_pengenalan_anak }}
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
        <td colspan="2" align="center">{{$listHarta ->formgs->gaji }}</td>
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
      @foreach($listDividenG as $data)
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

      @foreach($listPinjamanG as $datas)
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

      <tr>
        <td colspan="2"><b><h5>5. BUTIR-BUTIR TANAH YANG TELAH DIBERIMILIK OLEH KERAJAAN DI MANA MANA TEMPAT DI MALAYSIA</h5></b></td>
      </tr>
      <tr>
        <td colspan="2"><b>i) Tanah Pertanian</td>
      </tr>
      <tr>
        <td>Luas</td>
        <td>{{ $listHarta ->luas_pertanian }}</td>
      </tr>
      <tr>
        <td>No.Lot</td>
        <td>{{ $listHarta ->lot_pertanian }}</td>
      </tr>
      <tr>
        <td>Mukim</td>
        <td>{{ $listHarta ->mukim_pertanian }}</td>
      </tr>
      <tr>
        <td>Negeri</td>
        <td>{{ $listHarta ->negeri_pertanian }}</td>
      </tr>
      <tr>
        <td colspan="2"><b>i) Tanah Perumahan</b></td>
      </tr>
      <tr>
        <td>Luas</td>
        <td>{{ $listHarta ->luas_perumahan }}</td>
      </tr>
      <tr>
        <td>No.Lot</td>
        <td>{{ $listHarta ->lot_perumahan }}</td>
      </tr>
      <tr>
        <td>Mukim</td>
        <td>{{ $listHarta ->mukim_perumahan }}</td>
      </tr>
      <tr>
        <td>Negeri</td>
        <td>{{ $listHarta ->negeri_perumahan }}</td>
      </tr>
      <tr>
        <td>Tarikh Diperolehi</td>
        <td>{{ $listHarta ->tarikh_diperolehi }}</td>
      </tr>

      <tr>
        <td colspan="2"><b><h5>6. BUTIR-BUTIR TANAH ATAU SAHAM YANG DIPOHON</h5></b></td>
      </tr>
      <tr>
        <td colspan="2"><b>i) Butir- butir lengkap mengenai tanah Kerajaan yang hendak dipohon dan dimiliki:</td>
      </tr>
      <tr>
        <td>Luas</td>
        <td>{{ $listHarta ->luas }}</td>
      </tr>
      <tr>
        <td>No.Lot</td>
        <td>{{ $listHarta ->lot }}</td>
      </tr>
      <tr>
        <td>Mukim</td>
        <td>{{ $listHarta ->mukim }}</td>
      </tr>
      <tr>
        <td>Negeri</td>
        <td>{{ $listHarta ->negeri}}</td>
      </tr>
      <tr>
          <td>Jenis Tanah</td>
          <td>{{ $listHarta ->jenis_tanah }}</td>
        </tr>
      <tr>
        <td colspan="2"><b>ii) Butir- butir saham yang dipohon</td>
      </tr>
      <tr>
        <td>Nama Syarikat</td>
        <td>{{ $listHarta ->nama_syarikat }}</td>
      </tr>
      <tr>
          <td>Modal Berbayar (Paid Up Capital)</td>
          <td>{{ $listHarta ->modal_berbayar }}</td>
        </tr>
      <tr>
          <td>Jumlah Unit Nilai Saham Sumber Kewangan</td>
          <td>{{ $listHarta ->jumlah_unit_saham }}</td>
        </tr>
        <tr>
            <td>Nilai Saham</td>
            <td>{{ $listHarta ->nilai_saham }}</td>
          </tr>
        <tr>
            <td>Sumber Kewangan</td>
            <td>{{ $listHarta ->sumber_kewangan }}</td>
          </tr>
          <tr>
            <td colspan="2"><b>iii) Jika melibatkan pinjaman, Nyatakan: </td>
          </tr>
          <tr>
            <td><b>Nama Institusi </b></td>
            <td><b>Alamat Institusi </b></td>
            <td><b>Ansuran Bulanan</b></td>
            <td><b>Tarikh Ansuran Pertama</b></td>
            <td><b>Tempoh Pinjaman</b></td>
          </tr>
          @foreach($listPinjaman as $data1)
          <tr>
            <td>{{ $data1 ->institusi }}</td>
            <td>{{ $data1 ->alamat_institusi }}</td>
            <td>{{ $data1 ->ansuran_bulanan }}</td>
            <td>{{ $data1 ->tarikh_ansuran }}</td>
            <td>{{ $data1 ->tempoh_pinjaman }}</td>
          </tr>
          @endforeach
</table>
