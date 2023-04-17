@extends('utilisateurs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Utilisateurs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('utilisateurs.create') }}"> Create New utilisateur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($utilisateurs as $utilisateur)
        <tr>
            <td>{{ $utilisateur->matricule }}</td>
            <td>{{ $utilisateur->nom}}</td>
            <td>{{ $utilisateur->prenom }}</td>
            <td>{{ $utilisateur->email}}</td>
            <td>
                <form action="{{ route('utilisateurs.destroy',$utilisateur->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('utilisateurs.show',$utilisateur->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('utilisateurs.edit',$utilisateur->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $utilisateurs->links() !!}
      
@endsect