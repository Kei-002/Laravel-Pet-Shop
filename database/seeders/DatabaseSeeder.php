<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\GroomService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(PetSeeder::class);
        $this->call(GroomServiceSeeder::class);
        $this->call(DiseaseSeeder::class);
    }
}
