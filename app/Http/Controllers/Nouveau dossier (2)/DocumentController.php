<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marche;
use App\Models\Document;
use App\Models\Avis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste_dao()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_dao($marche)
    {
        $marches = Marche::where('user_id',Auth::user()->id)->get();
        $marche_current = $marche ;



        return view ('dao.create',['marches'=>$marches,'marche_current' => $marche_current]);
    }


    public function create_aao($marche){
        $marches = Marche::where('user_id',Auth::user()->id)->get();
        $marche_current = $marche ;
        return view ('aao.create',['marches'=>$marches,'marche_current' => $marche_current]);
    }

    // public function create_pv()
    // {
    //     $marches = Marche::where('user_id',Auth::user()->id)->get('id','intitule');

    //     return view ('dao.create',['marches'=>$marches]);
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_dao(Request $request)
    {


        $request->validate([
            'reference'      => 'required|string',
            'description'       => 'required',
            'dao_file'        => 'required',
            'marche_id' => 'required'

        ]);


        $select = Marche::where('id',$request->marche_id)->get('intitule')->first();

        $nomfichier=$select->reference.'-dossier_appel_d_offres';

        $doc = $request->file('dao_file');
        $docName = $nomfichier.'.'.$doc->getClientOriginalExtension();
        $doc->move(public_path().'/documents/', $docName);
        // $actualPath = '/documents/'.$docName;


            $document = new Document;
            $document->type_document="dao";
            $document->doc_path=$docName;
            $document->reference = $request->reference;
            $document->description = $request->description;
            $document->marche_id =  $request->marche_id;
            $document->save();

            session()->flash('message','Dossier d\'appel d\'offres enregistr?? avec succ??s');

            return redirect()->route('create_dao',['marche'=>$request->marche_id]);

    }


    public function store_aao(Request $request)
    {



        $request->validate([
            'reference'      => 'required|string',
            'aao_file'       => 'required',
            'date_limite'        => 'required',
            'date_ouverture' => 'required',
            'marche_id' => 'required',

        ]);

        $select = Marche::where('id',$request->marche_id)->get('reference')->first();

        $nomfichier=$select->reference.'-avis_appel_d_offres';

        $doc = $request->file('aao_file');
        $docName = $nomfichier.'.'.$doc->getClientOriginalExtension();
        $doc->move(public_path().'/documents/', $docName);
        $actualPath = $docName;



        $document = new Document;
        $document->type_document="aao";
        $document->doc_path=$docName;
        $document->reference = $request->reference;
        $document->date_limite = $request->date_limite;
        $document->date_ouverture = $request->date_ouverture;
        $document->meet_link = null;
        $document->description = $request->description;
        $document->marche_id =  $request->marche_id;
        $document->save();

        session()->flash('message','Avis d\'appel d\'offres enregistr?? avec succ??s');

            return redirect()->route('create_aao',['marche'=>$request->marche_id]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_document($document){

        $doc=Document::where('id',$document)->get('doc_path')->first();

         $link=$doc->doc_path;

        return response()->file(public_path("documents/".$link));
    }

    public function download_document($document){
        $doc=Document::where('id',$document)->get()->first();

        $marche= Marche::where('id',$doc->marche_id)->get('intitule')->first();

        $doc_name=$doc->type_document.$marche->intitule;

        $link=$doc->doc_path;


        return response()->download(public_path("documents/".$link), $doc_name);
    }


    public function meeting_create($avis){
        $tmp=Document::where('id',$avis)->get()->first();

        $marche=Marche::where('id',$tmp->marche_id)->get()->first();


        $date=Avis::where('document_id',$avis)->get()->first();


        return view('meeting.create',['link'=>$date,'marche'=>$marche]);
    }

    public function meeting_store (Request $request){


        $request->validate([
            'lien'      => 'required',

        ]);


        $link=Avis::find($request->avis_id);

        $link->meet_link=$request->lien;
        $link->save();

        session()->flash('message',"Reunion d'ouverture planifi?? avec succes");

         return redirect()->route('show_marche',['id'=>$request->marche]);




    }

}
