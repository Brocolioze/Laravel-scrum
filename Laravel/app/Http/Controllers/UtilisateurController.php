<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function form_register(){

        $title = "Page d'inscription";

        return view('inscription',compact('title'));
    }

    public function traitement_register(Request $request){

        $request->validate([

            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'email' => 'email|required|unique:utilisateur',
            'mot_de_passe' => 'required',
        ]);

        $utilisateur = new Utilisateur();

        $utilisateur -> nom = $request->input('nom');
        $utilisateur -> prenom = $request->input('prenom');
        $utilisateur -> matricule = $request->input('matricule');
        $utilisateur -> mot_de_passe = bcrypt($request->input('mot_de_passe'));
        $utilisateur -> email = $request->input('email');
        $utilisateur -> save();

        return redirect('/connection')->with('status','Votre compte a ete cree. ');
    }


    public function form_connection(){

        $title = "Page de connection";

        return view('connection',compact('title'));
    }

    public function traitement_connection (Request $request){

        $utilisateur -> mot_de_passe = bcrypt($request->input('mot_de_passe'));
        $utilisateur -> email = $request->input('email');

        $utilisateur -> Utilisateur::where('email',$request->input('email'))->first();

        if($utilisateur){

            if (Hash::check($request->input('mot_de_passe'), $utilisateur -> mot_de_passe)){

                $request->session()->put('utilisateur', $utilisateur);

                return redirect('/administrateur');

            }else{

                return back()->with('status','Mot de passe incorrecte');
            }
        }
        else{

                return back()->with('status','Compte inexistant');

        }

    }
}
