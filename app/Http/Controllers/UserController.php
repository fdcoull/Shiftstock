<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        // Validate inputs
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
}
