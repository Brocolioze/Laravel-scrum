<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash;
use Validator;
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

        $messages = array('email.regex' => 'Your email id is not valid.');

      $validator = Validator::make($request->all(), [
        'nom' => 'required|min:2',
        'prenom' => 'required|min:2',
        'matricule' => 'required|min:7',
        'email' => 'required|email|unique:users,email,'.$utilisateurs->id,
        'mot_de_passe' => 'required|min:8'

     ] , $messages );
   
        if($validator->fails()){

                 return redirect('inscription')->withErrors($validator)->withInput();

            }


        /*
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

                        */
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
        'nom' => 'required|min:3',
        'prenom' => 'required|min:3',
        'matricule' => 'required|min:7',
        'email' => ['required', 'unique:users', 'email', 'unique:users,email' . $user->id],
        'mot_de_passe' => 'required|min:8'
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

            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'matricule' => 'required|min:7',
            'email' => 'required',
            'mot_de_passe' => 'required|min:8'
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
  

        $title = "Page de connection";

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:utilisateurs',
            'password' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            flash('Email Does Not Exists')->error();
            
            // or 
    
            $request->session()->flash('message', 'Email Does Not Exists');
        }

        /*

        $request->validate([
          
            'email' => 'required',
            'mot_de_passe' => 'required|min:8'
        ]);
*/

        $utilisateur = Utilisateur::where('email', $request->email)->first();

        if ($utilisateur) {

        if (Hash::check($request->mot_de_passe,   $utilisateur->mot_de_passe)) {

            $utilisateurs = Utilisateur::all(); 

            return view('/utilisateurs/index',compact('utilisateurs'));


        }else{

            return view('/connection',compact('title'));
        }

      
    }else{

            return view('/connection',compact('title'));
        }
       
}

//deconnexion
public function deconnexion()
{
    auth()->logout();

    $request->session()->invalidate();
 

    return redirect('/');
}








}