<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->unique()->slug,
            'views' => $this->faker->numberBetween(0, 1000),
            'price' => $this->faker->numberBetween(10, 100),
            'image' => 'images/default.png',
            'quantity' => $this->faker->numberBetween(1, 100),
            'category_id' => function () {
                return Category::pluck('id')->random();
            },

        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 5))->get();
            $tagIds = $tags->pluck('id');
            $post->tags()->attach($tagIds);
        });
    }
}
