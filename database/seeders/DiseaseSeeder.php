<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach(range(1,10) as $index){
            Disease::create([
                'disease_name' => $faker->unique()->randomElement($array = array ('Leptospirosis','Heartworms','Parvo','Heatstroke','Leg Injury','Diabetes','Headache','Bleeding','Hepatitis','Cough')),
            ]);
        }
    }
}
