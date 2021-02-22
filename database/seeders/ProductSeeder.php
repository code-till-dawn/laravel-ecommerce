<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,20) as $value) {
            DB::table('products')->insert([
                'name' => 'Product-' . Str::random(6),
                'price' => $faker->numberBetween(1,100),
                'quantity' => $faker->numberBetween(1,50),
                'image' => Str::random(6) . '.png'
            ]);
        }
    }
}
