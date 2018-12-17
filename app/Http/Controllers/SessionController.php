<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Day;

class SessionController extends Controller
{
    public function newSession(Request $request)
    {
        $searchDate = $request->input('searchDate', null);
        dump($searchDate);
    }

    /*
    * GET /sessions
    */
    public function index()
    {
        $sessions = Session::orderby('created_at', 'desc')->take(3)->get();
        $days = Day::orderby('date')->get();

        return view('sessions.index')->with([
            'days' => $days,
            'sessions' => $sessions
        ]);
    }
}
