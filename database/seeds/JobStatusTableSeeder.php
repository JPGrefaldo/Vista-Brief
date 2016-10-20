<?php

use Illuminate\Database\Seeder;

class JobStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_status')->insert([
        	[
        		'name'	=>	'Pitch'
        	],
            [
                'name'  =>  'Job'
            ],
        ]);
    }
}
