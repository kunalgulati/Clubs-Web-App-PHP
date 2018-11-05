<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Club_user;
use App\User;

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

            $user = new User();
            $user->email = $i."@sfu.ca";
            $user->password = $i."1111aaaa";
            $user->name = $i."whatever";
            $user->save();
        }

        return redirect('/');
    }
}
