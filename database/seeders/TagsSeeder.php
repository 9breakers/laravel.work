<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['name' => 'First Post Title'],
            ['name' => 'Second Post Title'],

        ];

        foreach ($posts as $post) {
            $slug = Str::slug($post['name']);

            Tag::create([
                'name' => $post['name'],
                'slug' => $slug,
            ]);
        }
    }
}
