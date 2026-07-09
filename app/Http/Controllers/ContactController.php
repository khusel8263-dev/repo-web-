<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;


class ContactController extends Controller
{


    public function store(Request $request)
    {
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return back()->with('success', 'Message sent');
    }
}
