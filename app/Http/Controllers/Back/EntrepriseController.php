<?php

namespace App\Http\Controllers\Back;

use App\Contact;
use App\User;
use App\Dossier;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Faker\Generator as Faker;

class EntrepriseController extends Controller
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


        $user = Auth::user();

        $entreprises = $user->entreprises()->get();

        flash('EntrepriseController:index')->error()->important();
        return view('back.entreprises.index')->with('entreprises',$entreprises);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();

        return view('back.entreprises.create',compact('liste_pays'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'raison_social' => 'required|string',
            'adresse1' => 'required|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string|',
            'pays' => 'required|string'
        ]);


        if ($validator->fails()) {

            return back()->withErrors($validator)
                ->withInput();
        }

        $user = \App\User::find(Auth::user()->getAuthIdentifier());

        $user->entreprises()->create($request->all());

        $entreprises = $user->entreprises()->get();

        flash('storing success')->error()->important();
        return view('back.entreprises.index')->with('entreprises',$entreprises);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        
        // je recupere l'entreprise en question
        $entreprise_detail = $user->entreprises()->find($id);


        // recuperer toutes les employees de l'entreprise en questions
        $employees = Employee::with('contact')->where('employees.entreprise_id','=',$id)
            ->wherehas('contact', function ($query) use ($user) {
                $query->where('contacts.user_id','=',$user->id);
            })->get(); 

        // recuperer toutes les contacts qui ne sont pas des employees
        $contacts = $user->contacts()->whereDoesntHave('employees', function ($query) use ($id) {

            $query->whereHas('entreprise', function($query) use ($id) {

                $query->where('entreprises.id','=', $id);

            });

        })->get();


        $dossiers = $entreprise_detail->dossiers()->get();

        

        // flash('EntrepriseController:detail')->error()->important();
        
        return view('back.entreprises.detail',compact('entreprise_detail','employees','contacts','dossiers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $entreprise_detail = $user->entreprises()->find($id);

        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();

        flash("Contact " . $entreprise_detail->nom ." " . $entreprise_detail->prenom ." chargée avec succes pour EDITION")->success()->important();

        return view('back.entreprises.edit',compact('entreprise_detail','liste_pays'));

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
        $user = Auth::user();


        $entreprise_detail = $user->entreprises()->find($id);

        $validator = Validator::make($request->all(), [
            'raison_social' => 'required|string',
            'adresse1' => 'required|string',
            'ville' => 'required|string|',
            'code_postal' => 'required|string|',
            'pays' => 'required|string|',
        ]);

        if ($validator->fails()) {


            flash('update failed')->error()->important();
            return back()->withErrors($validator)
                ->withInput();
        }

        if($entreprise_detail->update($request->all())){

            flash('update success')->error()->important();
            return redirect()->route('entreprises.index', compact('entreprise_detail'));

        }else{
            flash('update failed')->error()->important();
            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $entreprise = $user->entreprises()->find($id);

        $request = request();

        if( $entreprise->delete()){

            flash('delete success')->error()->important();
            return redirect()->route('entreprises.index', compact('employee'));

        }else{
            flash('delete failed')->error()->important();
            return back()->withInput();
        }

    }
}
