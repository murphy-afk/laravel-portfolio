<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) { 

            $startYear = $faker->year();
            $endYear = $startYear + rand(1, 4);

            $newProject = new Project();
            $newProject->name = $faker->sentence(4);
            $newProject->client = $faker->company();
            $newProject->start_year = $startYear;
            $newProject->end_year = $endYear;
            $newProject->completed = $faker->boolean();
            $newProject->description = $faker->paragraph();
            $newProject->save();
        }
    }
}
