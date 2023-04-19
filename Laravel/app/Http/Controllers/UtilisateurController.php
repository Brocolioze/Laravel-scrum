<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UtilisateurController extends Controller
{


// Montre la liste des utilisateurs
    public function index()
    {
        $utilisateurs = Utilisateur::latest()->paginate(5);
    
        return view('utilisateurs.index',compact('utilisateurs'));
    }


    
// Montre le formulaire de creation des utilisateurs
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


    // Montre les informations  des utilisateurs
    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show',compact('utilisateur'));
    } 

// editions des utilisateurs
    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit',compact('utilisateur'));
    }

    // Maj des utilisateurs
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

    //suppression  des utilisateurs
    public function destroy(Utilisateur $utilisateur)
    {

  
        $utilisateur::find($id)->delete();
        $utilisateur->delete();
      
    
        return redirect()->route('utilisateurs.index')
        ->withSuccess(__('User deleted successfully.'));

        
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

        if ($utilisateur) {

        if (Hash::check($request->mot_de_passe,   $utilisateur->mot_de_passe)) {



            return view('/utilisateurs/index');
        }

        dump('ERROR');
        die();
    
    }
       
}

//deconnexion
public function deconnexion()
{
    auth()->logout();

    return redirect('../admistrateur');
}








}