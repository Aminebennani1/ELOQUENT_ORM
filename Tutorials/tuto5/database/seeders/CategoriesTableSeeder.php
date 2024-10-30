<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;


class CategoriesTableSeeder extends Seeder
{
   
    public function run(): void
    {
        // \App\Models\Category::factory()->count(10)->create();
        // \App\Models\Category::factory()->count(5)->active()->create();

        $csv = Reader::createFromPath(database_path('seeders/categories.csv'));
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            Category::create([
                'name' => $record['name'],
                'description' => $record['description'],
            ]);
        }
    }
}
