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
            'name' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'business_name' => 'required',
            'password' => ['required', 'min:8', 'max:256']
        ]);

        // Hash password
        $fields['password'] = bcrypt($fields['password']);

        try {
            // Create user entry
            $user = User::create($fields);

            // Authenticate user
            auth()->login($user);

            // Redirect with success message
            return redirect('/home')->with('success', 'Registered and logged in successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return back()->withInput()->withErrors('Registration failed, please try again.');
        }
    }

    public function login(Request $request) {
        // Validate field inputs
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check if username password combination matches a user
        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->filled('remember'))) {
            // Authentication passed...
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout() {
        // Un-authenticate user
        auth()->logout();
        return redirect('/home');
    }
}
