<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Au revoir !');
    }

    public function store(){
        $attribut = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(! auth()->attempt($attribut)){
            throw  ValidationException::withMessages(
                ['email' => "Vos informations d'identification fournies n'ont pas pu être vérifiées."]
            );
        }

        session()->regenerate();
        return back()->with('success', 'Bon retours');


    }
}
