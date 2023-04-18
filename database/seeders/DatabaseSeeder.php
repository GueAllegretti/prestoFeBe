<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    // categorie

    public function run()
    {
        $categories = [
            0 => ["Abbigliamento"],
            1 => ["Arredamento"],
            2 => ["Auto e moto"],
            3 => ["Giardinaggio"],
            4 => ["Giochi"],
            5 => ["Libri"],
            6 => ["Musica"],
            7 => ["Sport"],
            8 => ["Tecnologia"],
            9 => ["Video"],
        ];

        foreach ($categories as $category) {

            DB::table("categories")->insert([

                "title" => $category[0],

            ]);
        }
    }
}
