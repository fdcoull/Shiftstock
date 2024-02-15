<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        // Validate field inputs
        $fields = $request->validate([
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:256'],
            'businessName' => 'required',
            'recoveryEmail' => ['required', 'email']
        ]);

        // Hash password
        $fields['password'] = bcrypt($fields['password']);

        // Create user entry
        $user = User::create($fields);

        // Authenticate user
        auth()->login($user);

        return "Registered and logged in";
    }

    public function login(Request $request) {
        // Validate field inputs
        $fields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Check if username password combination matches a user
        if (auth()->attempt(['username' => $fields['username'], 'password' => $fields['password']])) {
            // Authenticate user
            $request->session()-regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        // Un-authenticate user
        auth()->logout();
        return redirect('/');
    }
}
