<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     public function __construct()
    {
        //$this->middleware('auth');
    }

    
    public function index()
    {
    	auth()->logout();
		$groups = Group::get();//var_dump($groups);		
        return view('home',compact('groups'));
    }
}
