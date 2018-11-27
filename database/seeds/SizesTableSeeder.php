<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            ['name' => 'Size S'],
            ['name' => 'Size M'],
            ['name' => 'Size L'],
            ['name' => 'Size XL'],
        ]);
    }
}
