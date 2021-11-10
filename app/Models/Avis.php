<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_publication',
        'date_limite',
        'date_ouverture',
        'meet_link',
        'document_id'
    ];
}
