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
                'body' => 'Nesiseka man išviso',
                'title' => 'Renginių postas1',
                'topicid' => '1',
                'userid' => '1',
            ]
        );
        Post::create(
            [
                'body' => 'O gal sekasi?',
                'title' => 'Konkursu postas1',
                'topicid' => '2',
                'userid' => '1'
            ]
        );
        Post::create(
            [
                'body' => 'Nesiseka man išviso',
                'title' => 'Renginių postas2',
                'topicid' => '1',
                'userid' => '2',
            ]
        );
        Post::create(
            [
                'body' => 'O gal sekasi?',
                'title' => 'Konkursu postas2',
                'topicid' => '2',
                'userid' => '2'
            ]
        );
    }
}
