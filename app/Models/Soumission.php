<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soumission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cout',
        'date_soumission',
        'details',
        'total_note',
        'decision',
        'observations',
        'lot',
        'user_id',
        'marche_id',

    ];


    // public function marche()
    // {
    //     return $this->hasMany(Marche::class);
    // }

    public function marche()
    {
        return $this->belongsTo(Marche::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
