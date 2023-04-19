@extends('utilisateurs.layout')

<div class="bg-light p-4 rounded">
        <h1>Update user</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <form method="post" action="{{ route('utilisateurs.update', $utilisateur->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input value="{{ $utilisateur->nom}}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="Nom" required>

                    @if ($errors->has('nom'))
                        <span class="text-danger text-left">{{ $errors->first('nom') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $utilisateur->email }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input value="{{ $utilisateur->prenom}}"
                        type="text" 
                        class="form-control" 
                        name="prenom" 
                        placeholder="Prenom" required>
                    @if ($errors->has('prenom'))
                        <span class="text-danger text-left">{{ $errors->first('prenom') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('utilisateurs.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>