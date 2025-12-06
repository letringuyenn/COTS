<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkspaceRole extends Model
{
    protected $table = 'workspace_roles';

    protected $fillable = [
        'name',
        'description',
    ];
}
