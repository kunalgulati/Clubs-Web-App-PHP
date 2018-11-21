<?php

namespace App\Http\Controllers;
Use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Expense;
use App\Club;


class ClubsExpensesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function showRegistration()
    {
        // show the form
        return view('register_expenses');
    }

    //POST an expense
    //Validate all inpiuts 
    //Find the club_id
    public function doRegistration(Request $request)
    {
        $expense_name = $request->input('expense_name');
        $description = $request->input('description');
        $amount = $request->input('amount');
        $club_name = $request->input('club_name');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'expense_name'=> 'required',
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
            $club_id = Club::where('club_name',$club_name)->first()->id;
            
            $data=array('expense_name'=>$expense_name,
                "description"=>$description,
                "amount"=>$amount,
                'club_id'=>$club_id
            );
            if(Expense::create($data)){
                return Redirect::to('/');
            }
            else{
                return Redirect::to('display_expenses')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }

    //Display the expenses
    public function showExpenses(){
        $expenses = Expense::all();
        return view('display_expenses',compact('expenses'));
    }

    //Delete the Expense
    public function deleteExpense($id){
        Expense::where('id', $id)->delete();
        $expenses = Expense::all();
        return view('display_expenses', compact('expenses'));
    }

    //Edit an Expense
    public function editExpense($id){
        $expense = Expense::where('id', $id)->get();
        return view('edit_expense', compact('expense'));
    }
}