<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardStatus extends Model
{
    protected $table = 'board_statuses';

    protected $fillable = [
        'name',
        'description',
    ];
}
