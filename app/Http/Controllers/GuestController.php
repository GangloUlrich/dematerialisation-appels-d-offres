<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marche;
use App\Models\Document;
use App\Models\Avis;
use App\Models\Retrait;
use Illuminate\Support\Facades\Auth;
use Response;
use Carbon\Carbon;

class GuestController extends Controller
{

    // affichage des avis dans à l'accueil de la page
    public function accueil(){
        $documents = Document::where('type_document','aao')->get()->take(6)->sortDesc();
        return view ('accueil',['documents' => $documents]);

    }


    // details d'un avis


    public function moreInfos($id){
        $marche = Marche::find($id);
        $mores = Document::where('marche_id', $id)->get();
        return view ('more_informations', ['mores' => $mores , 'marche' => $marche ,]);
    }



    // affichage des avis dans l'onglet avis d'appel d'offres
    public function avis (){
        $documents = Document::where('type_document','aao')->get()->sortDesc();

        $daos=Document::where('type_document','dao')->get()->sortDesc();

        return view ('avis',['documents' => $documents,'daos'=>$daos]);
    }

    
    // telechargement d'un avis

    public function downloadAvis ($avis){
        $show = Document::find($avis);
        $headers = array(
            'Content-Type: application/pdf',
          );
        return response()->download(public_path("documents/".$show->doc_path),$show->doc_path,$headers);
    }


    //display avis 

    public function displayAvis($avis){
        $show = Document::find($avis);
        $headers = array(
            'Content-Type: application/pdf',
          );
        
          return response()->file(public_path("documents/".$show->doc_path));
    }


    // retrait d'un dossier d'appel d'offres

    public function downloadDao ($user,$dao){
        $dossier=Document::find($dao);

        if($dossier->marche()->first()->user()->first()->id == $user){

            session()->flash('message',"Vous ne pouvez pas retirer un dossier d'appel d'offres que vous avez créé");
            return redirect()->route('consulter',['marche_id'=>$dossier->marche()->first()->id ]);

        }

        if($dossier->marche()->first()->user()->first()->type = "s_public"){    
            $today = Carbon::now()->format('Y-m-d');
            $retrait = new Retrait;
            $retrait->date_retrait = $today ;
            $retrait->document_id=$dao;
            $retrait->user_id=$user;
            $retrait->save();
    
            $headers = array(
                'Content-Type: application/pdf',
              );
    
            return response()->download(public_path("documents/".$dossier->doc_path), $dossier->doc_path,$headers);          

        }
        else
        {
        session()->flash('message',"Une structure publique ne postule pas aux appels d'offres");
            return redirect()->route('consulter',['marche_id'=>$dossier->marche()->first()->id ]);

        }

    
    }

}
