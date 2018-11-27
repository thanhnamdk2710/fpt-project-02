<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Customer']
        ]);

        $user = DB::table('users')->insertGetId([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);

        DB::table('profiles')->insert([
            'user_id' => $user,
            'name' => 'Admin',
            'avatar' => '',
            'phone' => '034366133',
            'birthday' => '27-10-1995',
            'address' => 'Da Nang'
        ]);
    }
}
