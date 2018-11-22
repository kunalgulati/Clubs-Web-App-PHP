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


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        $posts = Dashboard_post::all();
        $club_posters = Club_poster::all();
        return view('display_dashboard',compact('posts','club_posters'));
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
        $club_name = $request->input('club_name');
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
            'type' => 'required',
            'url' => 'required',
            'club_name' => 'required',
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
            $club_id = DB::table('clubs')->where('club_name', $club_name)->pluck('id');
            
            $data=array('title'=>$title,
                "type"=>$type,
                "url"=>$url,
                'club_admin_id'=>1,
                'club_id'=>$club_id[0]
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
