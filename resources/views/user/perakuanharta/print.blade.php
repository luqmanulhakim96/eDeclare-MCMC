<!--Page Body part -->
<table>
  <tr>
    <td><font style="color:red;">Rahsia</td>

  </tr>
  <tr>
    <td><img src="{{ asset('qbadminui/img/MCMC.png') }}" height="20%" width="20%"></td>
    <!-- <img src="{{ asset('qbadminui/img/MCMC.png') }}" alt="image" class="w-25"> -->
  </tr>
    <tr>
        <td align="center" colspan="4"><b>BORANG PENGAKUAN TIADA PENAMBAHAN KE ATAS PEMILIKAN HARTA</b></td>
    </tr>
    <tr>
      <td colspan="3"><h5><b>1.KETERANGAN MENGENAI PEGAWAI</b></h5></td>
    </tr>
    <tr>
        <td>
            Nama
        </td>
        <td>
            {{$listHarta ->users->name }}
        </td>
    </tr>
    <tr>
        <td>
            No. Kad Pengenalan
        </td>
        <td>
            {{$listHarta ->users->kad_pengenalan }}
        </td>
    </tr>
    <tr>
        <td>
            Jawatan / Gred
        </td>
        <td>
            {{$listHarta ->users->jawatan }}
        </td>
    </tr>
    <tr>
        <td>
            Alamat Tempat Bertugas
        </td>
        <td>
            {{$listHarta ->users->alamat_tempat_bertugas }}
        </td>
    </tr>
    <tr>
        <td colspan="3"><h5><b>2.PERAKUAN PEGAWAI</b></h5></td>
    </tr>

</table>
Dengan ini saya mengaku bahawa tiada perubahan ke atas pemilikan harta saya seperti yang telah di isytiharkan pada <b>{{$listHarta -> tarikh_perakuan}}</b>
Saya membuat pengakuan ini selaras dengan kehendak perenggan 6, Pekeliling Perkhidmatan Bil. 3 Tahun 2002. Saya mengaku bahawa segala maklumat yang diberikan dalam borang adalah lengkap dan benar. Sekiranya terdapat sebarang maklumat yang meragukan, perisytiharan harta saya boleh dirujuk kepada Jawatankuasa Tatatertib MCMC</p>
