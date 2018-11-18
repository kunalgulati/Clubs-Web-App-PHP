<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubsDashboardController extends Controller
{
    public function showDashboard()
    {
        // show the form
        return view('club_dashboard');
    }

    //Register a Dashboard_Post
    public function doRegistration(Request $request)
    {
        $expenseName = $request->input('expense_name');
        $description = $request->input('description');
        $amount = $request->input('amount');
        $club_name = $request->input('club_name');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            // 'expenseName'=> 'required',
            'club_name' => 'required',
            'amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return Redirect::to('register_expenses')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            //If Validator Passes
            //Find the club Id using the Club Name
            $club_id = DB::table('clubs')->where('club_name', $club_name)->pluck('id');
            
            $data=array('expense_name'=>$expenseName,
                "description"=>$description,
                "amount"=>$amount,
                'club_id'=>$club_id[0]
            );
            if(DB::table('expenses')->insert($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('display_expenses')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
}
