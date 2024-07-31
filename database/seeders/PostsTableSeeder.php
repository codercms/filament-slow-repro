<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        $post = Post::factory()->create([
            'author_id' => 1,
        ]);

        for ($i = 0; $i < 378; $i++) {
            PostComment::factory()->create([
                'author_id' => 1,
                'post_id' => $post->id,
                'comment' => "Comment #{$i}",
            ]);
        }
    }
}
