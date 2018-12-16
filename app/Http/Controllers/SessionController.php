<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function newSession(Request $request)
    {
        $searchDate = $request->input('searchDate', null);
        
    }
}
