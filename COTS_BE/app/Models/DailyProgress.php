<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyProgress extends Model
{
    protected $table = 'daily_progress';

    // Các cột cho phép gán dữ liệu hàng loạt
    protected $fillable = [
        'task_id',
        'user_id',
        'date',
        'hours_worked',
        'progress_percentage',
        'notes',
    ];

    // Quan hệ với Task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
