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
            'sam' => 1,
            'participant' => 3,
            'event' => 2,
        ]);

        DB::table('sams')->insert([
            'sam' => 4,
            'participant' => 1,
            'event' => 3,
        ]);

        DB::table('sams')->insert([
            'sam' => 1,
            'participant' => 2,
            'event' => 2,
        ]);

        DB::table('sams')->insert([
            'sam' => 3,
            'participant' => 2,
            'event' => 1,
        ]);
    }
}
