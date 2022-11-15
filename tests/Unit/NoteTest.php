<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase; // ! Replaced with Tests\TestCase for this testing.
use Tests\TestCase;
use App\Models\Note;
use App\Models\User;

class NoteTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_it_has_a_path(){
        $note = Note::factory()->create();
        $this->assertEquals('/notes/' . $note->id, $note->path());
    }

    public function test_it_belongs_to_a_user(){
        $note = Note::factory()->create();
        $this->assertInstanceOf(User::class, $note->user);
    }
}
