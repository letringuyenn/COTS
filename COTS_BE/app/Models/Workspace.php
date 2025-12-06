<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $table = 'workspaces';
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    // Quan hệ với User (người tạo workspace)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function boards()
    {
        return $this->hasMany(Board::class, 'workspace_id');
    }
}
