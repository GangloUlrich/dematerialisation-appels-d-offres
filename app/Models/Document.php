<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'type_document',
        'description',
        'doc_path',
        'date_limite',
        'date_ouverture',
        'marche_id',
        'meet_link'
    ];

    public function marche()
    {
        return $this->belongsTo(Marche::class);
    }
}
