<!--Page Body part -->
<table>
  <tr>
    <td><font style="color:red;">Rahsia</td>
    <td><h5>LAMPIRAN 'C'<br> Borang SKMM(R)2/02</h5></td>
  </tr>
  <tr>
    <td><img src="https://pbs.twimg.com/profile_images/1306147240814063621/DpSqT1KA_400x400.jpg" height="20%" width="20%"></td>
  </tr>
    <tr>
        <td align="center" colspan="4"><b>BORANG PELUPUSAN HARTA</b></td>
    </tr>
    <tr>
      <td colspan="3"><h5><b>1.KETERANGAN MENGENAI PEGAWAI</b></h5></td>
    </tr>
    <tr>
        <td>
            Nama
        </td>
        <td>
            {{$listHarta ->formcs->name }}
        </td>
    </tr>
    <tr>
        <td>
            No. Kad Pengenalan
        </td>
        <td>
            {{$listHarta ->formcs->kad_pengenalan }}
        </td>
    </tr>
    <tr>
        <td>
            Jawatan / Gred
        </td>
        <td>
            {{$listHarta ->formcs->jawatan }}
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
            {{$listHarta ->formcs->alamat_tempat_bertugas }}
        </td>
    </tr>
    <tr>
        <td colspan="3"><h5><b>2.KETERANGAN MENGENAI PELUPUSAN HARTA</b></h5></td>
    </tr>
    <tr>
        <td>i) Jenis Harta</td>
        <td>{{ $listHarta ->jenis_harta_lupus }}</td>
    </tr>
    <tr>
        <td>ii) Pemilik Harta</td>
        <td>{{ $listHarta ->pemilik_harta_pelupusan }}</td>
    </tr>
    <tr>
        <td>iii) Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</td>
        <td>{{ $listHarta ->hubungan_pemilik_pelupusan }}</td>
    </tr>
    <tr>
        <td>iv) Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</td>
        <td>{{ $listHarta ->no_pendaftaran_harta }}</td>
    </tr>
    <tr>
        <td>v) Tarikh Pemilikan Harta</td>
        <td>{{ $listHarta ->tarikh_pemilikan }}</td>
    </tr>
    <tr>
        <td>vi) Tarikh Pelupusan Harta</td>
        <td>{{ $listHarta ->tarikh_pelupusan }}</td>
    </tr>
    <tr>
        <td>vii) Cara Pelupusan</td>
        <td>{{ $listHarta ->cara_pelupusan }}</td>
    </tr>
    <tr>
        <td>viii) Jika dijual, Nyatakan nilai jualan</td>
        <td>{{ $listHarta ->nilai_pelupusan }}</td>
    </tr>
</table>
