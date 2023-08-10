<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('auth.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:2'],
            'firstname' => ['required', 'min:4'],
            'number' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        // auth()->login($user);

        return redirect('/login')->with('message', 'Utilisateur créé avec succes');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Vous avez été déconnecté');

    }

    // Show Login Form
    public function login() {
        return view('auth.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/home')->with('message', 'Bienvenue Monsieur, ça fait un bail!');
        }

        return back()->withErrors(['email' => 'Crédentiels invalides, désolé!'])->onlyInput('email');
    }
}
