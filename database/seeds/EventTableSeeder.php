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

        DB::table('events')->insert([
            'name' => 'La toudapp',
            'description' => 'Ca va être drôle !',
            'place' => 'chez les collocs',
            'begin_date' => Carbon::now()->addDays(3),
            'orga_id' => 2,
            'visibility' => false,
        ]);

        DB::table('events')->insert([
            'name' => 'Soirée parrains fillots',
            'description' => 'On est pas là pour plaire',
            'place' => 'Au marceau comme d\'habitude',
            'begin_date' => Carbon::now()->subDays(87),
            'orga_id' => 4,
            'visibility' => false,
        ]);

        DB::table('events')->insert([
            'name' => 'Nuit de l\'info',
            'description' => 'Il faut ramener de l\'alcool ?',
            'place' => 'Salle aurore',
            'begin_date' => Carbon::now(),
            'orga_id' => 1,
            'visibility' => false,
        ]);
    }
}
