<?php

namespace App\Http\Controllers;

Use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ExpenseRegistrationController extends Controller
{
    public function showRegistration()
    {
        // show the form
        return view('register_expenses');
    }

    public function doRegistration(Request $request)
    {
        $name = $request->input('expense_name');
        $amount = $request->input('amount');
        $description = $request->input('description');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'expense_name' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to('register_expenses')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            $data=array('name'=>$name,"amount"=>$amount,"description"=>$description);
            if(DB::table('expense')->insert($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('register_expenses')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }
}
