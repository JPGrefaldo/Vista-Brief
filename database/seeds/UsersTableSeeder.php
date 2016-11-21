<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
        		'username'    =>	'Admin',
        		'forename'    =>	'Ad',
        		'surname'     =>	'Min',
        		'email'       =>	'admin@wearevista.co.uk',
        		'password'    =>	bcrypt('admin'),
        		'type'        =>	1,
        		'is_active'   =>	1,
        	],
        ]);
    }
}

// password: qwqwqw = $2y$10$efGa1isY3AC4Tk0Sv3JenOK5Ngwi/rYQ9XDVHh/IjQ1dH1m.VEL0u