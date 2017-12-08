<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@insa-cvl.fr',
            'password' => bcrypt('azerty'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Paul',
            'lastname' => 'Martin',
            'email' => 'paul.martin@insa-cvl.fr',
            'password' => bcrypt('toto1234'),
            'role' => 'admin',
            'created_at' => Carbon::now()->subDays(3456),
            'updated_at' => Carbon::now()->subDays(987),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Alice',
            'lastname' => 'AuPaysDesMerveilles',
            'email' => 'alice.merveille@gmail.com',
            'password' => bcrypt('JaimeLesChampignons'),
            'role' => 'member',
            'created_at' => Carbon::now()->subDays(647),
            'updated_at' => Carbon::now()->subDays(56),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Bob',
            'lastname' => 'Dylan',
            'email' => 'dylan.bob@outlook.com',
            'password' => bcrypt('12345678'),
            'role' => 'member',
            'created_at' => Carbon::now()->subDays(986),
            'updated_at' => Carbon::now()->subDays(34),
        ]);
    }
}
