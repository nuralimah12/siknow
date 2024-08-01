<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'departemen';

    protected $fillable = [
        'id_divisi',
        'name',
        'created_at',
        'updated_at'
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id');
    }
    
}
