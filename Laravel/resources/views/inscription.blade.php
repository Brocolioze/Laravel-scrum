@extends('layouts.app')



<div class="container ">
<form action="/inscription/traitement" method="post">

<h1>{{$title}}</h1>

@csrf


        @foreach($errors->all() as $error) 
        <div class="alert alert-danger" role="alert">{{ $error }}</div> 
        @endforeach 
 
            <div class="row">
              <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input id="nom" class="form-control" type="text" name="nom" placeholder="Entrer votre nom">
              </div>
              <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input id="prenom" class="form-control" type="text" name="prenom" placeholder="Entrer votre prénom">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="email" class="form-label">Mail</label>
                <input id="email" class="form-control" type="text" name="email" placeholder="Entrer votre mail">
              </div>
              <div class="col-md-6">
                <label for="matricule" class="form-label">Matricule</label>
                <input id="matricule" class="form-control" type="text" name="matricule" placeholder="Entrer votre matricule">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                <input id="mot_de_passe" class="form-control" type="text" name="mot_de_passe" placeholder="Choisissez un mot de passe">
              </div>
            </div>

     
          
          <input type="submit"  value="S'inscrire" class="btn btn-primary">
        </form>

        </div>

   

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>