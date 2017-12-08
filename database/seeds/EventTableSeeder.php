<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
        	'name' => 'Alcooloique anonyme',
        	'description' => 'Je suis une description',
        	'place' => 'Chez la mère de Quentin',
        	'begin_date' => Carbon::now(),
        	'orga_id' => 1,
        	'visibility' => false,
        ]);
    }
}
