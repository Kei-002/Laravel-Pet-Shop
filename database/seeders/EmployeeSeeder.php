<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = \Faker\Factory::create();
        $users = User::pluck('id')->all();

        foreach(range(1,10) as $index){
            Employee::create([
                'lname' => $faker->lastName(),
                'fname' => $faker->firstName($gender = 'others'|'male'|'female'),
                'user_id' => $faker-> unique() -> randomElement($users),
                'phone'=> $faker->phoneNumber(), 
            ]);

            
        }
    }
}
