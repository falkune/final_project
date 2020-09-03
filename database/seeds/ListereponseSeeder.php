<?php

use Illuminate\Database\Seeder;

class ListereponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $rankStudents = DB::table('questions')->where('numero_question', '=', 3)->first();
        DB::table('listereponses')->insert([
            [
                'libelle_choix' => 'Homme',
                'question_id' => 3
            ],
            [
                'libelle_choix' => 'Femme',
                'question_id' => 3
            ],
            [
                'libelle_choix' => 'Préfère de pas répondre',
                'question_id' => 3
            ],
            [
                'libelle_choix' => 'Occulus Rift/s',
                'question_id' => 6
            ],
            [
                'libelle_choix' => 'HTC Vive',
                'question_id' => 6
            ],
            [
                'libelle_choix' => 'Windows Mixed Reality',
                'question_id' => 6
            ],
            [
                'libelle_choix' => 'PSVR',
                'question_id' => 6
            ],
            [
                'libelle_choix' => 'SteamVR',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Occulus store',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Viveport',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Playstation VR',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Google Play',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Windows store',
                'question_id' => 7
            ],
            [
                'libelle_choix' => 'Occulus Quest',
                'question_id' => 8
            ],
            [
                'libelle_choix' => 'Occulus Go',
                'question_id' => 8
            ],
            [
                'libelle_choix' => 'HTC Vive Pro',
                'question_id' => 8
            ],
            [
                'libelle_choix' => 'Autre',
                'question_id' => 8
            ],
            [
                'libelle_choix' => 'Aucun',
                'question_id' => 8
            ],
            [
                'libelle_choix' => 'regarder des émissions TV en direct',
                'question_id' => 10
            ],
            [
                'libelle_choix' => 'egarder des films',
                'question_id' => 10
            ],
            [
                'libelle_choix' => 'jouer en solo',
                'question_id' => 10
            ],
            [
                'libelle_choix' => 'jouer en team',
                'question_id' => 10
            ],
            [
                'libelle_choix' => 'Oui',
                'question_id' => 16
            ],
            [
                'libelle_choix' => 'Non',
                'question_id' => 16
            ],
            [
                'libelle_choix' => 'Oui',
                'question_id' => 17
            ],
            [
                'libelle_choix' => 'Non',
                'question_id' => 17
            ]
        ]);
    }
}
