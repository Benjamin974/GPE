<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
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
                "lien" => "/storage/images/cardio.jpeg",

            ],
            [
                "id" => 2,
                "lien" => "/storage/images/muscu.jpeg",
                
            ],
            [
                "id" => 3,
                "lien" => "/storage/images/aerobique.jpeg",
                
            ],
        ];

        DB::table('images')->insert(
            $array
        );
    }
}
