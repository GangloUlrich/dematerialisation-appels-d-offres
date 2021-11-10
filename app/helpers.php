<?php

use App\User;
use App\Models\Piecefourni;
use App\Models\Note;

// On vérifie si la fonction n'existe pas déjà
if (!function_exists("hasProvidedFile")) {

	function hasProvidedFile($soumissionId,$file){

            return Piecefourni::query()->where('piecenecessaire_id', '=', $file->id)
            ->where('soumission_id','=',$soumissionId)
            ->exists();
    }
    
    
}

if (!function_exists("getProvidedNote")) {

	function getProvidedNote($soumissionId,$note){

            return Note::query()->where('critere_id', '=', $note->id)
            ->where('soumission_id','=',$soumissionId)
            ->first('note_attribue')->note_attribue;
            
            
    }
    
    
}
