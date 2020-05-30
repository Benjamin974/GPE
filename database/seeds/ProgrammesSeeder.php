<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                "id" => 1,
                "id_user" => 1,
                "id_salle_de_sport" => 1,
                "id_seance" => 1,
                "name" => "programme de muscu",
                "difficulte" => "difficile",
                "nbre_seance_semaine" => "4",
                "prix" => "40€/mois",
                "id_image" => 2

            ],
            [
                "id" => 2,
                "id_user" => 2,
                "id_salle_de_sport" => 2,
                "id_seance" => 2,
                "name" => "programme de cardio",
                "difficulte" => "semi difficile",
                "nbre_seance_semaine" => "4",
                "prix" => "40€/mois",
                "id_image" => 1

            ],
            [
                "id" => 3,
                "id_user" => 2,
                "id_salle_de_sport" => 2,
                "id_seance" => 2,
                "name" => "programme de aerobique",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "prix" => "40€/mois",
                "id_image" => 3

            ],

        ];

        DB::table('programmes')->insert(
            $array
        );
    }
}
