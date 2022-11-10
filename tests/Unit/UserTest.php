<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Testing\Assert as PHPUnit;
// use PHPUnit\Framework\TestCase; // ! Replaced with Tests\TestCase for this testing.
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_notes()
    {
        $user = User::factory()->create();
        PHPUnit::assertInstanceOf(EloquentCollection::class, $user->notes);
    }
}
