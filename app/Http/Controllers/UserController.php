<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        // Validate field inputs
        $fields = $request->validate([
            'name' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'business_name' => 'required',
            'password' => ['required', 'min:8', 'max:256']
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
            'email' => 'required',
            'password' => 'required'
        ]);

        // Check if username password combination matches a user
        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            // Authenticate user
            $request->session()->regenerate();
        }

        return redirect('/logout');
    }

    public function logout() {
        // Un-authenticate user
        auth()->logout();
        return redirect('/');
    }
}
