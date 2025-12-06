<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    // Các cột cho phép gán dữ liệu hàng loạt
    protected $fillable = [
        'title',
        'description',
        'priority_id',
        'status_id',
        'estimated_hours',
        'actual_hours',
        'start_date',
        'due_date',
        'completed_at',
        'approved_at',
        'approved_by',
        'board_id',
        'created_by',
    ];

    // Quan hệ với Priority
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }

    // Quan hệ với TaskStatus
    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    // Quan hệ với User (người duyệt task)
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Quan hệ với Board
    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id');
    }

    // Quan hệ với User (người tạo task)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
