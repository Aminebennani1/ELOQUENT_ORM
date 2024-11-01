<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'name' => 'First Post',
            'description' => 'This is the first post.',
            'category_id' => 1, 
        ]);
    }
}