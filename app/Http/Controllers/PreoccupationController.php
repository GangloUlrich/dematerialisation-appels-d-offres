<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marche;
use App\Models\Document;
use App\Models\Avis;
use App\Models\Retrait;
use Illuminate\Support\Facades\Auth;
use Response;

class PreoccupationController extends Controller
{
    public function nouvelleQuestion($user,$marche){

        $marches = Retrait::where('user_id',$user)->get();
        $marche_current=Marche::find($marche);
        return view('questions.create',['marches'=>$marches,'marche_current'=>$marche_current]);
    }
}
