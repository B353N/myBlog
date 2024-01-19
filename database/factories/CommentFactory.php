<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use function PHPUnit\Framework\isNull;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        # Get Random Post
        $post = Post::inRandomOrder()->first();

        return [
            'the_comment' => $this->faker->sentence(),
            'commentable_id' => $post,
            'user_id' => User::inRandomOrder()->first(),
            'parent_id' => null,
            'commentable_type' => 'App/Models/Post',
        ];
    }
}
