<?php

namespace App\Http\Controllers\Club;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Dashboard_post;
use App\Club_poster;
Use App\Club;



class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        $posts = Dashboard_post::all();
        $club_posters = Club_poster::all();
        return view('clubs.dashboard.display_dashboard',compact('posts','club_posters'));
    }

    //SHOW Registeration Form
    public function showRegistration()
    {
        return view('clubs.dashboard.register_post');
    }

    //Register a Dashboard_Post
    public function doRegistration(Request $request)
    {
        $title = $request->input('title');
        $type = $request->input('type');
        $url = $request->input('url');
        $club_id = $request->input('club_id');
        $admin = $request->input('admin');

        //Check if the given link is of correct type
        if($type=='y'){
            if (strpos($url, 'youtube')===false) {
                return Redirect::to('register_post')
                ->withErrors('The provided Link was not of Youtube');
            }
        }
        else{
            if (strpos($url, 'youtube')) {
                return Redirect::to('register_post')
                ->withErrors('<h1>The provided Link was a Youtube Link. Please Select "YouTube" as the Source Type.</h1>');
            }
        }
        
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'club_id'=>'required',
            'type' => 'required',
            'url' => 'required',
            'admin' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to('register_post')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            //If Validator Passes
            //Find the club Id using the Club Name
            
            $data=array('title'=>$title,
                "type"=>$type,
                "url"=>$url,
                'club_admin_id'=>1,
                'club_id'=>$club_id
            );
            if(DB::table('dashboard_posts')->insert($data)){
                return Redirect::to('/display_dashboard');
            }
            else{
                return Redirect::to('/register_post')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
    
}
