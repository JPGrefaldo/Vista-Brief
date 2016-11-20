<?php

use Illuminate\Database\Seeder;

class FormOfResponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('form_of_response')->insert([
        	[
        		'name'	=>	'PDF',
        	],
        	[
        		'name'	=>	'Quote',
        	],
        	[
        		'name'	=>	'Written Response in Word',
        	],
        	[
        		'name'	=>	'Tier 1 Proposal',
        	],
        	[
        		'name'	=>	'Tier 2 Proposal',
        	],
        	[
        		'name'	=>	'Tier 3 Proposal',
        	],
        	[
        		'name'	=>	'Other (see job spec)',
        	],
        ]);
    }
}


            // [
            //     'name'  =>  'PDF',
            // ],
            // [
            //     'name'  =>  'Quote including Spec and Cost',
            // ],
            // [
            //     'name'  =>  'Written response in Word',
            // ],
            // [
            //     'name'  =>  '£3k - 8k PDF Presentation',
            // ],
            // [
            //     'name'  =>  '£3k - 8k PTT Presentation',
            // ],
            // [
            //     'name'  =>  '£8k - 15k PDF Presentation',
            // ],
            // [
            //     'name'  =>  '£8k - 15k PTT Presentation',
            // ],
            // [
            //     'name'  =>  '£15k - 30k PDF Presentation',
            // ],
            // [
            //     'name'  =>  '£15k - 30k PTT Presentation',
            // ],
            // [
            //     'name'  =>  'Other (See Brief Section)',
            // ],