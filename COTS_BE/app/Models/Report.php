<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'name',
        'type_id',
        'file_path',
        'workspace_id',
        'sprint_id',
        'generated_by',
        'generated_at',
    ];

    public function type()
    {
        return $this->belongsTo(ReportType::class, 'type_id');
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    public function generator()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
