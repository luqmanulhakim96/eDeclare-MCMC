<table>
  <tr>
    <td colspan="4"><font style="color:red;">Rahsia</td>
    <td><h5>LAMPIRAN 'D'<br> Borang SKMM(R)3/02</h5></td>
  </tr>
  <tr>
    <td><img src="https://pbs.twimg.com/profile_images/1306147240814063621/DpSqT1KA_400x400.jpg" height="20%" width="20%"></td>
  </tr>
    <tr>
        <td align="center" colspan="5"><b>BORANG PERISYTIHARAN SYARIKAT/PERNIAGAAN SENDIRI</b></td>
    </tr>
    <tr>
      <td colspan="3"><h5><b>1.KETERANGAN MENGENAI PEGAWAI</b></h5></td>
    </tr>
    <tr>
        <td>
            Nama
        </td>
        <td>
            {{$listHarta ->formds->name }}
        </td>
    </tr>
    <tr>
        <td>
            No. Kad Pengenalan
        </td>
        <td>
            {{$listHarta ->formds->kad_pengenalan }}
        </td>
    </tr>
    <tr>
        <td>
            Jawatan / Gred
        </td>
        <td>
            {{$listHarta ->formds->jawatan }}
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
            {{$listHarta ->formds->alamat_tempat_bertugas }}
        </td>
    </tr>
    <tr>
      <td colspan="3"><h5><b> KETERANGAN MENGENAI SYARIKAT / PERNIAGAAN</b></h5></td>
    </tr>
    <tr>
      <td>i) Nama Syarikat / Perniagaan</td>
      <td>{{ $listHarta ->nama_syarikat }}</td>
    </tr>
    <tr>
      <td>ii) No. Pendaftaran</td>
      <td>{{ $listHarta ->no_pendaftaran_syarikat }}</td>
    </tr>
    <tr>
      <td>iii) Alamat Syarikat / Perniagaan</td>
      <td>{{ $listHarta ->alamat_syarikat }}</td>
    </tr>
    <tr>
      <td>iv) Jenis Syarikat / Perniagaan</td>
      <td>{{ $listHarta ->jenis_syarikat }}</td>
    </tr>
    <tr>
      <td>v) Pulangan Perniagaan Tahunan</td>
      <td>{{ $listHarta ->pulangan_tahunan }}</td>
    </tr>
    <tr>
      <td>vi) Modal Dibenarkan</td>
      <td>{{ $listHarta ->modal_syarikat }}</td>
    </tr>
    <tr>
      <td>vii) Modal Berbayar (Paid Up Capital)</td>
      <td>{{ $listHarta ->modal_dibayar }}</td>
    </tr>
    <tr>
      <td>viii) Punca Kewangan Syarikat / Perniagaan</td>
      <td>{{ $listHarta ->punca_kewangan }}</td>
    </tr>
    <tr>
      <td>ix) Nama ahli keluarga yang terlibat dalam perniagaan / syarikat</td>
    </tr>
    <tr>
      <td><b>Nama</td>
      <td><b>Hubungan</td>
      <td><b>Jawatan dalam syarikat</td>
      <td><b>Jumlah saham dipegang (unit)</td>
      <td><b>Nilai saham</td>
    </tr>

    @foreach($listKeluarga as $data)
    <tr>
      <td>{{ $data ->nama_ahli }}</td>
      <td>{{ $data ->hubungan }}</td>
      <td>{{ $data ->jawatan_syarikat }}</td>
      <td>{{ $data ->jumlah_saham }}</td>
      <td>{{ $data ->nilai_saham }}</td>
    </tr>
    @endforeach
</table>
