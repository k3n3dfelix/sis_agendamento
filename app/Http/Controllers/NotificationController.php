<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
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

    public function notification(Request $request){
       
        $notifications =$request->user()->notifications;

        return response()->json(compact('notifications'));
    }
}
