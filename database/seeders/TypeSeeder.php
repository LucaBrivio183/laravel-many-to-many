<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['html', 'css', 'js', 'laravel', 'vite', 'vue', 'php', 'SQL'];

        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($types as $type) {

            $new_type = new Type();
            $new_type->type_name = $type;
            $new_type->slug = Str::slug($new_type->type_name);
            $new_type->save();
        }
    }
}
