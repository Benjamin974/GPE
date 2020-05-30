<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                "name" => "Jean",
                "surname" => "Robert",
                "email" => "jeanrobert974@gmail.com",
                "password" => bcrypt("jeanrobert"),
                "id_role" => 1

            ],
            [
                "id" => 2,
                "name" => "Julien",
                "surname" => "Saporet",
                "email" => "julsap@gmail.com",
                "password" => bcrypt("juliensaporet"),
                "id_role" => 1

            ],
            [
                "id" => 3,
                "name" => "Henry",
                "surname" => "Larelly",
                "email" => "henlar@gmail.com",
                "password" => bcrypt("henrylarelly"),
                "id_role" => 2

            ],
            [
                "id" => 4,
                "name" => "Benjamin",
                "surname" => "Payet",
                "email" => "benpay@gmail.com",
                "password" => bcrypt("benjaminpayet"),
                "id_role" => 2

            ],
            [
                "id" => 5,
                "name" => "Xiao",
                "surname" => "Lee",
                "email" => "xiaolee@gmail.com",
                "password" => bcrypt("xiaolee"),
                "id_role" => 3

            ],
            [
                "id" => 6,
                "name" => "Ragnar",
                "surname" => "Ragnarson",
                "email" => "rara@gmail.com",
                "password" => bcrypt("ragnarragnarson"),
                "id_role" => 3

            ],
        ];

        DB::table('users')->insert(
            $array
        );
    }
}
