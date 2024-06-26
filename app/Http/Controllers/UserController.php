<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;



class UserController extends Controller
{

    public function account()
    {
        // Get the authenticated user
        $user = Auth::user();

        $listings = $user->listings;

        // Check if user is logged in
        if ($user) {
            // Load the user's listings
            $user->load('listings');

            // Pass the user data to the view
            return view('account', compact('user', 'listings'));
        } else {
            // Redirect to login if user is not authenticated
            return redirect()->route('login');
        }
    }


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
        ])->withInput($request->only('email'));
    }


    public function logout() {
        // Un-authenticate user
        auth()->logout();
        return redirect('/home');
    }

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetLink = route('resetpassword.form', $token);
        Mail::to($request->email)->send(new ResetPassword($resetLink));

        return redirect()->back()->with('success', 'Password reset link sent to your email.');


        return redirect()->back()->with('success', 'Password reset link sent to your email.');
    }


    public function resetPasswordForm($token) {
        $tokenExists = DB::table('password_reset_tokens')->where('token', $token)->exists();

        if (!$tokenExists) {
            return redirect()->route('forgotpassword')->with('error', 'Invalid token.');
        }

        return view('resetpassword', ['token' => $token]);
    }

    public function resetPassword(Request $request, $token) {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $tokenRecord = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$tokenRecord) {
            return redirect()->route('forgotpassword')->with('error', 'Invalid token.');
        }

        $user = User::where('email', $tokenRecord->email)->first();

        if (!$user) {
            return redirect()->route('forgotpassword')->with('error', 'User not found.');
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        DB::table('password_reset_tokens')->where('token', $token)->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    // Method to handle profile picture upload
    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $path = 'uploads/profile-pictures/';
        $filename = 'profile_' . $user->id . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path($path), $filename);

        // Save the profile picture location to the user model
        $user->profile_picture = $path . $filename;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture uploaded successfully!');
    }

    public function updateProfilePicture(Request $request)
    {
        // Similar to uploadProfilePicture method, but update existing profile picture
    }
}
