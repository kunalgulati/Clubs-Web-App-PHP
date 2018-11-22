<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Club;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function showClubs(Request $request){
        $clubs = Club::all();
        if($request->has('search')){
            $clubNames = $clubs->pluck('club_name','id');
            $clubs = self::filter($clubNames, $request['search']);
        }
        return View('clubs.display_clubs', compact('clubs'));
    }

    public function showRegistration()
    {
        // show the form
        return view('clubs.register_club');
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

    private static function filter($clubs, $filter){
        $result = array();
        $filter = strtolower($filter);
        foreach ($clubs as $id => $name) {
            $name = strtolower($name);
            $strpos = strpos($name,$filter);
            if($strpos !== false){
                $club = Club::find($id);
                array_push($result, $club);
            }
        }
        return $result;
    }
}
