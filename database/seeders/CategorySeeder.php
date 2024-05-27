<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Science', 'slug' => 'science'],
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Travel', 'slug' => 'travel'],
            ['name' => 'Environment', 'slug' => 'environment'],
            ['name' => 'Food', 'slug' => 'food']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
