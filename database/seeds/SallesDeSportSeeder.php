<?php

use Illuminate\Database\Seeder;

class SallesDeSportSeeder extends Seeder
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
                "name" => "muscuService",
                "lieu" => "st Leu",
                "horaire" => "8h - 18h",
                "id_user" => 5

            ],
            [
                "id" => 2,
                "name" => "cardioTime",
                "lieu" => "st Paul",
                "horaire" => "8h - 18h",
                "id_user" => 6

            ],
           
        ];

        DB::table('salles_de_sport')->insert(
            $array
        );
    }
}
