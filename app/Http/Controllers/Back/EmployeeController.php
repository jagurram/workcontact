<?php

namespace App\Http\Controllers\Back;

use App\Contact;
use App\Entreprise;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
    public function create($entreprise_id)
    {
        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();

        return view('back.employees.create',compact('liste_pays','entreprise_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        //creation du contact et recuperation du Last Id Insert
        $contact_created = $user->contacts()->create([
            'prenom' => $request->prenom,
            'nom'  => $request->nom,
            'fonction' => $request->fonction,
            'origine' => $request->origine,
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'email' => $request->email,
            'telephone_fixe' => $request->telephone_fixe,
            'telephone_mobile' => $request->telephone_mobile,
            'commentaire' => $request->commentaire,
        ]);

        //recuperation de l'entreprise
        $entreprise = Entreprise::find($request->entreprise);

        $employee = new Employee([
            'fonction' => $request->pro_metier,
            'telephone_fixe' => $request->pro_telephone_fixe,
            'telephone_mobile' => $request->pro_telephone_mobile,
            'commentaire' => $request->pro_commentaire,
            'contact_id' => $contact_created->id,
        ]);

        $success = $entreprise->employees()->save($employee);

        if($success){
            flash("Employees " . $request->nom ." " . $request->prenom ." ajoutée avec succes")->error()->important();
            return redirect()->route('entreprises.index');

        }else{
            flash("Employee creation failed")->error()->important();
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $employee = $user->contacts()->find($id);

        $employee = Employee::find($id);

        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();

        return view('back.employees.edit',compact('liste_pays','employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {

        $employee = Employee::find($employee_id);

        $validator = Validator::make($request->all(), [
            'pro_metier' => 'required|string',
        ]);

        if ($validator->fails()) {
            

            return back()->withErrors($validator)
                ->withInput();
        }

        $employee->fonction = $request->pro_metier;
        $employee->email = $request->pro_email;
        $employee->telephone_fixe = $request->pro_telephone_fixe;
        $employee->telephone_mobile = $request->pro_telephone_mobile;
        $employee->commentaire = $request->pro_commentaire;

        if($employee->save()){

            return redirect()->route('entreprises.show', ['id' => $employee->entreprise_id] );


        }else{

            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $user = Auth::user();

        $employee = Employee::find($employee_id);

        if( $employee->delete()){

            flash("Good job")->success()->important();
            return redirect()->route('entreprises.show', ['id' => $employee->entreprise_id] );

        }else{
            flash("Error Deletion")->error()->important();
            return back()->withInput();
        }

    }

    public function addcontact(Request $request)
    {

        //recuperation de l'entreprise
        $entreprise = Entreprise::find($request->entreprise);

        //recuperation du/des contact a ajoutés en tant qu'employee
        foreach($request->contacts as $contact)
        {

            $contact_to_add = Contact::find($contact);

            $employee = new Employee([
                'contact_id' => $contact,
                'fonction' => 'a renseigner',
            ]);

            $success = $entreprise->employees()->save($employee);

            if(!$success){

                flash("Employees " . $contact_to_add->nom ." " . $contact_to_add->prenom ." ajoutée avec succes")->error()->important();
                return back()->withInput();
            }

        }

        flash("Ajout d'employees OK")->success()->important();
        return redirect()->route('entreprises.show',$request->entreprise);

    }



}
