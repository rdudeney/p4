<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Day;
use App\Description;

class SessionController extends Controller
{

    /*
    * GET /sessions
    */
    public function index()
    {
        $sessions = Session::with('day')->get()->sortByDesc('day.date');
        $newSessions = $sessions->sortByDesc('created_at')->take(3);

        return view('sessions.index')->with([
            'newSessions' => $newSessions,
            'sessions' => $sessions,
        ]);
    }

    /*
     * GET descriptions information
     */
    public function newSession(Request $request)
    {
        #$searchDate = $request->input('searchDate', null);
        #$days = Days::all();
        $descriptions = Description::getForCheckboxes();

        return view('sessions.add')->with([
            'descriptions' => $descriptions,
        ]);
    }

    public function store(Request $request)
    {
        #Validate the request data
        $request->validate([
            'hours' => 'required',
            'date' => 'required',
            'descriptions' => 'required'
        ]);

        dd($request->descriptions);


    }
}
