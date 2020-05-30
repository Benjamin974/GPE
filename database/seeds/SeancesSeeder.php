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
                "name" => 'Seance long',
                "contenu_seance_par_jour" => "Développé couché : 4 séries de 10 répétitions.
                                                Développé incliné : 4 séries de 10 répétitions.
                                                Ecartés à la poulie vis-à-vis : 4 séries de 15 répétitions.
                                                Dips : 4 séries de 10 répétitions.
                                                Barre au front : 4 séries de 10 répétitions.",
                "image" => "test"

            ],
            [
                "id" => 2,
                "name" => 'Seance moyen',
                "contenu_seance_par_jour" => "Traction à la barre en pronation: 6 x 10 répétitions.
                                                Traction à la barre en supination: 6 x 9 répétitions.
                                                Dips: 6 x 25.
                                                Pompes inversées (mains plus basses que les pieds): 6 x 21.
                                                Crunch inversés (dos incliné tête vers le bas): 6 x 50.",
                "image" => "test"

            ],
            [
                "id" => 3,
                "name" => 'Seance courte',
                "contenu_seance_par_jour" => "40' ciseaux, 20' récupération
                40' jumping jacks, 20' récupération
                40' corde à sauter, 20' récupération
                40' squats saut vertical, 20' récupération",
                "image" => "test"

            ],
        ];

        DB::table('seances')->insert(
            $array
        );
    }
}
