<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    // Các cột cho phép gán dữ liệu hàng loạt
    protected $fillable = [
        'name',
        'type_id',
        'status_id',
        'start_date',
        'end_date',
        'workspace_id',
        'created_by',
    ];

    // Quan hệ với BoardType
    public function type()
    {
        return $this->belongsTo(BoardType::class, 'type_id');
    }

    // Quan hệ với BoardStatus
    public function status()
    {
        return $this->belongsTo(BoardStatus::class, 'status_id');
    }

    // Quan hệ với Workspace
    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    // Quan hệ với User (người tạo board)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Nếu sau này có bảng Task liên kết với Board
    public function tasks()
    {
        return $this->hasMany(Task::class, 'board_id');
    }
}
