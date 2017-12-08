<?php

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
            'event' => 3,
            'participant' => 1,
        ]);

        DB::table('problem_histories')->insert([
            'occured_at' => Carbon::now(),
            'situation' => 'meteo',
            'description' => 'Neige sur la route',
            'event' => 1,
            'participant' => 2,
        ]);
    }
}
