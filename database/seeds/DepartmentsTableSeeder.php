<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
        	[
        		'name'	=>	'Events',
        		'email'	=>	'events@wearevista.com'
        	],
        	[
        		'name'	=>	'Digital',
        		'email'	=>	'digital@wearevista.com'
        	],
        	[
        		'name'	=>	'Strategy',
        		'email'	=>	'strategy@wearevista.com'
        	],
        	[
        		'name'	=>	'Film',
        		'email'	=>	'film@wearevista.com'
        	],
        	[
        		'name'	=>	'Content',
        		'email'	=>	'content@wearevista.com'
        	],
        	[
        		'name'	=>	'Exhibitions',
        		'email'	=>	'exhibitions@wearevista.com'
        	],
        	[
        		'name'	=>	'Design',
        		'email'	=>	'designs@wearevista.com'
        	],
        	[
        		'name'	=>	'Venuehub',
        		'email'	=>	'venuehub@wearevista.com'
        	],	
        ]);
    }
}
