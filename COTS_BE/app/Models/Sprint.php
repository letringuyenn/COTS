<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $table = 'sprints';

    protected $fillable = [
        'project_id',
        'name',
        'start_date',
        'end_date',
        'status_id',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
    