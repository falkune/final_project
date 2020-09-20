<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@mail.com',
                'password' => Hash::make('passer'),
                'user_statut' => 'admin'
            ],
            [
                'email' => 'visiteur1@mail.com',
                'user_password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur2@mail.com',
                'password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur3@mail.com',
                'user_password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur4@mail.com',
                'password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur5@mail.com',
                'user_password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur6@mail.com',
                'password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur7@mail.com',
                'user_password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur8@mail.com',
                'password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur9@mail.com',
                'user_password' => NULL,
                'user_statut' => 'visiteur'
            ],
            [
                'email' => 'visiteur0@mail.com',
                'password' => NULL,
                'user_statut' => 'visiteur'
            ]
        ]);
    }
}
