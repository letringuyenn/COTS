<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $table = 'user_stories';

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'story_point',
        'status_id',
        'created_by',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function creator()
    {
        return $this->belongsTo(UserScrum::class, 'created_by');
    }
}
