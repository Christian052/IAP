<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Events;

use App\Models\User;

class UserController extends Controller
{
    public function ShowHome(){
         $Events = Events::whereDate('Date', '>=', Carbon::today())
                    ->orderBy('Date')
                    ->get();

    return view('home', compact('Events'));
    }
    public function UserProfile(){
        return view('UserProfile');
    }
    public function book(){
        return view('book');
    }
    public function signIn(){
        return view('signIn');
    }
    public function signUp(){
        return view('signup');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullnames' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'country' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|confirmed|min:6',
        ]);

        $country = $request->country === 'other' ? $request->other_country : $request->country;

        User::create([
            'fullnames' => $validated['fullnames'],
            'gender' => $validated['gender'],
            'dob' => $validated['dob'],
            'country' => $country,
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('signin')->with('success', 'Account created successfully.');
    }
    public function contactUs(){
        return view('contactUs');
    }
}
