@extends('utilisateurs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Utilisateurs</h2>
            </div>
          
        </div>
    </div>
  
   
    <table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
        
            <th><a class="btn btn-success" href="{{ route('utilisateurs.create') }}"> Creer un nouvel utilisateur</a></th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($utilisateurs as $utilisateur)
        <tr>
            <td>{{ $utilisateur->id }}</td>
            <td>{{ $utilisateur->matricule }}</td>
            <td>{{ $utilisateur->nom }}</td>
            <td>{{ $utilisateur->prenom }}</td>
            <td>{{ $utilisateur->email }}</td>
            <td>
                <form method="POST"  action="{{ route('utilisateurs.destroy',$utilisateur->id) }}" >

                @method('DELETE')
                @csrf

                    <a class="btn btn-info" href="{{ route('utilisateurs.show',$utilisateur->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('utilisateurs.edit',$utilisateur->id) }}">Edit</a>
   
                  
             
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <a href="/deconnexion" class="btn btn-danger">Déconnexion</a>
  
   
@endsection