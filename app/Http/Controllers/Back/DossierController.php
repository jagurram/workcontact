<?php

namespace App\Http\Controllers\Back;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Dossier;
use App\Entreprise;
use App\User;
use App\Activite;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class DossierController extends Controller
{

    public function dossiers_entreprises_store(Request $request){

        if (!$request->ajax()){
            abort(404);
        }
        
        $validator = Validator::make($request->all(), [
            'titre' => 'required|string',
            'commentaire' => 'required|string',
        ]);

        if ($validator->fails()) {
            
            return response()->json(['errors'=>$validator->errors()->all()],422);
        }

        //$success = Contact::Create($request->all());

        $entreprise = Entreprise::find($request->entreprise_id);
        
        $dossier = new Dossier([
            'titre' => $request->titre,
            'commentaire' => $request->commentaire,

        ]);

        $entreprise->dossiers()->save($dossier);

        return response()->json(['success'=>'Dossier ajoutée'],200);
    }

    public function show($dossier_id,Request $request){

        $dossier = Dossier::find($dossier_id);

        $activites = $dossier->activites()->get();

        $categories = array("Candidature","Proposition entretien","Entretien","RDV Administratif");

        $sous_categories = array("Entretien Physique","Entretien telephonique","Entretien visio","Compte-rendu","Reunion d'information");

        $mode_contacts = array("Appel","Email","SMS","Online");
        // $user->entreprises($request->entreprise_id)->dossiers()->find($request->$dossier_id);

        return view('back.dossiers.index',compact('activites','dossier','categories','mode_contacts','sous_categories'));

    }

    public function destroy($dossier_id,$entreprise_id){

        $dossier = Dossier::find($dossier_id);

        if( $dossier->delete()){

            flash('delete success')->error()->important();
            return redirect()->route('entreprises.show', $entreprise_id);

        }else{
            flash('delete failed')->error()->important();
            return back()->withInput();
        }

    }

    public function update(){


    }


    public function edit(){


    }

}
