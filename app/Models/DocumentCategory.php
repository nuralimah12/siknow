<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
   
    use HasFactory;
    public $timestamps = true;
    protected $table = 'document_category';

    protected $fillable = [
        'category',
        'created_at',
        'updated_at'
    ];
}
