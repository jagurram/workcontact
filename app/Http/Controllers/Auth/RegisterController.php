<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Mail\UserCreatedMail;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use App\ImageProcess;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
       //     'photo_path' => 'image|mimes:jpeg,png,jpg,bmp',
            'password' => 'required|string|min:6|confirmed',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'email' => $data['email'],
            'photo_path' => $data['photo_path'],
            'password' => Hash::make($data['password']),
        ]);

        //Mail::to($user->email)->send(new UserCreatedMail($user));
        // event(new UserCreated($user));

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $storagePhotoPath = '';

        if($request->hasFile('photo_path')){

            //
            
            $storagePhotoPath = $request->file('photo_path')->store('picture_profile');
            //Storage::disk('picture_profile')->put($request->photo_path, 'users');
            
            //$storagePhotoPath = ImageProcess::RenameAndMove($request,'picture_profile');

        }

        //event(new Registered($user = $this->create($request->all())));
        event(new Registered($user = $this->create([
            'prenom' => $request->prenom,
            'nom'  => $request->nom,
            'email' => $request->email,
            'photo_path' => $storagePhotoPath,
            'password' =>  $request->password
        ])));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    /**
     * Handle a registration request for the application and return JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerJson(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->create($request->all());

        return response()->json();
    }
}
