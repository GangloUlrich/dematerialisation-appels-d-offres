<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critere extends Model
{
    use HasFactory;

    protected  $table = "criteres";

    protected $fillable = [
       'intitule',
       'note',
       'marche_id'
    ];


    public function marche()
    {
        return $this->belongsTo(Marche::class);
    }
}
