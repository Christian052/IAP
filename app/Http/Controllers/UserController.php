<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class UserController extends Controller
{
    public function ShowHome(){
     $Events = Events::all();
        return view('home', compact('Events'));
    }
}
