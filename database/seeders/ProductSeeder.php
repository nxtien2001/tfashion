<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'category_id' => $faker->randomNumber(1, 55),
                'brand_id' => $faker->randomNumber(1, 9),
                'name' => $faker->name,
                'slug' => $faker->slug,
                'code' => $faker->sentence,
                'quantity' =>  $faker->randomNumber(2),
                'short_content' => $faker->sentence,
                'long_content' => $faker->paragraph,
                'price' => $faker->randomNumber(6),
                'sale_price' => $faker->randomNumber(5),
                'image' => '123.jpg',
                'status' => $faker->randomNumber(1),
            ];
            DB::table('products')->insert($data);
        }
    }
}
