<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    protected $table = 'document_categories';

    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(DocumentCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(DocumentCategory::class, 'parent_id');
    }
}
