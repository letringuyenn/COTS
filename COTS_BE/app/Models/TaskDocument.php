<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDocument extends Model
{
   protected $table = 'task_documents';

    protected $fillable = [
        'task_id',
        'document_id',
        'attached_at',
        'attached_by',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function attachedBy()
    {
        return $this->belongsTo(User::class, 'attached_by');
    }
}
