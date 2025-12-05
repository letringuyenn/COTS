<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserScrum extends Model
{
    protected $table = 'users_scrum';

    protected $fillable = [
        'name',
        'email',
        'password',
        'system_role_id',
        'status_id',
        'email_verified_at',
    ];

    public function systemRole()
    {
        return $this->belongsTo(SystemRole::class, 'system_role_id');
    }

    public function status()
    {
        return $this->belongsTo(UserStatuses::class, 'status_id');
    }
}
