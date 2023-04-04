<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){

        $title = 'Vous etes en mode administrateur';

        return view('pages/administrateur',compact('title'));
    }
}



