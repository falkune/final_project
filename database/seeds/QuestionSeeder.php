<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'numero_question' => 1,
                'libelle_question' => 'Votre adresse mail',
                'type_question' => 'B'
            ],
            [
                'numero_question' => 2,
                'libelle_question' => 'Votre âge',
                'type_question' => 'B'
            ],
            [
                'numero_question' => 3,
                'libelle_question' => 'Votre sexe',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 4,
                'libelle_question' => 'Nombre de personne dans votre foyer (adulte & enfants)',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 5,
                'libelle_question' => 'Votre profession',
                'type_question' => 'B'
            ],
            [
                'numero_question' => 6,
                'libelle_question' => 'Quel marque de casque VR utilisez vous ?',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 7,
                'libelle_question' => 'Sur quel magasin d’application achetez vous des contenus VR ?',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 8,
                'libelle_question' => 'Quel casque envisagez vous d’acheter dans un futur proche ?',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 9,
                'libelle_question' => 'Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 10,
                'libelle_question' => 'Vous utilisez principalement Bigscreen pour :',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 11,
                'libelle_question' => 'Combien donnez vous de point pour la qualité de l’image sur Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 12,
                'libelle_question' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 13,
                'libelle_question' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 14,
                'libelle_question' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 15,
                'libelle_question' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 16,
                'libelle_question' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 17,
                'libelle_question' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?',
                'type_question' => 'A'
            ],
            [
                'numero_question' => 18,
                'libelle_question' => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 19,
                'libelle_question' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?',
                'type_question' => 'C'
            ],
            [
                'numero_question' => 20,
                'libelle_question' => 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?',
                'type_question' => 'B'
            ],
        ]);
    }
}
