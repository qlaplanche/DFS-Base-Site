<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProblemHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problem_histories')->insert([
        	'occured_at' => Carbon::now(),
        	'description' => 'Il fait beau à Bourges',
        	'participant_id' => 1,
        	'event_id' => 1,
		'latitude' => 0,
		'longitude' => 0,
		'situation' => 'meteo',
        ]);
    }
}
