<?php

use Illuminate\Database\Seeder;

class SeancesSeeder extends Seeder
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
                "exercice" => 'développé couché et soulevé de terre',
                "quantite_serie" => "5 série",
                "temps_recuperation" => "1 min",
                "nombre_jours" => "20 jours"

            ],
            [
                "id" => 2,
                "exercice" => "Traction à la barre en pronation, pompes inversées",
                "quantite_serie" => "5 série",
                "temps_recuperation" => "1 min",
                "nombre_jours" => "20 jours"

            ],
            [
                "id" => 3,
                "exercice" => "squats saut vertical",
                "quantite_serie" => "5 série",
                "temps_recuperation" => "1 min",
                "nombre_jours" => "20 jours"

            ],
        ];

        DB::table('seances')->insert(
            $array
        );
    }
}
