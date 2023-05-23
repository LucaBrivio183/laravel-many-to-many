<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'JS', 'Laravel', 'Vite', 'VueJS', 'PHP', 'SQL'];

        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($technologies as $technology) {

            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($new_technology->name);
            $new_technology->save();
        }
    }
}
