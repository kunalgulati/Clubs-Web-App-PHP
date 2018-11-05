<?php

namespace App\Http\Controllers;
use App\Club;
use App\Member;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function displayClub(){
        
        $clubs = Club::all();
        return view('displayclub',compact('clubs'));
    }

    public function displayMember(){
        $members = Member::all();
        return view('displaymember',compact('members'));

    }
}
