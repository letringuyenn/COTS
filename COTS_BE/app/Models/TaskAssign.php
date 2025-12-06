<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssignee extends Model
{
    protected $fillable = [
        'task_id',
        'user_id',
        'assigned_at',
        'assigned_by',
    ];

    // Quan hệ với Task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    // Quan hệ với User (người được giao task)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Quan hệ với User (người giao task)
    public function assigner()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
