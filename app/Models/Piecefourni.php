<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piecefourni extends Model
{
    use HasFactory;

    protected  $table = "piecesfournis";

    protected $fillable = [
        'id',
        'doc_path',
        'validite',
        'observations',
        'date_soumission',
        'soumission_id',
        'piecenecessaire_id'
      
    ];


    public function soumission()
    {
        return $this->belongsTo(Soumission::class);
    }

   public function file(){
     return  $this->belongsTo(Pieceàfournir::class ,'piecenecessaire_id','id');
   }
}
