<?php

use Illuminate\Database\Seeder;

class EventPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_posts')->insert([
            'created_at' => date('2016-9-18 17:08:16'),
            'updated_at' => date('2016-9-19 10:43:16'),
            'event_id' => 1,
            'participant_id' => 4,
            'content' => "Accident grave de voyageur",

            ]);

        DB::table('event_posts')->insert([
            'created_at' => date('2015-12-11 11:08:16'),
            'updated_at' => date('2015-12-11 13:11:16'),
            'event_id' => 2,
            'participant_id' => 2,
            'content' => "Perdu dans les bois",

        ]);

        DB::table('event_posts')->insert([
            'created_at' => date('2014-2-1 17:08:16'),
            'updated_at' => date('2014-2-2 10:43:16'),
            'event_id' => 3,
            'participant_id' => 3,
            'content' => "Problème d'alcoolémie",

        ]);

        DB::table('event_posts')->insert([
            'created_at' => date('2016-11-18 14:08:19'),
            'updated_at' => date('2016-11-18 23:03:16'),
            'event_id' => 4,
            'participant_id' => 1,
            'content' => "Accident grave de voyageur",

        ]);

    }
}
