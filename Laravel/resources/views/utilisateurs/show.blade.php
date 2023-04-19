@extends('utilisateurs.layout')

<div class="bg-light p-4 rounded">
        <h1>Utilisateur</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $utilisateur->nom}}
            </div>
            <div>
                Email: {{ $utilisateur->email }}
            </div>
            <div>
                Prenom: {{ $utilisateur->prenom }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('utilisateurs.index') }}" class="btn btn-default">Back</a>
    </div>