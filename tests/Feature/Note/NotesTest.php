<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Note;
use App\Models\User;

class NotesTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    //** @test */
    public function only_authenticated_users_can_create_notes(){
        // $this->withoutExceptionHandling();

        $attributes = Note::factory()->raw();
        $this->post('/notes', $attributes)->assertRedirect('login');
    }

    //** @test */
    public function test_a_user_can_create_a_note()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => $user['id']
        ];

        // $attributes = Note::factory()->raw();

        $this->post('/notes', $attributes)->assertRedirect('/notes');

        $this->assertDatabaseHas('notes', $attributes);

        $this->get('/notes')->assertSee($attributes['title']);
    }

    //** @test */
    public function test_a_user_can_view_a_note(){
        // $this->withoutExceptionHandling();

        $note = Note::factory()->create();
        $this->get($note->path())
            ->assertSee($note->title)
            ->assertSee($note->description);
    }

    //** @test */
    public function test_a_note_requires_a_title(){
        $this->actingAs(User::factory()->create());
        $attributes = Note::factory()->raw(['title' => '']);
        $this->post('/notes', $attributes)->assertSessionHasErrors('title');
    }

    //** @test */
    public function test_a_note_requires_a_description(){
        $this->actingAs(User::factory()->create());
        $attributes = Note::factory()->raw(['description' => '']);
        $this->post('/notes', $attributes)->assertSessionHasErrors('description');
    }
}
