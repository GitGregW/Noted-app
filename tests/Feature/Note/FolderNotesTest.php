<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Folder;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class FolderNotesTest extends TestCase
{
    use RefreshDatabase;

     //** @test */
    public function test_a_folder_can_have_notes()
    {
        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $this->get($folder->path() . '/notes/create')->assertStatus(200);

        $attributes = [
            'user_id' => Auth::User()->id,
            'title' => 'Test title',
            'description' => 'Test description'
        ];

        $folder->addNote($attributes);

        $this->get($folder->path())->assertSee('Test description');
    }

     //** @test */
     public function test_a_folder_can_update_notes()
     {
         $this->withoutExceptionHandling();
 
         $this->signIn();
 
         $folder = Auth::User()->folders()->create(
             Folder::factory()->raw()
         );
 
         $note = $folder->addNote(Note::factory()->raw(['description' => 'Test Description']));

         $note->description = 'Test description CHANGED';

         $this->patch($folder->path() . '/notes/' . $note->id, $note->toArray());
 
         $this->get($folder->path())->assertSee('Test description CHANGED');
     }

    //** @test */
    public function test_a_note_requires_a_title(){
        $this->withoutExceptionHandling();
        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $attributes = Note::factory()->raw(['title' => '']);

        $this->post($folder->path() . '/notes', $attributes)->assertSessionHasErrors('title');
    }

    // //** @test */
    // public function test_a_note_requires_a_description(){
    //     $this->withoutExceptionHandling();
    //     $this->signIn();

    //     $folder = Auth::User()->folders()->create(
    //         Folder::factory()->raw()
    //     );

    //     $attributes = Note::factory()->raw(['description' => '']);

    //     $this->post($folder->path() . '/notes', $attributes)->assertSessionHasErrors('description');
    // }
}
