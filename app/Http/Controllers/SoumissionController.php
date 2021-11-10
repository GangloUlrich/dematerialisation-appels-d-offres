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
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;

class SoumissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    


    public function createForm($marche)
    {
        $marcheselectionne = Marche::find($marche);

        return view('soumissions.formtext',['marche'=>$marcheselectionne]);
       
    }


    public function endForm($marche)
    {
        $marcheselectionne = Marche::find($marche);

        $soumission = Soumission::where(['marche_id'=>$marcheselectionne->id,'user_id'=>Auth::user()->id])->get()->first();

        $pieces = Pieceàfournir::where('marche_id',$marche)->get();

        return view('soumissions.formfile',['marche'=>$marcheselectionne,'soumission'=>$soumission->id,'pieces'=>$pieces]);
       
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFormText(Request $request)
    {
        $request->validate([
            'cout'      => 'required|string',
            'details'       => 'required',
        ]);

        $startBid = new Soumission;
        $startBid->cout = $request->cout;
        $startBid->details=$request->details;
        $startBid->marche_id=$request->marche_id;
        $startBid->user_id=$request->user_id;
        $startBid->save();

        return redirect()->route('endBid',['marche'=>$request->marche_id]);
    }


    public function storeFormFile(Request $request)
    {

        $pieces= $request->assoc;


        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $key=>$file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/documents/', $name);  
                $file= new Piecefourni();
                $file->soumission_id=$request->soumission;
                $file->doc_path=$name;
                $file->piecenecessaire_id=$pieces[$key];
                $file->save();
            }
         }


         return redirect()->route('viewBid',['bid'=>$request->soumission]);

    }

    public function viewBid($soumission){

        $data = Soumission::find($soumission);
        $files = Piecefourni::where('soumission_id',$soumission)->get();
        $pieces = Pieceàfournir::where('marche_id',$data->marche()->first()->id)->get();
        return view('soumissions.viewbid',['data'=>$data,'files'=>$files,'pieces'=>$pieces]);

    }


    public function finalizeBid($soumission){
        $today = carbon::now()->format('Y-m-d');

        $data = Soumission::find($soumission);
        $data->statut = "soumis";
        $data->date_soumission = $today;
        $data->update();

        $details = Document::where(['marche_id'=>$data->marche()->first()->id, 'type_document'=> 'aao'])->get()->first();

        return view('soumissions.confirmation',['details'=>$details]);
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


    // $user = User::find(2);
    // $document = Document::find(3);
    // $a="fjrgjtkjrgjktrjghyt";
   
    // Mail::to($user->email)
    // ->send(new Email($document,$a));

    // return back()->withText("Message sussceed");
}
