<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
Use App\Club;
use App\Event;


class ClubsEventsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function showRegistration()
    {
        // show the create event form
        return view('create_event');
    }
    
    //POST an expense
    //Validate all inpiuts 
    //Find the club_id
    //TODO
    public function doRegistration(Request $request)
    {
        $eventName = $request->input('event_name');
        $description = $request->input('description');
        $room = $request->input('room');
        $address = $request->input('address');
        $city = $request->input('city');
        $club_name = $request->input('club_name');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'room' => 'required',
            'city' => 'required',
            'address' => 'required',
            'club_name' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to('register_event')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            //If Validator Passes
            //Find the club Id using the Club Name
            $club_id = Club::where('club_name',$club_name)->first()->id;
            
            $data=array('event_name'=>$eventName,
                "description"=>$description,
                "room"=>$room,
                "address"=>$address,
                "city"=>$city,
                'club_id'=>$club_id
            );
            if(Event::create($data)){
                return Redirect::to('/display_events');
            }
            else{
                return Redirect::to('/register_event')
                     ->withInput(); // send back the input (not the password) so that we can repopulate the form
            }    
        }
    }

    //Display the expenses
    //TODO
    public function showAllEvents(){
        $events = Event::all();
        return view('display_events', compact('events'));
    }

    //show the list of Editable Events
    public function showAllEditableEvents(){
        $events = Event::all();
        return view('edit_events', compact('events'));
    }

    //Delete an Event
    public function deleteEvent($id){
        Event::where('id', $id)->delete();
        $events = Event::all();
        return view('edit_events', compact('events'));
    }


}
