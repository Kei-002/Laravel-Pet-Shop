<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        foreach(range(1,25) as $index){
            Customer::create([
                'title' => $faker->title($gender = 'others'|'male'|'female'),
                'lname' => $faker->lastName(),
                'fname' => $faker->firstName($gender = 'others'|'male'|'female'),
                'addressline' => $faker->address(),
                'town' => $faker->city(),
                'zipcode' => $faker->postcode(),
                'phone'=> $faker->phoneNumber(), 
            ]);
        }
    }
}
