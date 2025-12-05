<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{
    protected $table = 'daily_logs';

    protected $fillable = [
        'task_id',
        'user_id',
        'log_date',
        'hours_worked',
        'progress_percentage',
        'notes',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
