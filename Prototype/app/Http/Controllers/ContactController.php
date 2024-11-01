<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
function create(){
    return view('Mail.contact');
}
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    Mail::raw("Nom: {$data['name']}\nEmail: {$data['email']}\nMessage: {$data['message']}", function ($message) use ($data) {
        $message->to('mohammedaminebennanikabchi@gmail.com')
                ->subject('Nouveau message de contact');
    });

    return redirect('/contact')->with('success', 'Votre message a bien été envoyé.');
}
}
