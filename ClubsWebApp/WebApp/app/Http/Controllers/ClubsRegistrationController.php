<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubsRegistrationController extends Controller
{
    public function showRegistration()
    {
        // show the form
        return view.make('register_club');
    }

    public function doRegistration()
    {
    // process the form
    }
}
