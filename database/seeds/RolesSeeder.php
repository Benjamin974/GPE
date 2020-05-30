<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
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
                "name" => "coach",

            ],
            [
                "id" => 2,
                "name" => "client",
                
            ],
            [
                "id" => 3,
                "name" => "gerant",
                
            ],
        ];

        DB::table('roles')->insert(
            $array
        );
    }
}
