
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
            {{$listHarta ->nama_pegawai }}
        </td>
    </tr>
    <tr>
        <td>
            No. Kad Pengenalan
        </td>
        <td>
            {{$listHarta ->kad_pengenalan }}
        </td>
    </tr>
    <tr>
        <td>
            Jawatan / Gred
        </td>
        <td>
            {{$listHarta ->jawatan }}
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
            {{$listHarta ->alamat_tempat_bertugas }}
        </td>
    </tr>
    <tr>
        <td colspan="3"><h5><b>2.KETERANGAN MENGENAI PELUPUSAN HARTA</b></h5></td>
    </tr>
    @foreach($hartaB as $data)
    @if($data->formcs_id)
    <tr>
        <td>i) Jenis Harta</td>
        <td>{{ $data ->jenis_harta }}</td>
    </tr>
    <tr>
        <td>ii) Pemilik Harta</td>
        <td>{{ $data ->pemilik_harta }}</td>
    </tr>
    <tr>
        <td>iii) Hubungan Dengan Pegawai (sendiri, suami atau isteri, anak dan sebagainya</td>
        <td>{{ $data ->hubungan_pemilik}}</td>
    </tr>
    <tr>
        <td>iv) Alamat Harta / No. Pendaftaran / No. Sijil Dan Sebagainya</td>
        <td>{{ $data ->maklumat_harta }}</td>
    </tr>
    <tr>
        <td>v) Tarikh Pemilikan Harta</td>
        <td>{{ $data ->tarikh_pemilikan_hartas}}</td>
    </tr>
    <tr>
        <td>vi) Tarikh Pelupusan Harta</td>
        <td>{{ $data ->tarikh_pelupusan }}</td>
    </tr>
    <tr>
        <td>vii) Cara Pelupusan</td>
        <td>{{ $data ->cara_pelupusan }}</td>
    </tr>
    <tr>
        <td>viii)Nilai Pelupusan</td>
        <td>{{ $data ->nilai_pelupusan }}</td>
    </tr>
    @endif
    <tr rowspan = "3">
      <td><input type="hidden"><br></td>
    </tr>
    @endforeach
</table>
