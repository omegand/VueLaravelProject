<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'title' => 'Events',
            'desc' => 'Express your recent happenings!',
        ]);
        Topic::create([
            'title' => 'Paranoia',
            'desc' => 'If you are going insane, this is the right place.',
        ]);
    }
}
