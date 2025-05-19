<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Events;

class UserController extends Controller
{
    public function ShowHome(){
         $Events = Events::whereDate('Date', '>=', Carbon::today())
                    ->orderBy('Date')
                    ->get();

    return view('home', compact('Events'));
    }
}
