<?php

use App\SalleDeSportModel;
use App\User;
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
                "id_image" => 2

            ],
            [
                "id" => 2,
                "id_user" => 1,
                "id_salle_de_sport" => 2,
                "id_seance" => 5,
                "name" => "programme de débutant",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "id_image" => 2

            ],
            [
                "id" => 3,
                "id_user" => 1,
                "id_salle_de_sport" => 1,
                "id_seance" =>  4,
                "name" => "programme de fitness",
                "difficulte" => "moyen",
                "nbre_seance_semaine" => "6",
                "id_image" => 1

            ],
            [
                "id" => 4,
                "id_user" => 2,
                "id_salle_de_sport" => 2,
                "id_seance" => 2,
                "name" => "programme de cardio",
                "difficulte" => "semi difficile",
                "nbre_seance_semaine" => "4",
                "id_image" => 1

            ],
            [
                "id" => 5,
                "id_user" => 2,
                "id_salle_de_sport" => 2,
                "id_seance" => 2,
                "name" => "programme de aerobique",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "id_image" => 3
            ],
            [
                "id" => 6,
                "id_user" => 2,
                "id_salle_de_sport" => 1,
                "id_seance" => 2,
                "name" => "programme de half-body",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "id_image" => 3
            ],
            [
                "id" => 7,
                "id_user" => 2,
                "id_salle_de_sport" => 2,
                "id_seance" => 2,
                "name" => "programme de full-body",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "id_image" => 4
            ],
            [
                "id" => 8,
                "id_user" => 1,
                "id_salle_de_sport" => 1,
                "id_seance" => 6,
                "name" => "programme de poid léger",
                "difficulte" => "facile",
                "nbre_seance_semaine" => "4",
                "id_image" => 4
            ],


        ];

        DB::table('programmes')->insert(
            $array
        );

        $user1 = User::where('name', '=', 'Henry')->first();
        $user2 = User::where('name', '=', 'Benjamin')->first();
        $salleDeSport1 = SalleDeSportModel::where('id', '=', 1)->first();
        $salleDeSport2 = SalleDeSportModel::where('id', '=', 2)->first();
        $salleDeSport1->client()->attach($user1);
        $salleDeSport2->client()->attach($user2);
    }
}
