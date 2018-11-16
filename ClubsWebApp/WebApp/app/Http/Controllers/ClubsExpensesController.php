<?php

namespace App\Http\Controllers;
Use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ClubsExpensesController extends Controller
{
    public function showRegistration()
    {
        // show the form
        return view('register_expenses');
    }

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
            if(DB::table('expense')->insert($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('register_expense')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
}