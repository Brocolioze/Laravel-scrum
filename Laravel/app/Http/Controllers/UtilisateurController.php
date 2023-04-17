<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UtilisateurController extends Controller
{



    public function index()
    {
        $utilisateurs = Utilisateur::latest()->paginate(5);
    
        return view('utilisateurs.index',compact('utilisateurs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('utilisateurs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
           
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required'
        ]);
    
        utilisateurs::create($request->all());
     
        return redirect()->route('utilisateurs.index')
                        ->with('success','Product created successfully.');
    }

    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show',compact('utilisateur'));
    } 

    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit',compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required'
        ]);
    
        $utilisateur->update($request->all());
    
        return redirect()->route('utilisateurs.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $product->delete();
    
        return redirect()->route('utilisateurs.index')
                        ->with('success','Product deleted successfully');
    }


    public function form_register(){

        $title = "Page d'inscription";

        return view('inscription',compact('title'));
    }

    public function traitement_register(Request $request){

        

        $request->validate([

            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required',
            'email' => 'required',
            'mot_de_passe' => 'required'
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
  

        $request->validate([
          
            'email' => 'required',
            'mot_de_passe' => 'required'
        ]);


        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if (   $utilisateur) {

        if (Hash::check($request->mot_de_passe,   $utilisateur->mot_de_passe)) {



            return view('administrateur');
        }

        return view('administrateur');
    
    }
       
}








}