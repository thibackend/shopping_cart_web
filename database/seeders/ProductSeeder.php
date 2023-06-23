<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Categories::pluck("id")->all();
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) :
            $product = new products();
            $product->name = $faker->word;
            $product->image = $faker->imageUrl();
            $product->price = $faker->numberBetween(100, 1000);
            $product->category_id =$faker->randomElement($categories);
            $product->save();

        endfor;
    }
}
