<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 40; $i++) {
            for ($x = 0; $x < 4; $x++) {
                Images::create([

                    'url' => $faker->imageUrl(),
                    'products_id' => $i+1,
                ]);
                }

        }
    }
}
