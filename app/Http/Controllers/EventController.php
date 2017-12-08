<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use App\User;


use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexEvent()
    {
        //Faire condition si il y a event en cours return view viewEvent avec l'id de l'envet en cours
        //Si pas d'event en cours return view myEvents
        return view('event.index', ['currents' => [], 'futures' => [], 'pasts' => []]);
    }

    public function getEvent($eventid)
    {
        return view('event.view', ['event' => Event::findOrFail($eventid)]);
    }

    public function createEvent()
    {
        return view('event.create');
    }

    public function storeEvent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'begin_date' => 'required',
            'visibility' => 'required',
        ]);

        $event = new Event();
        $event->name = $request->input("name");
        $event->description = $request->input("description");
        $event->place = $request->input("place");

        /*WARNING !!! TEMP AFFECTATION*/
        $event->photo = "photo";

        $event->begin_date = $request->input("begin_date");
        $event->end_date = $request->input("end_date");
        $event->orga_id = Auth::user();
        $event->visibility = $request->input("visibility");


        $message = 'There was an error';
        if ($event->save()) {
            $message = 'Event successfully created!';
        }

        return redirect()->route('event.index')->with('message', $message);
    }

    public function deleteParticipant($event_id, $user_id){
        $toMatch=['event_id' => $event_id, 'user_id' => $user_id];
        $participant=Participant::where($toMatch)->delete();
        return redirect()->route('event.view', ['eventid' => $event_id]);
    }
}
