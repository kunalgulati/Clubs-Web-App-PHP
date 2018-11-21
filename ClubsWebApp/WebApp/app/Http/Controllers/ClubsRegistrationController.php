<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Club;

class ClubsRegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function showRegistration()
    {
        // show the form
        return view('register_club');
    }

    public function doRegistration(Request $request)
    {
        $club_name = $request->input('club_name');
        $founder_id = Auth::user()->id;
        $information = $request->input('information');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'club_name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('register_club')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            $data=array(
                'club_name'=>$club_name,
                "information"=>$information,
                'founder_id'=>$founder_id,);
                
            if(Club::create($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('register_club')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
}
