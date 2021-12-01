<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create(
            [
                'body' => 'Going from child, to childish, to childlike is only a matter of time.',
                'title' => 'Ramblings of the old',
                'topicid' => '1',
                'userid' => '1',
            ]
        );
        Post::create(
            [
                'body' => 'He had a wall full of masks so she could wear a different face every day.',
                'title' => 'Crazy mother',
                'topicid' => '1',
                'userid' => '1'
            ]
        );
        Post::create(
            [
                'body' => 'Separation anxiety is what happens when you cant find your phone.',
                'title' => 'My life',
                'topicid' => '2',
                'userid' => '2',
            ]
        );
        Post::create(
            [
                'body' => 'The father handed each child a roadmap at the beginning of the 2-day road trip and explained it was so they could find their way home.',
                'title' => 'The universe is telling me something',
                'topicid' => '2',
                'userid' => '2'
            ]
        );
    }
}
