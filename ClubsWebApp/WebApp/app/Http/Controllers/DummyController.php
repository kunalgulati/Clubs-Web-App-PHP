<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Club_user;
use App\Member;

class DummyController extends Controller
{
    public function makeDummy(){
        return view('dummy');
    }

    public function create(){
        for( $i = 0; $i <100; $i++){
            // $club_user = new Club_user();
            // $club_user->user_id = $i;
            // $club_user->club_id = $i;
            // $club_user->role = "member".$i;
            // $club_user->save();

            $club = new Club();
            $club->information = "hello".$i;
            $club->club_name = "club".$i;
            $club->president_id ="president".$i;
            $club->save();

            $member = new Member();
            $member->email = $i."@sfu.ca";
            $member->student_id = $i;
            $member->name = $i."whatever";
            $member->save();
        }

        return redirect('/');
    }
}
