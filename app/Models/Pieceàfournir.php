<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieceàfournir extends Model
{
    use HasFactory;

   protected  $table = "piecesnecessaires";

    protected $fillable = [
        'intitule',
        'eliminatoire',
        'marche_id'
     ];

     
     
     public function marche()
    {
        return $this->belongsTo(Marche::class);
    }


}
