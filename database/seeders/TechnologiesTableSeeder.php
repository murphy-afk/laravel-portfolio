<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ['HTML', 'CSS', 'Javascript', 'PHP', 'Python', 'Typescript', 'Rust'];
        foreach ($technologies as $key => $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->description = $faker->sentence();
            $newTechnology->color = $faker->hexColor();
            $newTechnology->save();
        }
    }
}
