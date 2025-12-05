<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'priority_id',
        'status_id',
        'estimated_hours',
        'actual_hours',
        'start_date',
        'due_date',
        'completed_at',
        'approved_at',
        'approved_by',
        'user_story_id',
        'created_by',
    ];

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function userStory()
    {
        return $this->belongsTo(UserStory::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
