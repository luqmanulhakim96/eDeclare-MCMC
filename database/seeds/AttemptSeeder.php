<?php

use Illuminate\Database\Seeder;

class AttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('setting_auths')-> insert(
        [
          'max_attempts' => '3'
        ]
      );

        DB::table('setting_auths')-> insert(
        [
          'decay_minutes' => '1'
        ]
      );

      DB::table('durations')-> insert(
        [
          'years' => '5'
        ]
      );
    }
}
