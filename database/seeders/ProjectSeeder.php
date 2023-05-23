<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Project::truncate();

        for ($i = 0; $i < 10; $i++) {

            $type = Type::inRandomOrder()->first();

            $project = new Project();
            $project->name = $faker->words(2, true);
            $project->description = $faker->sentence();
            $project->major_version = $faker->numberBetween(1, 10);
            $project->minor_version = $faker->numberBetween(1, 10);
            $project->patch_version = $faker->numberBetween(1, 10);
            $project->slug = Str::slug($project->name, '-');
            $project->type_id = $type->id;
            $project->save();
        }
    }
}
