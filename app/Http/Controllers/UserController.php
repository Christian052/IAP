<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

    $user = User::create([
        'fullnames' => $validated['fullnames'],
        'gender' => $validated['gender'],
        'dob' => $validated['dob'],
        'country' => $country,
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'password' => Hash::make($validated['password']),
    ]);

    // Automatically log the user in
    Auth::login($user);

    // Redirect to homepage or dashboard
    return redirect()->route('Home')->with('success', 'Account created and logged in successfully.');
}
    public function contactUs(){
        return view('contactUs');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('Home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
