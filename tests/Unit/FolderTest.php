<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase; // ! Replaced with Tests\TestCase for this testing.
use Tests\TestCase;
use App\Models\Folder;
use App\Models\Note;
use App\Models\User;

class FolderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_it_has_a_path(){
        $folder = Folder::factory()->create();
        $this->assertEquals('/folders/' . $folder->slug, $folder->path());
    }

    /** @test */
    public function test_it_belongs_to_a_user(){
        $folder = Folder::factory()->create();
        $this->assertInstanceOf(User::class, $folder->user);
    }

    // /** @test */
    // public function test_it_has_many_notes(){
    //     $note = Note::factory()->create();
    //     $this->assertInstanceOf(Folder::class, $folder->note);
    // }

    /** @test */
    public function test_it_can_add_a_note(){
        $folder = Folder::factory()->create(['user_id' => 1]);

        $folder->addNote([
            'user_id' => 1,
            'title' => 'Test title',
            'description' => 'Test description']);

        $this->assertCount(1, $folder->notes);
    }

    public function test_it_can_add_a_task(){
        $this->withoutExceptionHandling();

        $folder = Folder::factory()->create();

        $folder->addTask('Test task');

        $this->assertCount(1, $folder->tasks);
    }
}
