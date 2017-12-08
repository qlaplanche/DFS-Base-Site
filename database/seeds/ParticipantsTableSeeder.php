<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            'created_at' => NULL,
            'updated_at' =>NULL,
            'is_sam' =>0,
            'nb_places'=>NULL,
            'need_sam'=>1,
            'accepted'=>0,
            'event_id'=>1,
            'user_id'=>2,
            'is_arrived'=>NULL,
            'home_departure_at'=>NULL,
            'home_arrived_at'=>NULL,
            'situation'=>'warning',


        ]);

        DB::table('participants')->insert([
            'created_at' => NULL,
            'updated_at' =>NULL,
            'is_sam' =>1,
            'nb_places'=>4,
            'need_sam'=>0,
            'accepted'=>1,
            'event_id'=>1,
            'user_id'=>4,
            'is_arrived'=>1,
            'home_departure_at'=>NULL,
            'home_arrived_at'=>NULL,
            'situation'=>'ok',


        ]);

        DB::table('participants')->insert([
            'created_at' => NULL,
            'updated_at' =>NULL,
            'is_sam' =>1,
            'nb_places'=>2,
            'need_sam'=>1,
            'accepted'=>1,
            'event_id'=>3,
            'user_id'=>1,
            'is_arrived'=>0,
            'home_departure_at'=>NULL,
            'home_arrived_at'=>NULL,
            'situation'=>'critical',


        ]);

        DB::table('participants')->insert([
            'created_at' => NULL,
            'updated_at' =>NULL,
            'is_sam' =>0,
            'nb_places'=>NULL,
            'need_sam'=>0,
            'accepted'=>1,
            'event_id'=>2,
            'user_id'=>3,
            'is_arrived'=>1,
            'home_departure_at'=>NULL,
            'home_arrived_at'=>NULL,
            'situation'=>'ok',


        ]);
    }
}
