<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\User;

class NotesTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    //** @test */
    public function test_guests_cannot_manage_notes(){
        $note = Note::factory()->create();
        $this->get('/notes')->assertRedirect('login');
        $this->get('/notes/create')->assertRedirect('login');
        $this->get($note->path())->assertRedirect('login');
        $this->post('/notes', $note->toArray())->assertRedirect('login');
        
    }

    //** @test */
    public function test_a_user_can_create_a_note()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/notes/create')->assertStatus(200);

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
    public function test_a_user_can_view_their_note(){
        
        $this->be(User::factory()->create());

        $this->withoutExceptionHandling();

        $note = Note::factory()->create(['user_id' => Auth::User()->id]);

        $this->get($note->path())
            ->assertSee($note->title)
            ->assertSee($note->description);
    }

    //** @test */
    public function test_an_authenticated_user_cannot_view_a_note_of_others(){
        
        $this->be(User::factory()->create());

        // $this->withoutExceptionHandling();

        $note = Note::factory()->create();

        $this->get($note->path())->assertStatus(403);
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
