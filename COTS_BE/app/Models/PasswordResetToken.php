<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_tokens';

    // Khóa chính là email (không phải id)
    protected $primaryKey = 'email';
    public $incrementing = false; // Vì email không phải kiểu auto increment
    protected $keyType = 'string'; // Kiểu dữ liệu của khóa chính

    protected $fillable = [
        'email',
        'token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
