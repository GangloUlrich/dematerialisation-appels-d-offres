<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'intitule',
        'montant',
        'type_marche',
        'mode_passation',
        'type_source',
        'type_selection',
        'lot',
        'nbr_lot',
        'attributaire',
        'user_id',
        'total_note',

    ];


    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fichiers()
    {
        return $this->hasMany(Pieceàfournir::class);
    }

    public function criteres()
    {
        return $this->hasMany(Critere::class, 'marche_id', 'id');
    }


}
