<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'sarunyss@gmail.com',
            'password' => Hash::make('password'),
            'admin' => true,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'neadmin@gmail.com',
            'password' => Hash::make('password'),
            'admin' => false,
        ]);
        $this->call(PostSeeder::class);
        $this->call(TopicSeeder::class);
    }
}
