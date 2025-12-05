<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $table = 'checklist_items';

    protected $fillable = [
        'checklist_id',
        'description',
        'is_completed',
        'completed_by',
        'completed_at',
        'created_by',
    ];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
