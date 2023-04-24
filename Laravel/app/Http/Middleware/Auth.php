<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function authenticate() {
        if (Auth::attempt(['email' => $email, 'mot_de_passe' => $mot_de_passe])) {
        
           // Authentication passed...
           return redirect()->intended('/utilisateurs/index');
        }
}
}