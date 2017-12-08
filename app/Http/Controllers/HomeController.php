<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;

class HomeController extends Controller
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
        $user = Auth::user();

        $event = Event::join('participants', 'participants.event_id', '=', 'events.id')
            ->join('users', 'users.id', '=', 'participants.user_id')
            ->where('users.id', $user->id)
            ->whereDate('begin_date', date('Y-m-d'))
            ->first();

        if($event){
            return redirect()->route('event.view', ['id' => $event->id]);
        }

        return redirect()->route('events');
    }
}
