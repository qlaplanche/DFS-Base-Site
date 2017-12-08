<?php

namespace App\Http\Controllers;

use App\Event;
use App\ProblemHistory;

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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Faire condition si il y a event en cours return view viewEvent avec l'id de l'envet en cours
        //Si pas d'event en cours return view myEvents
        return view('event.index', ['currents' => [], 'futures' => [], 'pasts' => []]);
    }

    public function getEvent($eventid)
    {
        return view('event.view', ['event' => Event::findOrFail($eventid)]);
    }

    /**
     * Create new item
     *
     * @return \Illuminate\Http\Response
     */
    public function createProblem(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:200',
            'longitude' => 'required|max:50',
            'latitude' => 'required|max:50',
            'situation' => 'required',
        ]);

        $problem = new ProblemHistory();
        $problem->description = $request->input("description");
        $problem->longitude = $request->input("longitude");
        $problem->latitude = $request->input("latitude");

        


        $message = 'There was an error';
        if ($problem->save()) {
            $message = 'Problem successfully created!';
            session(['alert-class' => 'warning']);
            session(['alert-msg' => 'Je suis perdu']);
            session(['alert-btn' => 'Terminée']);
        }

        return redirect()->route('item.index')->with('message', $message);
    }
}
