<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
        [
            [
            'id_posts'=>'1',
            'license'=>'AI',
            'title'=>'🏆 Anthropic releases Claude 3 and new benchmarks',
            'image_path'=>'https://media.beehiiv.com/cdn-cgi/image/fit=scale-down,format=auto,onerror=redirect,quality=80/uploads/asset/file/1c69325c-fd37-4167-b559-95e19561fb8c/claud3.jpg?t=1709579812',
            'image_source'=>'Anthropic',
            'content'=>'<p><strong>The Rundown:</strong> Anthropic just announced the release of its next-generation Claude 3 model family, with the top-tier ‘Opus’ version outperforming top models like GPT-4 and Gemini Ultra across major benchmarks.&nbsp;<br><br><strong>The details:</strong>&nbsp;<br><br>The Claude 3 lineup consists of Opus, Sonnet, and Haiku, each offering different levels of capability, speed, and cost.&nbsp;<br><br>Opus outperforms GPT-4 and Gemini Ultra on benchmarks, including expert knowledge, reasoning, coding, and mathematics.&nbsp;<br><br>Claude 3 also claims new vision capabilities on par with leading models like GPT-4V.&nbsp;<br><br>Opus displays a near-perfect 99% recall ability on processing long context prompts.&nbsp;<br><br>All three models boast a 200k context window (with the ability to handle as high as 1M).&nbsp;<br><br>Claude has removed the waitlist for API usage, allowing builders to immediately integrate the enhanced new models.&nbsp;<br><br><strong>Why it matters:</strong><br>Gemini and ChatGPT may have gotten all the headlines in 2024, but Claude just came out of nowhere to claim the top of the AI benchmark leaderboards. We’ll be sharing the results from The Rundown’s Claude 3 vs. GPT-4 tests shortly — stay tuned!&nbsp;<br><br>You can try Claude 3 or access the API here.</p>',
            ],
            [
            'id_posts'=>'1',
            'license'=>'AI',
            'title'=>'🏆 Anthropic releases Claude 3 and new benchmarks',
            'image_path'=>'https://media.beehiiv.com/cdn-cgi/image/fit=scale-down,format=auto,onerror=redirect,quality=80/uploads/asset/file/1c69325c-fd37-4167-b559-95e19561fb8c/claud3.jpg?t=1709579812',
            'image_source'=>'Anthropic',
            'content'=>'<p><strong>The Rundown:</strong> Anthropic just announced the release of its next-generation Claude 3 model family, with the top-tier ‘Opus’ version outperforming top models like GPT-4 and Gemini Ultra across major benchmarks.&nbsp;<br><br><strong>The details:</strong>&nbsp;<br><br>The Claude 3 lineup consists of Opus, Sonnet, and Haiku, each offering different levels of capability, speed, and cost.&nbsp;<br><br>Opus outperforms GPT-4 and Gemini Ultra on benchmarks, including expert knowledge, reasoning, coding, and mathematics.&nbsp;<br><br>Claude 3 also claims new vision capabilities on par with leading models like GPT-4V.&nbsp;<br><br>Opus displays a near-perfect 99% recall ability on processing long context prompts.&nbsp;<br><br>All three models boast a 200k context window (with the ability to handle as high as 1M).&nbsp;<br><br>Claude has removed the waitlist for API usage, allowing builders to immediately integrate the enhanced new models.&nbsp;<br><br><strong>Why it matters:</strong><br>Gemini and ChatGPT may have gotten all the headlines in 2024, but Claude just came out of nowhere to claim the top of the AI benchmark leaderboards. We’ll be sharing the results from The Rundown’s Claude 3 vs. GPT-4 tests shortly — stay tuned!&nbsp;<br><br>You can try Claude 3 or access the API here.</p>',
            ]
        ];
        foreach ($data as $contentData) {
            Content::create($contentData);
        }
    }
}
