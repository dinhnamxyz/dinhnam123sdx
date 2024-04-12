<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = 
        [
            ['title'=>"Hollywood's AI alarm bells",
            'plus'=>"OpenAI’s mysterious 'Feather'",
            'author_id'=>'2',
            'post_describe'=>'After seeing the mind-blowing capabilities of OpenAI’s Sora, the entertainment business is bracing for impact. <br> <br>
            Hollywood mogul Tyler Perry is going as far as slamming pause on a $800M film studio expansion — warning that an AI crisis is about to hit the industry. Let’s get into it…',
            ]
        ];

        foreach ($data as $postData) {
            Post::create($postData);
        }
    }
}
