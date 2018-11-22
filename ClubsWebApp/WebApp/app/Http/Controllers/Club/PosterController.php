<?php

namespace App\Http\Controllers\Club;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Club_poster;
Use \DB;

class PosterController extends Controller
{
    public function loadPoster(Request $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $json = $request->input('json');
        

        return view('display_poster',compact('title','description','json'));
    }
    public function savePoster(Request $request)
    {

        $title = $request->input('title');
        $description = $request->input('description');
        $json = $request->input('json');
        $club_id = $request->input('club_id');

        $validator = Validator::make($request->all(), [
            // 'club_id' => 'required',
            'json'=> 'required',
            'title'=> 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to('blackboard')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            $data=array('club_id'=>'1','description'=>$description,'json'=>$json,'title'=>$title);
            if(DB::table('club_posters')->insert($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('blackboard')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }
        } 
       
    }
}
