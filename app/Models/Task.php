<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path($folder){
        return "{$folder}/tasks/{$this->id}";
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function folder(){
        return $this->belongsTo(Folder::class);
    }

    public function timeToDueDate($date){
        $due_date = new DateTime($date);
        $now = new DateTime(date("Y-m-d H:i:s",strtotime("now")));
        $interval = $due_date->diff($now);

        return $interval->format('%R%a days');
    }
}
