<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => "velo 1",
                'description' => "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500",
                'price' => "399999",
                'image' => "image.jpg",
                'category_id' => "1"
            ],

            [
                'name' => "velo 2",
                'description' => "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500",
                'price' => "399999",
                'image' => "image.jpg",
                'categorie_id' => "2"

            ],

            [
                'name' => "velo 3",
                'description' => "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500",
                'price' => "399999",
                'image' => "image.jpg",
                'categorie_id' => "1"

            ]


        ]);
    }
}
