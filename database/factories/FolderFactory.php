<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Folder>
 */
class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(3, true);
        
        return [
            'user_id' => function(){
                return User::factory()->create()->id;
            },
            'name' => $name,
            'slug' => strtolower(str_replace(' ', '-',$name)),
        ];
    }
}
