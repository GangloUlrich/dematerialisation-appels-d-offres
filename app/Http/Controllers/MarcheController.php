<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


use App\Models\Marche;
use App\Models\Avis;
use App\Models\Document;
use App\Models\Critere;
use App\Models\Pieceàfournir;
use App\Models\User;
use App\Models\Retrait;
use App\Models\Soumission;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $marches = Marche::where('user_id', Auth::user()->id)->get();
        return view('marches.liste', ['marches' => $marches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $request->validate([
            'reference'      => 'required|string',
            'intitule'       => 'required|string',
            'montant'        => 'required|min:6|integer',
            'type_marche'    => 'required',
            'mode_passation' => 'required',
            'type_selection' => 'required|string',
            'type_source'    => 'required',
            // 'type_organe'    => 'required',
            'lot'            => 'required',

        ]);


        if ($request->lot == 1) {

            $request->validate([
                'nbr_lot' => 'required'
            ]);
        }





        $marche = new Marche;

        $marche->reference = $request->reference;
        $marche->intitule  = $request->intitule;
        $marche->montant   = $request->montant;
        $marche->type_marche = $request->type_marche;
        $marche->mode_passation = $request->mode_passation;
        $marche->type_source = $request->type_source;
        $marche->type_selection = $request->type_selection;
        $marche->type_organe = "CCMP";
        $marche->lot = $request->lot;
        $marche->nbr_lot = $request->nbr_lot;
        $marche->user_id = $request->user_id;
        $marche->save();

        session()->flash('reponse', 'Marché enregistré avec success ');

        return redirect()->route('liste_marche');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marche = Marche::find($id);



        $stat_docs=Document::where('marche_id',$marche->id)->count();

        $stat_critere=Critere::where('marche_id',$marche->id)->count();

        $stat_piece=Pieceàfournir::where('marche_id',$marche->id)->count();



        $documents = Document::where(['marche_id' => $marche->id])->get();


        $criteres=Critere::where('marche_id',$marche->id)->get();

        $pieces=Pieceàfournir::where('marche_id',$marche->id)->get();

        $aao=Document::where(['marche_id' => $marche->id,'type_document'=>'aao'])->get()->first();

        $dao = Document::where(['marche_id'=>$marche->id,'type_document'=>"dao"])->get()->first();

        $retraits = Retrait::where('document_id',$dao->id)->get();

        $soumissions = Soumission::where('marche_id',$marche->id)->get();


        return view('marches.show',[

            'marche'=>$marche,
            'documents' =>$documents,
            'criteres' => $criteres,
            'pieces' => $pieces,
            'stat_docs' => $stat_docs,
            'stat_critere' => $stat_critere,
            'stat_piece' => $stat_piece,
            'retraits' => $retraits,
            'soumissions' => $soumissions

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marche = Marche::find($id);

        return view("marches.edit", ['marche' => $marche]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reference'      => 'required|string',
            'intitule'       => 'required|string',
            'montant'        => 'required|min:6|integer',
            'type_marche'    => 'required',
            'mode_passation' => 'required',
            'type_selection' => 'required|string',
            'type_source'    => 'required',
            'type_organe'    => 'required',
            'lot'            => 'required',

        ]);


        if ($request->lot == 1) {

            $request->validate([
                'nbr_lot' => 'required'
            ]);
        }




        $marche = Marche::find($id);

        $marche->reference = $request->reference;
        $marche->intitule  = $request->intitule;
        $marche->montant   = $request->montant;
        $marche->type_marche = $request->type_marche;
        $marche->mode_passation = $request->mode_passation;
        $marche->type_source = $request->type_source;
        $marche->type_selection = $request->type_selection;
        $marche->type_organe = $request->type_organe;
        $marche->lot = $request->lot;
        $marche->nbr_lot = $request->nbr_lot;
        $marche->user_id = $request->user_id;
        $marche->save();

        session()->flash('reponse', 'Marché modifié avec success');

        return redirect()->route('liste_marche');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marche = Marche::destroy($id);

        return redirect()->route('liste_marche');
    }
}
