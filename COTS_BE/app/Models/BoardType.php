<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardType extends Model
{
    protected $table = 'board_types';
    protected $fillable = [
        'name',
        'description',
    ];
}
