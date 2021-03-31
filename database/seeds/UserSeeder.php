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
    

      DB::table('tempoh_notifikasis')-> insert(
      [
        'status' => 'Diterima'
      ]
    );

      DB::table('tempoh_notifikasis')-> insert(
      [
        'status' => 'Tidak Lengkap'
      ]
    );

      DB::table('tempoh_notifikasis')-> insert(
      [
        'status' => 'Gagal'
      ]
    );

      DB::table('routes')-> insert(
        [
          'jawatan' => 'Pentadbir Sistem',
          'layout' => '["1","2"]',
          'roles' => 1
        ]
      );
        DB::table('routes')-> insert(
        [
          'jawatan' => 'IT Admin',
          'layout' => '["1","2"]',
          'roles' => 4
        ]
      );
      DB::table('jenis_hartas')-> insert(
        [
          'jenis_harta' => 'Kenderaan',
          'status_jenis_harta' => 'Aktif'
        ]
      );
      DB::table('jenis_hadiahs')-> insert(
        [
          'jenis_gift' => 'Kenderaan',
          'status_jenis_hadiah' => 'Aktif'
        ]
      );


    }
}
