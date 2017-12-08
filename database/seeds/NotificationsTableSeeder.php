<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'user' => 2,
            'title' => 'Ton pote est en PLS',
            'data' => 'Va le chercher, chauffe-toi !',
        ]);

        DB::table('notifications')->insert([
            'user' => 4,
            'title' => 'Accident de voiture',
            'data' => 'Alice a eu un accident, es-tu sur place ? Si oui, as-tu appelé les secours ?',
        ]);

        DB::table('notifications')->insert([
            'user' => 3,
            'title' => 'Conditions météo',
            'data' => 'Attention sur la route, les températures sont négatives il peut y avoir du verglas',
            'read_at' => Carbon::now()->subDays(3),
        ]);
    }
}
