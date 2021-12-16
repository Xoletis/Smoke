<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(User $user){

        return view('user.espace', [
            'user' => $user
        ]);
    }

    public function modify(User $user){
        return view('user.modify',[
            'user' => $user
        ]);
    }

    public function update(User $user){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        $user->update([
            'name' => $attributes['name'],
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => $attributes['password']
        ]);

        return redirect('/');
    }

    public function getAll(){
        return view('user.show', [
            'users' => User::all()
        ]);
    }

    public function setAdmin(User $user){
        $user->update([
            'isAdmin' => '1'
        ]);

        return back()->with('Action réussi');
    }

    public function removeAdmin(User $user){
        $user->update([
            'isAdmin' => '0'
        ]);

        return back()->with('Action réussi');
    }

    public function ban(User $user){
        $user->update([
            'isBan' => '1'
        ]);

        return back()->with('Action réussi');
    }

    public function unban(User $user){
        $user->update([
            'isBan' => '0'
        ]);

        return back()->with('Action réussi');
    }
}
