<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marche;
use App\Models\Avis;
use App\Models\Document;
use App\Models\Critere;
use App\Models\Pieceàfournir;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $marches=Marche::where('user_id',Auth::user()->id)->get();



            return view('dashboard',['marches'=>$marches]);
    }
}
