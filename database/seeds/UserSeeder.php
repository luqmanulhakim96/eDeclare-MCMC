<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')-> insert(
      [
        'id' => 1,
        'name' => 'Muhammad Syahdan',
        'email' => 'adan@artanis.com',
        'password' => '1234567890',
        'kad_pengenalan' => '970128565287',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'kad_pengenalan_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'no_kad_pengenalan_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '1',
      ]
    );

      DB::table('users')-> insert(
      [
        'id' => 2,
        'name' => 'Amirul Amsyar',
        'email' => 'amirul@artanis.com',
        'password' => '1234567890',
        'kad_pengenalan' => '970128565287',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Cinderella',
        'kad_pengenalan_pasangan' => '978652302568',
        'pekerjaan_pasangan' => 'Suri Rumah',
        'gaji' => '1000',
        'nama_anak' => 'Amirul',
        'umur_anak' => '11',
        'no_kad_pengenalan_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '2',
      ]
    );

      DB::table('users')-> insert(
      [
        'id' => 3,
        'name' => 'Muhammad Hafiz',
        'email' => 'hafiz@artanis.com',
        'password' => '1234567890',
        'kad_pengenalan' => '970128565287',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'kad_pengenalan_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'no_kad_pengenalan_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '3',
      ]
    );

      DB::table('users')-> insert(
      [
        'id' => 4,
        'name' => 'Muhammad Shahid',
        'email' => 'shahid@artanis.com',
        'password' => '1234567890',
        'kad_pengenalan' => '970128565287',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'kad_pengenalan_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'no_kad_pengenalan_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '4',
      ]
      );

      DB::table('users')-> insert(
      [
        'id' => 5,
        'name' => 'Muhammad Luqman',
        'email' => 'luqman@artanis.com',
        'password' => '1234567890',
        'kad_pengenalan' => '970128565287',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'kad_pengenalan_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'no_kad_pengenalan_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '5',
      ]
      );
        //
    }
}
