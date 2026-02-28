<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Offre;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index(){
        return view("auth.login");
    }
    public function indexi(){
        return view("auth.inscription");
    }
    public function profile(){
        $user = Auth::user();
        return view("auth.profile", compact('user'));
    }
    public function profiledit(Request $req ){
        $user = Auth::user();
        $user->TYPE=$req->input('TYPE');
        $user->save();
        return redirect()->route('profile')->with('success', 'Profile modifié avec succès');
    }
        

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'EMAIL' => 'required|email',
            'password' => 'required',
        ]);

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            if ($user->TYPE == 'candidat') {
                return redirect()->route('candidat-home');
            } elseif ($user->TYPE == 'recruteur') {
                return redirect()->route('recruteur-home');
            }
        }

        return back()->with('error', 'Utilisateur ou Mot de passe incorrect')
                     ->withInput($request->only('EMAIL'));
    }
    

    public function inscription(Request $request)
    {
        $request->validate([
            'NOM' => 'required|string|max:50',
            'PRENOM' => 'required|string|max:50',
            'EMAIL' => 'required|string|email|max:50|unique:utilisateurs',
            'password' => 'required|string',
            'TYPE' => 'required|string|max:50',
        ]);
        
        User::create([
            'NOM' => $request->input('NOM'),
            'PRENOM' => $request->input('PRENOM'),
            'EMAIL' => $request->input('EMAIL'),
            'password' => bcrypt($request->input('password')),
            'TYPE' => $request->input('TYPE'),
        ]);

        return redirect()->route('login')->with('success', 'Inscription reussie. Connectez-vous.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
