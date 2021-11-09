<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class useradmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@mail.com',
	    'password' => bcrypt('123456789'),
        'rol' => 'admin',
        ]);
    }
}
