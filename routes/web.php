<?php

use App\Http\Controllers\AdministratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CriteresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SoumissionController;
use App\Http\Controllers\PreoccupationController;
use App\Http\Controllers\EvaluationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// liste des routes visiteurs
Route::get("/koi", function(){ return view ('emails.meetmail');});
Route::get('/',[GuestController::class,'accueil'])->name('accueil');
Route::get('/avis',[GuestController::class,'avis'])->name('avis');
Route::get('/structures',[GuestController::class,'structure'])->name('structures');

Route::get('/avis/display/{avis}',[GuestController::class,'displayAvis'])->name('display_avis');
Route::get('/avis/download/{avis}',[GuestController::class,'downloadAvis'])->name('download_avis');
Route::get('/avis/more_informations/{marche_id}',[GuestController::class,'moreInfos'])->name('consulter');

Route::middleware(['auth'])->group(function () { 
Route::get('/retrait/dossier-d-appels-d-offres/{dao}',[GuestController::class,'downloadDao'])->name('download_dao');
});




// Route::get('/',function(){ return view('welcome');});
Route::get('/proces_verbaux', function () {
    return view('proces_verbaux');
})->name('proces');
Route::get('/proces_verbal_attribution_provisoire', function () {
    return view('pv_provisoire');
})->name('proces_attProvisoire');
Route::get('/proces_verbal_ouverture', function () {
    return view('pv_ouverture');
})->name('proces_ouverture');
Route::get('/proces_verbal_attribution_definitive', function () {
    return view('pv_definitive');
})->name('proces_attDefinitive');
Route::get('/inscription/structures/', function () {
    return view('auth.new_structure');
})->name('register_structure');
Route::get('/inscription/consultant_individuel/', function () {
    return view('auth.new_consultant');
})->name('register_consultant');

// ------------------------------------------------------------------------------------------------------------------------------------------
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';




Route::middleware(['create'])->group(function () {


    Route::get("/marches/nouveau", [MarcheController::class, 'create'])->name('create_marche');
    Route::get("/marches/liste", [MarcheController::class, 'index'])->name('liste_marche');
    Route::post("/marches/nouveau", [MarcheController::class, 'store'])->name('store_marche');
    Route::get("/marches/{id}/modification", [MarcheController::class, 'edit'])->name('edit_marche');

    Route::get("/marches/{id}/informations", [MarcheController::class, 'show'])->name('show_marche');
    Route::post("/marches/{id}/modification", [MarcheController::class, 'update'])->name('update_marche');
    Route::post("/marches/{id}/suppression", [MarcheController::class, 'destroy'])->name('delete_marche');


    Route::get("/document/dao/{marche}/nouveau/", [DocumentController::class, 'create_dao'])->name('create_dao');
    Route::post("/document/dao/nouveau", [DocumentController::class, 'store_dao'])->name('store_dao');

    Route::get("/document/aao/{marche}/nouveau_avis", [DocumentController::class, 'create_aao'])->name('create_aao');
    Route::post("/document/aao/nouveau_avis", [DocumentController::class, 'store_aao'])->name('store_aao');

   

    //meeting

    Route::get("/marche/{marche}/reunion_ouverture", [DocumentController::class, 'meeting_create'])->name('create_meet');
    Route::post("/marche/avis/reunion_ouverture", [DocumentController::class, 'meeting_store'])->name('store_meet');




    Route::get("/criteres_de_selection/{marche}/nouveau", [CriteresController::class, 'create_critere'])->name('create_critere');
    Route::post("/criteres_de_selection/nouveau", [CriteresController::class, 'store_critere'])->name('store_critere');

    Route::get("/pieces_necessaires/{marche}/nouveau", [CriteresController::class, 'create_piece'])->name('create_piece');
    Route::post("/pieces_necessaires/nouveau", [CriteresController::class, 'store_piece'])->name('store_piece');


    Route::get("/mail", [SoumissionController::class, 'create'])->name('soumission');

    //retrait 

    Route::get("/retrait/{user}/liste-des-daos-retires", [DocumentController::class, 'listeDaoRetires'])->name('liste_retrait');


    


    // afficher un document

    Route::get("/document/{document}/afficher", [DocumentController::class, 'show_document'])->name('afficher_document');
    Route::get("/document/telecharger-le-document/{document}", [DocumentController::class, 'telechargerDocument'])->name('telecharger_document');

    //Questions 

    Route::get("/questions/{user}/formulaire/{marche}/", [PreoccupationController::class, 'nouvelleQuestion'])->name('nouvelle_question');


    //soumissions 

    Route::get("/offre/soumettre/{marche}/formulaire", [SoumissionController::class, 'createForm'])->name('startBid');

    Route::post("/offre/soumettre/start/formulaire", [SoumissionController::class, 'storeFormText'])->name('sendStartBid');

    Route::get("/offre/soumettre/{marche}/end/formulaire", [SoumissionController::class, 'endForm'])->name('endBid');

    Route::post("/offre/soumettre/end/formulaire", [SoumissionController::class, 'storeFormFile'])->name('sendEndBid');

    Route::get("/soumission/view/{bid}/validate", [SoumissionController::class,'viewBid'])->name('viewBid');

    Route::get("/soumission/confirmation/{soumission}/finalize", [SoumissionController::class,'finalizeBid'])->name('finalizeBid');

    Route::get("/soumission/ouverture/{soumission}/view", [EvaluationController::class,'ouvertureBid'])->name('ouvertureBid');

    Route::get("/evaluation/soumission/{soumission}/form", [EvaluationController::class,'EvaluationBid'])->name('evaluationBid');

    Route::post("/evaluation/soumission/view/", [EvaluationController::class,'StoreEvaluationBid'])->name('storeEvaluationBid');



});


Route::middleware(['admin'])->group(function () {

    Route::get("/comptes_utilisateurs", [AdministratorController::class, 'comptes'])->name('comptes');
});
