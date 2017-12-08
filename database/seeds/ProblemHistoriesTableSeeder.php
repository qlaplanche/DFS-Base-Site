<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProblemHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problem_histories')->insert([
            'latitude' => 2.64676,
            'longitude' => 63.96545,
            'occured_at' => Carbon::now()->subDays(87),
            'situation' => 'ok',
            'description' => 'Matthieu s\'est perdu',
            'event_id' => 3,
            'participant_id' => 1,
        ]);

        DB::table('problem_histories')->insert([
            'occured_at' => Carbon::now(),
            'situation' => 'meteo',
            'description' => 'Neige sur la route',
            'event_id' => 1,
            'participant_id' => 2,
        ]);
    }
}
