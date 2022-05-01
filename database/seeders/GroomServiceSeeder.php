<?php

namespace Database\Seeders;
use App\Models\GroomService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroomServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach(range(1,5) as $index){
            GroomService::create([
                'groom_name' => $faker->unique()->randomElement($array = array ('Nail Cutting','Hair Trim','Pet Wash','Pet Spa','Ear Cleaning')),
                'description' => $faker->paragraph($nb = 3, $asText = false),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 400, $max = 2000),
            ]);
        }
    }
}
