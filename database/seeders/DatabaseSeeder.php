<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        \App\Models\Folder::Factory(3)->create(['user_id' => 1]);
        \App\Models\Note::Factory(3)->create(['user_id' => 1, 'folder_id' => 2]);
        \App\Models\Task::Factory(2)->create(['user_id' => 1, 'folder_id' => 2]);
        \App\Models\Task::Factory(5)->create(['user_id' => 1, 'folder_id' => 3]);
    }
}
