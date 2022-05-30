<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('communes')->insert([
            'id_reg' => 2,
            'description' => 'Leon',
        ]);


        \DB::table('communes')->insert([
            'id_reg' => 2,
            'description' => 'Guanajuato CPT',
        ]);

        \DB::table('communes')->insert([
            'id_reg' => 3,
            'description' => 'Morelia',
        ]);

        \DB::table('communes')->insert([
            'id_reg' => 3,
            'description' => 'Patzcuaro',
        ]);

        \DB::table('communes')->insert([
            'id_reg' => 1,
            'description' => 'Tecate',
        ]);

        \DB::table('communes')->insert([
            'id_reg' => 1,
            'description' => 'Mexicali',
        ]);
    }
}
