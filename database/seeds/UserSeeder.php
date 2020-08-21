<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('nilai_hadiahs')-> insert(
      [
        'nilai_hadiah' => '100',
      ]
    );

      $hashed_password = Hash::make("1234567890");
      DB::table('users')-> insert(
      [
        'name' => 'Muhammad Syahdan',
        'email' => 'adan@artanis.com',
        'password' => $hashed_password,
        'kad_pengenalan' => '900102034567',
        'jawatan' => 'Pentadbir Sistem',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '1',
      ]
    );

      DB::table('users')-> insert(
      [
        'name' => 'Amirul Amsyar',
        'email' => 'amirul@artanis.com',
        'password' => $hashed_password,
        'kad_pengenalan' => '900102034568',
        'jawatan' => 'Integrity HOD',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Cinderella',
        'kad_pengenalan_pasangan' => '978652302568',
        'pekerjaan_pasangan' => 'Suri Rumah',
        'gaji' => '1000',
        'nama_anak' => 'Amirul',
        'umur_anak' => '11',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '2',
      ]
    );

      DB::table('users')-> insert(
      [
        'name' => 'Muhammad Hafiz',
        'email' => 'hafiz@artanis.com',
        'password' => $hashed_password,
        'kad_pengenalan' => '900102034569',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '3',
      ]
    );

      DB::table('users')-> insert(
      [
        'name' => 'Muhammad Shahid',
        'email' => 'shahid@artanis.com',
        'password' => $hashed_password,
        'kad_pengenalan' => '900102034560',
        'jawatan' => 'Pegawai Admin',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '4',
      ]
      );

      DB::table('users')-> insert(
      [
        'name' => 'Muhammad Luqman',
        'email' => 'luqman@artanis.com',
        'password' => $hashed_password,
        'kad_pengenalan' => '900102034561',
        'jawatan' => 'Pegawai HR',
        'alamat_tempat_bertugas' => 'Cyberjaya',
        'nama_pasangan' => 'Tiada',
        'pekerjaan_pasangan' => 'Tiada',
        'gaji' => '1000',
        'nama_anak' => 'Tiada',
        'umur_anak' => 'Tiada',
        'lain_lain_pendapatan_bulanan' => '500',
        'role' => '5',
      ]
      );
        //
    }
}
