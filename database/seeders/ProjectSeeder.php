<?php


namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(Faker $faker){
        for($i = 0; $i < 6; $i++){
            $newProject= new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->description = $faker->text(500);
            $newProject->thumb = $faker->url();
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
            $newProject->save();

        }
    }
}
