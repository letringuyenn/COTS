<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklists';

    protected $fillable = [
        'task_id',
        'title',
        'created_by',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
