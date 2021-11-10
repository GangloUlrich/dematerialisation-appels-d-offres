<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Models\User;
use App\Models\Marche;
use App\Models\Document;
use App\Models\Soumission;
use App\Models\Piecefourni;
use App\Models\Pieceàfournir;
use App\Models\Critere;
use App\Models\Note;

use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function ouvertureBid($soumission){
        $data = Soumission::find($soumission);
        $pieces = Pieceàfournir::where('marche_id',$data->marche()->first()->id)->get();
        return view('evaluations.ouverture',['data'=>$data,'pieces'=>$pieces]);
    }


    public function EvaluationBid($soumission){

        $data = Soumission::find($soumission);
        $pieces = Pieceàfournir::where('marche_id',$data->marche()->first()->id)->get();
        $criteres = Marche::find($data->marche()->first()->id)->criteres()->get();
        
        return view('evaluations.evaluation',['data'=>$data,'pieces'=>$pieces,'criteres'=>$criteres]);

    }

    public function StoreEvaluationBid(Request $request){
        
        $notesrequest= $request->notes;
        $criteresrequest = $request->criteres;

            foreach($notesrequest as $key=>$note)
            {
                $noteattrib= new Note();
                $noteattrib->soumission_id=$request->soumission;
                $noteattrib->note_attribue=$note;
                $noteattrib->critere_id=$criteresrequest[$key];
                $noteattrib->save();
            }

            $data = Soumission::find($request->soumission);
            $pieces = Pieceàfournir::where('marche_id',$data->marche()->first()->id)->get();
            $criteres = Marche::find($data->marche()->first()->id)->criteres()->get();

         return view('evaluations.view',['data'=>$data,'pieces'=>$pieces,'criteres'=>$criteres]);
    }


}
