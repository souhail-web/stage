<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contact;

class ContactController extends Controller
{
    //

    function index() {
        return view('contact');
    }


    public function traitement()
    // traitement du formulaire
    {
        // on verifie que les données insérées sont correctes
        request()->validate([
            'contact_nom' => ['required', 'string'],
            'contact_prenom' => ['required', 'string'],
            'contact_email' => ['required', 'email'],
            'contact_objet' => ['required', 'string'],
            'contact_msg' => ['required', 'string'],
        ]);

        // on créé le contact dans la table correspondante
        $contact = Contact::create([
            'contact_name' => (request('contact_nom')." ".request('contact_prenom')),
            'contact_email' => request('contact_email'),
            'contact_subject' => request('contact_objet'),
            'contact_message' => request( 'contact_msg'),
            'contact_date' => now(),
        ]);



        return view('contact_recu');
    }
 }
