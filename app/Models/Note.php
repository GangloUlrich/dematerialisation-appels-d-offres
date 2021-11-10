<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = "notes";

    protected $fillable = [
        'id',
        'note_attribue',
        'soumission_id',
        'critere_id',
        
     ];

     public function soumission()
    {
        return $this->belongsTo(Soumission::class);
    }

    public function critere()
    {
        return $this->belongsTo(Critere::class);
    }
    
}