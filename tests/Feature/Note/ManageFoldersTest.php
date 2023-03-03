<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Folder;

class ManageFoldersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    //** @test */
    public function test_guests_cannot_manage_folders(){
        $folder = Folder::factory()->create();
        $this->get('/folders')->assertRedirect('login');
        $this->get('/folders/create')->assertRedirect('login');
        $this->get($folder->path())->assertRedirect('login');
        $this->post('/folders', $folder->toArray())->assertRedirect('login');
    }

    //** @test */
    public function test_a_user_can_create_a_folder()
    {
        $this->signIn();

        $this->get('folders/create')->assertStatus(200);

        $attributes = [
            'name' => 'Test Folder',
            'user_id' => Auth::User()->id
        ];

        $this->post('/folders', $attributes)->assertRedirect('/notes');

        $this->assertDatabaseHas('folders', $attributes);
        $this->assertDatabaseHas('folders', [
            'slug' => strtolower(str_replace(' ', '-',$attributes['name'])),
        ]);
    }

    //** @test */
    public function test_a_user_can_view_their_folder(){
        
        $this->signIn();

        $folder = Folder::factory()->create(['user_id' => Auth::User()->id]);

        $this->get($folder->path())
            ->assertSee($folder->name);
    }

    //** @test */
    public function test_an_authenticated_user_cannot_view_a_folder_of_others(){
        
        $this->signIn();

        $folder = Folder::factory()->create();

        $this->get($folder->path())->assertStatus(403);
    }

    //** @test */
    public function test_a_folder_requires_a_name(){
        $this->signIn();
        $attributes = Folder::factory()->raw(['name' => '']);
        $this->post('/folders', $attributes)->assertSessionHasErrors('name');
    }
}
