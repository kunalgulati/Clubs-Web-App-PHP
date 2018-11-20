<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\User;

class ClubPageController extends Controller
{
    /*
    //return the club main page view for members
    public function memberPage(){
       return view('member_club_page');
    }

    //returns the club main page view for non-members
    public function nonMemberPage(){
        return view('nonmember_club_page');
    }

    //returns the club main page view for admins
    public function adminPage(){
        return view('admin_club_page');
    }
    */

    /* 
    A function that takes an argument name to be passed to the route URL
    and renders different views according to the user type: Member/non-member/Admin 
    */
    public function clubPage($name){
        $members = Member::all();
        $users = User::all();
        //A variable that determines if a user is the club admin
        $isAdmin = true;
        foreach($users as $user){
            foreach($members as $member){
                if($isAdmin){
                    return view('admin_club_page');
                }else if($user->email == $member->email){
                    return view('member_club_page');
                }else{
                    return view('nonmember_club_page');
                }
            }
        }
            
    }


}
