<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'Black'],
            ['name' => 'White'],
            ['name' => 'Yellow'],
            ['name' => 'Gray']
        ]);
    }
}
