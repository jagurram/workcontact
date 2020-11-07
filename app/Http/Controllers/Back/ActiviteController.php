<?php

namespace App\Http\Controllers\Back;

use App\Activite;;
use App\Dossier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ActiviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }


    /**
     * Store a newly created resource in storage and return Json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storebyjson(Request $request)
    {

        if (!$request->ajax()){
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'commentaire' => 'required',
            'dossier_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()],422);
        }

        $success = Activite::Create([
            'dateStart' => request('dateStart'),
            'dateEnd'  => request('dateEnd'),
            'dateEvenement' =>  request('dateEvenement'),
            'categorie' => request('categorie'),
            'sous_categorie' => request('sous_categorie'),
            'mode_contact' => request('mode_contact'),
            'description' => request('description'),
            'commentaire' => request('commentaire'),

            'dossier_id' => request('dossier_id'),
        ]);

        return response()->json(['success'=>'Activitée sauvegardé'],200);

    }


    public function update(Request $request, $id)
    {


    }



    public function destroy($activite_id,$dossier_id)
    {
        $activite = Activite::find($activite_id);



        if( $activite->delete()){


            return redirect()->route('dossiers.show',$dossier_id);

        }else{

            return back()->withInput();
        }

    }



}
