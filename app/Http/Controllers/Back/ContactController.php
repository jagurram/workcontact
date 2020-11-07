<?php

namespace App\Http\Controllers\Back;

use App\Contact;

use App\User;
use App\ImageProcess;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
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

        $contacts = $user->contacts()->get();

        //condition si aucun contact

        flash('Bundle flash message')->error()->important();


        return view('back.contacts.index')->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();
       
        return view('back.contacts.create',compact('liste_pays'));
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'fonction' => 'required|string',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $storagePhotoPath = '';

        if($request->hasFile('photo')){

            $storagePhotoPath = ImageProcess::RenameAndMove($request,'contacts');

        }

        $success = Contact::Create([
            'prenom' => request('prenom'),
            'nom'  => request('nom'),
            'photo' => $storagePhotoPath,
            'origine' => request('origine'),
            'fonction' => request('fonction'),
            'adresse' => request('adresse'),
            'code_postal' => request('code_postal'),
            'ville' => request('ville'),
            'pays' => request('pays'),
            'email' => request('email'),
            'telephone_fixe' => request('telephone_fixe'),
            'telephone_mobile' => request('telephone_mobile'),
            'website' => request('website'),
            'commentaire' => request('commentaire'),
            'user_id' => Auth::user()->id,
        ]);

        if($success){
            flash("Employees " . $request->nom ." " . $request->prenom ." ajoutée avec succes")->error()->important();
            return redirect()->route('contacts.index', compact('entreprise_detail'));

        }else{
            flash("Contact creation failed")->error()->important();
            return back()->withInput();
        }

        
    }


    /**
     * Store a newly created resource in storage and return Json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetojson(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'fonction' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()],422);
        }

        $user = Auth::user();

        //$success = Contact::Create($request->all());

        Contact::Create([
            'prenom' => request('prenom'),
            'nom'  => request('nom'),
            'fonction' => request('fonction'),
            'user_id' => $user->id
        ]);

        return response()->json(['success'=>'Contact ajoutée'],200);

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

        $employee_detail = $user->contacts()->find($id);

        if($employee_detail){
            flash("Employees " . $employee_detail->nom ." " . $employee_detail->prenom ." chargée avec succes")->success()->important();
            return view('back.contacts.detail',compact('employee_detail'));

        }else{

            flash("Contact selection failed")->error()->important();
            return back();
        }

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
        $contact_detail = $user->contacts()->find($id);

        $liste_pays = DB::table('pays')->select('nom_fr_fr')->get();

        flash("Contact " . $contact_detail->nom ." " . $contact_detail->prenom ." chargée avec succes pour EDITION")->success()->important();

        return view('back.contacts.edit')->with('contact_detail',$contact_detail)
            ->with('liste_pays',$liste_pays);
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

        $contact_detail = $user->contacts()->find($id);

        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'fonction' => 'required|string',
            'pays' => 'required|string|',
        ]);

        if ($validator->fails()) {


            return back()->withErrors($validator)
                ->withInput();
        }


        if($request->hasFile('photo_path')){

            ImageProcess::RenameAndMove($request,'contacts');

        }

        $contact_detail->nom = $request->nom;
        $contact_detail->prenom = $request->prenom;
        $contact_detail->origine = $request->origine;
        $contact_detail->fonction = $request->fonction;
        $contact_detail->adresse = $request->adresse;
        $contact_detail->code_postal = $request->code_postal;
        $contact_detail->ville = $request->ville;
        $contact_detail->pays = $request->pays;
        $contact_detail->email = $request->email;
        $contact_detail->telephone_fixe = $request->telephone_fixe;
        $contact_detail->telephone_mobile = $request->telephone_mobile;
        $contact_detail->commentaire = $request->commentaire;

        if($contact_detail->save()){

            return redirect()->route('contacts.index', compact('entreprise_detail'));

        }else{

            return back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $employee = $user->contacts()->find($id);

        if( $employee->delete()){

            flash("Good job")->success()->important();
            return redirect()->route('contacts.index', compact('employee'));

        }else{
            flash("Error Deletion")->error()->important();
            return back()->withInput();
        }


    }


    public function create_document($id){

        $user = Auth::user();

        $employee_detail = $user->employees()->find($id);

        return view('back.contacts.detail',compact('employee_detail'));

    }
}
