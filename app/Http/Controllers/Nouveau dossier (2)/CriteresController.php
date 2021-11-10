<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Critere;
use App\Models\Pieceàfournir;
use App\Models\Marche;
use Illuminate\Support\Facades\Auth;

class CriteresController extends Controller
{
    public function create_critere(){

        $marches = Marche::where('user_id',Auth::user()->id)->get();

        return view ('criteres.create',['marches'=>$marches]);
    }




    public function store_critere(Request $request){

        $request->validate([
            'intitule'      => 'required|string',
            'note'       => 'required|integer',
            'marche_id' =>'required',
        ]);

        $critere = new Critere;
        $critere->intitule = $request->intitule;
        $critere->note=$request->note;
        $critere->marche_id=$request->marche_id;
        $critere->save();

        session()->flash('message','Cet critere a été ajouté avec success !');

        return redirect()->route('create_critere');


    }


    // CRUD pieces à  fournir


    public function create_piece(){

        $marches = Marche::where('user_id',Auth::user()->id)->get();

        return view ('piecesnecessaires.create',['marches'=>$marches]);
    }


    public function store_piece(Request $request){

        $request->validate([
            'intitule'      => 'required|string',
            'eliminatoire'       => 'required',
            'marche_id' =>'required',
        ]);

        $piece = new Pieceàfournir;
        $piece->intitule = $request->intitule;
        $piece->eliminatoire=$request->eliminatoire;
        $piece->marche_id=$request->marche_id;
        $piece->save();

        session()->flash('message','piece ajouté avec success !');

        return redirect()->route('create_piece');


    }



}



