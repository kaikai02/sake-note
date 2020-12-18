<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
	    [
	        'name' => '店A',
	        'body' => 'テストA',
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
	    ],
	    [
		'name' => '店B',
		'body' => 'テストB',
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
	    ]
	]);
    }
}
