<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //

    function index() {
        return view('contact');
    }


    public function traitement()
    // traitement du formulaire
    {

        // si utilisateur authentifié
        if(Auth::check()) {
        // on verifie que les données insérées sont correctes
        request()->validate([
            'subject' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        // on créé le contact dans la table correspondante
        $contact = Contact::create([
            'contact_name' =>Auth::user()->name,
            'contact_email' => Auth::user()->email,
            'contact_subject' => request('subject'),
            'contact_message' => request( 'content'),
            'contact_date' => now(),
        ]);

        // si utilisateur non authentifié
        } else {

            // on verifie que les données insérées sont correctes
        request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string']
            // Validation reCAPTCHA désactivée temporairement
            // 'g-recaptcha-response' => 'required|captcha'
        ]);

        // on créé le contact dans la table correspondante
        $contact = Contact::create([
            'contact_name' => request('name'),
            'contact_email' => request('email'),
            'contact_subject' => request('subject'),
            'contact_message' => request( 'content'),
            'contact_date' => now(),
        ]);

        }

        return view('contact_recu');
    }
 }
