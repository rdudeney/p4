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
     * Show a particular session
     */

    public function show(Request $request, $id)
    {
        $session = Session::find($id);

        return view('sessions.show')->with([
            'session' => $session
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

        $day = Day::where('date', '=', $request->date)->first();

        if(!$day)
        {
            $day = new Day();
            $day->date = $request->date;
            $day->save();
        }

        $session = new Session();
        $session->hours = $request->hours;
        $session->day_id = $day->id;
        $session->save();

        $session->descriptions()->sync($request->descriptions);

        return redirect('/sessions')->with([
            'alert' => 'Your session has been added.'
        ]);
    }

    public function edit($id)
    {
        $session = Session::find($id);

        $descriptions = Description::getForCheckboxes();

        $descriptionsForThisSession = $session->descriptions()->pluck('descriptions.id')->toArray();

        if (!$session) {
            return redirect('/sessions')->with([
                'alert' => 'Session not found.'
            ]);
        }

        return view('sessions.edit')->with([
            'session' => $session,
            'descriptions' => $descriptions,
            'descriptionsForThisSession' => $descriptionsForThisSession,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hours' => 'required',
            'date' => 'required',
            'descriptions' => 'required'
        ]);

        $session = Session::find($id);
        $day = Day::where('date', '=', $request->date)->first();

        $session->descriptions()->sync($request->descriptions);

        $session->hours = $request->hours;
        $session->day_id = $day->id;
        $session->save();

        return redirect('/sessions/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }
}
