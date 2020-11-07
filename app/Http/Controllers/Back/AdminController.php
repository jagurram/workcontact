<?php

namespace App\Http\Controllers\Back;

use App\Employee;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $entreprises_count = $user->entreprises()->count();
        $contacts_count = $user->contacts()->count();

        return view('back.index2',compact('entreprises_count','contacts_count'));


    }








}
