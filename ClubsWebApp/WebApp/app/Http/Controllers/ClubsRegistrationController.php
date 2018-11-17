<?php

namespace App\Http\Controllers;

Use \DB;
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

    public function doRegistration(Request $request)
    {
        $club_name = $request->input('club_name');
        //$student_number = $request->input('student_id');
        $information = $request->input('information');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'club_name' => 'required',
            //'student_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return Redirect::to('regitser_club')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            $data=array('club_name'=>$club_name,"information"=>$information);
            if(DB::table('clubs')->insert($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('regitser_club')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
}
