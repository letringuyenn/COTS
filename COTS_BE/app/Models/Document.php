<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'external_url',
        'type_id',
        'category_id',
        'created_by',
    ];

    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
