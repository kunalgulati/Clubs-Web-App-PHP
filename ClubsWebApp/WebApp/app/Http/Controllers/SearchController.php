<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class SearchController extends Controller
{
   public function index(){
       $club = Club::all();

       return view('search',compact('club'));
   }
}
