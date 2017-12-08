<?php

namespace App\Http\Controllers;

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
}
