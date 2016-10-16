<?php

use Illuminate\Database\Seeder;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_status')->insert([
        	[
        		'name'	=>	'Pitch',
        		'color'	=>	'Red'
        	],
            [
                'name'  =>  'Quote',
                'color' =>  'Blue'
            ],
            [
                'name'  =>  'Live',
                'color' =>  'Blue'
            ],
        ]);
    }
}
