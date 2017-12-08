<?php

namespace App\Http\Controllers;

use App\User;
use App\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Participant;

class ProblemHistoryController extends Controller
{
    /*
    * Example of a controller for an item
    */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); //Connexion needed for viewing history of an event
    }

    /**
     * Create new problem
     *
     * @return \Illuminate\Http\Response
     */
    public function createItem(Request $request)
    {
	$this->validateRequest($request);

        $problem = new ProblemHistory();
        $problem->latitude = $request->input("latitude");
        $problem->longitude = $request->input("longitude");
        $problem->description = $request->input("description");
	$problem->occured_at = $request->input('occured_at');
	$problem->event_id = $request->input('event_id');


        $message = 'There was an error';
        if ($problem->save($problem)) {
            $message = 'Problem successfully created!';
        }

	if(Event::join('participants', 'events.id', '=', 'participants.event_id')->where(['participants.id' => Auth::user(), 'accepted' => 1]) == null)
	{
	    $message = 'You can\'t post on an event you are not invited';
	}
	$problem->participant_id = $request->input('participant_id');

        return redirect()->action('EventController@getEvent', ['id' => $event_id])->with('message', $message);
    }

    private function validateRequest($request)
    {
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d H:i:s',
            'situation' => 'required|is_situation_enum',
            'description' => 'required|max:300',
	    'position' => 'valid_position',
	    'latitude' => 'valid_latitude',
	    'longitude' => 'valid_longitude',
        ]);
    }
}
