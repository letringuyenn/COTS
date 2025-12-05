<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssignee extends Model
{
    protected $table = 'task_assignees';

    protected $fillable = [
        'task_id',
        'user_id',
        'assigned_at',
        'assigned_by',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
