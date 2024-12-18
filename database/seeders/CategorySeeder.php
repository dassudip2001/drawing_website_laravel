<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sketching',
                'slug' => Str::slug('Sketching'),
                'description' => 'Category for pencil sketches and hand-drawn illustrations.',
                'user_id' => 1, // Replace with an existing user ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Art',
                'slug' => Str::slug('Digital Art'),
                'description' => 'Category for digital illustrations and designs.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Watercolor',
                'slug' => Str::slug('Watercolor'),
                'description' => 'Category for watercolor paintings and designs.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charcoal Drawing',
                'slug' => Str::slug('Charcoal Drawing'),
                'description' => 'Category for charcoal-based artwork and shading techniques.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oil Painting',
                'slug' => Str::slug('Oil Painting'),
                'description' => 'Category for traditional oil paintings and artworks.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anime Art',
                'slug' => Str::slug('Anime Art'),
                'description' => 'Category for anime and manga-style illustrations.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '3D Modeling',
                'slug' => Str::slug('3D Modeling'),
                'description' => 'Category for 3D digital art and modeling designs.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Calligraphy',
                'slug' => Str::slug('Calligraphy'),
                'description' => 'Category for artistic lettering and handwriting designs.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abstract Art',
                'slug' => Str::slug('Abstract Art'),
                'description' => 'Category for abstract and contemporary art styles.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Portrait Art',
                'slug' => Str::slug('Portrait Art'),
                'description' => 'Category for realistic and stylized portraits.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}