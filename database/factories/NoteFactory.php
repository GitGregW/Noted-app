<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Note::class;

    public function definition()
    {
        return [
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'folder_id' => function(){
                return Folder::factory()->create()->id;
            },
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph
        ];
    }
}
