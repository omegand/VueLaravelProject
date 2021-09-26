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
            'title' => 'Renginiai',
            'desc' => 'Apie kažką tikrai kalbama',
        ]);
        Topic::create([
            'title' => 'Konkursai',
            'desc' => 'Nepatinka man konkuruoti',
        ]);
    }
}
