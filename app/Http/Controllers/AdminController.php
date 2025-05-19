<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
class AdminController extends Controller
{
    public function Dashboard(){
        return view('Admin.Dashboard');
    }
    public function EventsCreate(){
        return view('Admin.CreatEvent');
    }
    public function EventStore(Request $request){
    $request->validate([
        'Name' => 'required|string|min:2',
        'Date' => 'required|date',
        'Time' => 'required|string|min:3',
        'Status' => 'required|string',
        'Category' => 'required|string|min:1',
        'Location' => 'required|string|min:1',
        'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = time() . '.' . $request->Image->extension();
    $request->Image->move(public_path('picture'), $imageName);

    Events::create([
        'Name' => $request->Name,
        'Date' => $request->Date,
        'Time' => $request->Time,
        'Status' => $request->Status,
        'Category' => $request->Category,
        'Location' => $request->Location,
        'Image' => $imageName
    ]);

    return back()->with('Success', 'Upload Successfully');
}

    
    public function Events(){
    $Events = Events::orderBy('Date', 'asc')->get();

    $featuredEvent = Events::where('Status', 'Active')
                            ->whereDate('Date', '>=', now())
                            ->orderBy('Date', 'asc')
                            ->first();

    return view('Admin.Events', compact('Events', 'featuredEvent'));
}

    public function edit($id) {
    $event = Events::findOrFail($id);
    return view('Admin.EditEvent', compact('event'));
}
public function destroy($id)
{
    $event = Events::findOrFail($id);
    $event->delete();

    return redirect()->back()->with('success', 'Event deleted successfully.');
}
}
