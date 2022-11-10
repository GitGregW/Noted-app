<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase; // ! Replaced with Tests\TestCase for this testing.
use Tests\TestCase;
use App\Models\Note;

class NoteTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function it_has_a_path(){
        $note = Note::factory()->create();
        $this->assertEquals('/notes/' . $note->id, $note->path());
    }
}
