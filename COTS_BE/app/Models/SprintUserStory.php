<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SprintUserStory extends Model
{
    protected $table = 'sprint_user_stories'; 
    protected $fillable = [
        'sprint_id',
        'user_story_id',
        'added_at',
    ];

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    public function userStory()
    {
        return $this->belongsTo(UserStory::class, 'user_story_id');
    }
}
