<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class ClubsRegistrationController extends Controller
{
    public function showRegistration()
    {
        // show the form
        return view('register_club');
    }

    public function doRegistration()
    {
    // process the form
    }
}
