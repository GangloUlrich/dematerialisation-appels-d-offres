<?php

use App\User;
use App\Models\Piecefourni;
use App\Models\Note;
use Carbon\Carbon;
use App\Models\Document;
use App\Models\Marche;

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

if (!function_exists("formatdate")) {

	function formatdate($dat){
        
        $date = Carbon::parse($dat)->format('Y-m-d H:i');
        return $date;
            
    }
    
    
}

if (!function_exists("compareDate")) {

	function compareDate($dat){
        
        $today = Carbon::now();
        $dat =Carbon::parse($dat);
        $result = $dat->greaterThanOrEqualTo($today);
        return $result;
            
    }
    
    
}

if (!function_exists("limite")) {

	function limite($dat){
        
        $aao = Document::where(['marche_id' => $dat , 'type_document'=> 'aao'])->first();
        $today = Carbon::now();
        $date =Carbon::parse($aao->date_limite);
        $result = $date->greaterThanOrEqualTo($today);
        return $result;
            
    }
    
    
}

if (!function_exists("limiteS")) {

	function limiteS($dat){
        $dao = Document::where(['id' => $dat])->first(); 
        $aao = Document::where(['marche_id' => $dao->marche_id , 'type_document'=> 'aao'])->first();
        $today = Carbon::now();
        $date =Carbon::parse($aao->date_limite);
        $result = $date->greaterThanOrEqualTo($today);
        return $result;
            
    }
    
    
}


if (!function_exists("ouverture")) {

	function ouverture($dat){
       
        $aao = Document::where(['marche_id' => $dat , 'type_document'=> 'aao'])->first();
        $today = Carbon::now();
        $date =Carbon::parse($aao->date_ouverture);
        $result = $date->equalTo($today);
        return $result;
            
    }
    
    
}