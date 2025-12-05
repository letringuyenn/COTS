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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
