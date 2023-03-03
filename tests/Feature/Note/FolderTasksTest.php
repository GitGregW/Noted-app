<?php

namespace Tests\Feature\Note;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class FolderTasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_folder_can_have_tasks()
    {
        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );
        
        $this->get($folder->path() . '/tasks/create')->assertStatus(200);

        $attributes = [
            'user_id' => Auth::User()->id,
            'body' => 'Test task'
        ];

        $folder->addTask($attributes);

        $this->assertDatabaseHas('tasks', $attributes);

        $this->get($folder->path())->assertSee('Test task');
    }

    //** @test */
    public function test_a_folder_can_update_tasks()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $task = $folder->addNote(Task::factory()->raw(['body' => 'Test Task']));

        $task->body = 'Test task CHANGED';

        $folder->updateTask($task);

        $this->get($folder->path())->assertSee('Test task CHANGED');
    }

    public function test_a_task_can_be_completed()
    {
        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $task = $folder->addTask(Task::factory()->raw());

        $this->assertDatabaseHas('tasks', ['completed' => 0]);

        $task->completed = 1;

        $folder->completeTask($task);

        $this->assertDatabaseHas('tasks', ['completed' => 1]);

        $folder->completeTask($task);

        $this->assertDatabaseHas('tasks', ['completed' => 0]);
    }

    public function test_a_task_can_have_a_due_date()
    {
        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $task = $folder->addTask(Task::factory()->raw());

        $this->assertDatabaseHas('tasks', ['due_date' => $task->due_date]);

        $newDate = date("Y-m-d H:i:s",strtotime("7 days"));

        $task->modifyDueDate($newDate);

        $this->assertDatabaseHas('tasks', ['due_date' => $newDate]);
    }

    public function test_a_task_is_sorted_by_due_date_ascending(){
        $this->withoutExceptionHandling();

        $this->signIn();

        $folder = Auth::User()->folders()->create(
            Folder::factory()->raw()
        );

        $tasks = Task::factory(8)->create([
            'user_id' => Auth::User()->id,
            'folder_id' => $folder->id
        ]);

        $this->assertDatabaseCount('tasks', 8);
        
        $ordered_tasks_body = $tasks->sortBy('due_date')->pluck('body');

        $this->get($folder->path())->assertSeeInOrder($ordered_tasks_body->all());
    }
}
