<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marche;
use App\Models\Document;
use App\Models\Avis;
use Illuminate\Support\Facades\Auth;

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
        $documents = Document::where('type_document','aao')->get()->take(6)->sortDesc();
        return view ('more_informations', ['mores' => $mores , 'marche' => $marche ,]);
    }

    // affichage des avis dans l'onglet avis d'appel d'offres
    public function avis (){
        $documents = Document::where('type_document','aao')->get()->sortDesc();


        $daos=Document::where('type_document','dao')->get()->sortDesc();

        return view ('avis',['documents' => $documents,'daos'=>$daos]);
    }

    // telechargement d'un avis

    public function avis_download ($avis){
        $doc=Document::where('id',$avis)->get()->first();


        $doc_name=$doc->doc_path;


        $link=$doc->doc_path;

        $headers = array(
            'Content-Type: application/pdf',
          );


        return response()->download(public_path("documents/".$link), $doc_name,$headers);
    }

    // retrait d'un dossier d'appel d'offres

    public function download_dao ($dao){
        $doc=Document::where('id',$dao)->get()->first();


        $doc_name=$doc->doc_path;

        $link=$doc->doc_path;

        $headers = array(
            'Content-Type: application/pdf',
          );

        return response()->download(public_path("documents/".$link), $doc_name,$headers);
    }

}
