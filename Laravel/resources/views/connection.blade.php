@extends('layouts.app')




<div class="container ">
<form method = "post" action ="/connection/traitement">

@csrf

<h1>{{$title}}</h1>



@foreach($errors->all() as $error) 
        <div class="alert alert-danger" role="alert">{{ $error }}</div> 
        @endforeach 


  <!-- Email input -->
  <div class="form-outline md-6">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline md-6">
    <input type="text" id="mot_de_passe" name="mot_de_passe"  class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      
    </div>

    
  </div>


  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Connexion</button>

  
  </div>
</form>

</div>