<?php

namespace App\Http\Controllers\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email'=> 'The provided credentials donot match our records.'
        ]);
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('login');
    }
}
