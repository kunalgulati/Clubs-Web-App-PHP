<?php

namespace App\Http\Controllers;
Use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Expense;


class ClubsExpensesController extends Controller
{
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

    //Update the Expense
    public function updateExpense(Request $request){
        $name = $request->input('expense_name');
        $id = $request->input('id');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $expense = Expense::find($id);
        $expense->expense_name = $name;
        $expense->amount = $amount;
        $expense->description = $description;
        $expense->save();
        $expenses = Expense::all();
        return view('display_expenses', compact('expenses'));

    }

    //Redirect to register expenses with values of name id amount and description
    public function showExpenseToUpdate(Request $request){
        $name = $request->input('name');
        $id = $request->input('id');
        $amount = $request->input('amount');
        $description = $request->input('description');   
        return view('register_expenses',compact('name','id','amount','description'));
    }

    //Edit an Expense
    public function editExpense($id){
        $expense = Expense::where('id', $id)->get();
        return view('edit_expense', compact('expense'));
    }
}