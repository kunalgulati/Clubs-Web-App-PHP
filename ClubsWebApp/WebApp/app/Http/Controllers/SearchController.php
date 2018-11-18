<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Club;

class SearchController extends Controller
{
   public function index(){
    //    $club_all = Club::all();

            $clubs = Club::Where('club_name', 'like', '%' . Input::post('club_name') . '%')->get();
            return view('displayclub',compact('clubs'));
 
        
   }

   //return json
   public function autocomplete(Request $request)
   {
       $data = Club::select("club_name")
               ->where("club_name","LIKE","%{$request->input('query')}%")
               ->get();
  
       return response()->json($data);
   }
}


   
