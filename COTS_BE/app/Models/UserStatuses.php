<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatuses extends Model
{
    protected $table = 'user_statuses';

    protected $fillable = [
        'name',
        'description',
    ];
}
