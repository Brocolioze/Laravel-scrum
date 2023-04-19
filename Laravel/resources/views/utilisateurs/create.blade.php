
@extends('utilisateurs.layout')


    <div class="bg-light p-4 rounded">
        <h1>Creer un nouvel utilisateur</h1>
        <div class="lead">
           Nouvel Utilisateur
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="matricule" class="form-label">Matricule</label>
                    <input value="{{ old('nom') }}" 
                        type="text" 
                        class="form-control" 
                        name="matricule" 
                        placeholder="Matricule" required>

                    @if ($errors->has('matricule'))
                        <span class="text-danger text-left">{{ $errors->first('matricule') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input value="{{ old('nom') }}" 
                        type="text" 
                        class="form-control" 
                        name="nom" 
                        placeholder="Nom" required>

                    @if ($errors->has('nom'))
                        <span class="text-danger text-left">{{ $errors->first('nom') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input value="{{ old('prenom') }}" 
                        type="text" 
                        class="form-control" 
                        name="prenom" 
                        placeholder="Prenom" required>

                    @if ($errors->has('prenom'))
                        <span class="text-danger text-left">{{ $errors->first('prenom') }}</span>
                    @endif
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de Passe</label>
                    <input value="{{ old('username') }}"
                        type="text" 
                        class="form-control" 
                        name="mot_de_passe" 
                        placeholder="Mot de passe" required>
                    @if ($errors->has('mot_de_passe'))
                        <span class="text-danger text-left">{{ $errors->first('mot_de_passe') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Creer utilisateur</button>
                <a href="{{ route('utilisateurs.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
