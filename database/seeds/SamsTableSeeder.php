<?php

use Illuminate\Database\Seeder;

class SamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sams')->insert([
            'sam_id' => 1,
            'participant_id' => 3,
            'event_id' => 2,
        ]);

        DB::table('sams')->insert([
            'sam_id' => 4,
            'participant_id' => 1,
            'event_id' => 3,
        ]);

        DB::table('sams')->insert([
            'sam_id' => 1,
            'participant_id' => 2,
            'event_id' => 2,
        ]);

        DB::table('sams')->insert([
            'sam_id' => 3,
            'participant_id' => 2,
            'event_id' => 1,
        ]);
    }
}
