<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('your-receiving-email@example.com')->send(new ContactMail($details));

        return back()->with('success', 'Thank you for contacting us!');
    }
}
