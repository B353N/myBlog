<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Database\Factories\ReplyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        # Seed the `roles` table
        $this->call(RoleSeeder::class);

        # Seed the `users` table
        $this->call(UserSeeder::class);

        # Create 10 Categories
        Category::factory(10)->create();

        # Create 100 Posts
        $posts = Post::factory(100)->create();

        # Create 500 Comments
        Comment::factory(500)->create();

        # Create 100 Reply on comments
        Comment::factory(100)->create();

        # Create 100 Tags
        Tag::factory(100)->create();

        # Attach 3 Tags to each Post
        foreach ($posts as $post) {
            $post->tags()->attach(Tag::inRandomOrder()->limit(3)->pluck('id')->toArray());
            # Generate Image for each Post
            $post->image()->save(Image::factory()->make());
        }

    }
}
