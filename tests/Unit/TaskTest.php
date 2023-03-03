<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase; // ! Replaced with Tests\TestCase for this testing.
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;

class TaskTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_it_has_a_path(){
        $task = Task::factory()->create();
        $this->assertEquals('/tasks/' . $task->id, $task->path());
    }

    public function test_it_belongs_to_a_user(){
        $task = Task::factory()->create();
        $this->assertInstanceOf(User::class, $task->user);
    }

    public function test_due_date_is_formatted(){
        $newDate = date("Y-m-d H:i:s",strtotime("7 days"));

        $task = Task::factory()->create(['due_date' => $newDate]);

        $result = $task->timeToDueDate($newDate);
        // The test ends here. TBC Feature test for $result.
    }

    public function test_it_is_sorted_by_task_due_ascending(){
        
    }
}
