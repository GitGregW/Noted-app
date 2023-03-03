<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Folder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function slug(): Attribute
    {
        return new Attribute(
            set: fn ($value, $attributes) => strtolower(str_replace(' ', '-',$attributes['name'])),
        );
    }

    public function path(){
        return "/folders/{$this->slug}";
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function addNote($note){
        return $this->notes()->create($note);
    }

    public function tasks(){
        return $this->hasMany(Task::class)
            ->orderBy("due_date");
    }

    public function addTask($task){
        return $this->tasks()->create($task);
    }

    public function completeTask($task){
        $task->completed = $task->completed ? 0 : 1;
        return $this->tasks()->save($task);
    }
}
