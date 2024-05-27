<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;

class FakePostsSeeder extends Seeder
{
    public function run()
    {
        // Ensure categories exist
        $categories = [
            'Science' => 'science',
            'Technology' => 'technology',
            'Travel' => 'travel',
            'Environment' => 'environment',
            'Food' => 'food'
        ];

        foreach ($categories as $name => $slug) {
            Category::firstOrCreate(['name' => $name, 'slug' => $slug]);
        }

        // Fake posts data
        $posts = [
            [
                'title' => 'Exploring the Wonders of Space',
                'content' => 'Space exploration has always fascinated humanity. From the first moon landing to the Mars rovers, the quest to understand the cosmos continues.',
                'image' => 'https://via.placeholder.com/600x400',
                'category_slug' => 'science',
                'slug' => 'exploring-the-wonders-of-space',
                'created_at' => now(),
            ],
            [
                'title' => 'The Rise of Artificial Intelligence',
                'content' => 'Artificial Intelligence (AI) is transforming industries across the globe. From healthcare to finance, AI is making significant strides.',
                'image' => 'https://via.placeholder.com/600x400',
                'category_slug' => 'technology',
                'slug' => 'the-rise-of-artificial-intelligence',
                'created_at' => now(),
            ],
            [
                'title' => 'A Journey Through the Alps',
                'content' => 'The Alps are a breathtaking mountain range that attracts adventurers and nature lovers. Experience the stunning landscapes and vibrant cultures.',
                'image' => 'https://via.placeholder.com/600x400',
                'category_slug' => 'travel',
                'slug' => 'a-journey-through-the-alps',
                'created_at' => now(),
            ],
            [
                'title' => 'The Future of Renewable Energy',
                'content' => 'Renewable energy sources such as solar and wind power are becoming more viable and cost-effective. Explore the advancements in green energy.',
                'image' => 'https://via.placeholder.com/600x400',
                'category_slug' => 'environment',
                'slug' => 'the-future-of-renewable-energy',
                'created_at' => now(),
            ],
            [
                'title' => 'Mastering the Art of Cooking',
                'content' => 'Cooking is both a science and an art. Learn tips and tricks from top chefs to elevate your culinary skills and impress your guests.',
                'image' => 'https://via.placeholder.com/600x400',
                'category_slug' => 'food',
                'slug' => 'mastering-the-art-of-cooking',
                'created_at' => now(),
            ]
        ];

        // Insert posts
        foreach ($posts as $postData) {
            $category = Category::where('slug', $postData['category_slug'])->first();
            if ($category) {
                Post::create([
                    'title' => $postData['title'],
                    'content' => $postData['content'],
                    'image' => $postData['image'],
                    'slug' => $postData['slug'],
                    'category_id' => $category->id,
                    'created_at' => $postData['created_at'],
                ]);
            }
        }
    }
}
