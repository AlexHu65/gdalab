<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('regions')->insert([
            'id_reg' => 3,
            'description' => 'Michoacan',
        ]);

        \DB::table('regions')->insert([
            'id_reg' => 2,
            'description' => 'Guanajuato',
        ]);

        \DB::table('regions')->insert([
            'id_reg' => 1,
            'description' => 'Baja California',
        ]);


    }
}
