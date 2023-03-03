<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Folder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'folder_id' => function(){
                return Folder::factory()->create()->id;
            },
            'body' => $this->faker->sentence,
            'due_date' => $this->faker->dateTimeBetween('1 day', '+2 week')
        ];
    }
}
