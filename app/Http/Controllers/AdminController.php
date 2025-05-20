<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
class AdminController extends Controller
{
    public function Dashboard(){
    $upcomingEventsCount = Events::where('Status', 'Active')
                                 ->whereDate('Date', '>=', now())
                                 ->count();

                                 
    return view('Admin.Dashboard', compact('upcomingEventsCount'));
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
 public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);

        
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Date' => 'required|date',
            'Time' => 'required|string',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Category' => 'nullable|string',
            'Status' => 'nullable|string',
        ]);

        
        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('pictures', 'public');
            $validated['Image'] = $imagePath;
        }

        
        $event->update($validated);

        
        return redirect()->route('Admin.Events')->with('Success', 'Event updated successfully!');
    }
public function destroy($id)
{
    $event = Events::findOrFail($id);
    $event->delete();

    return redirect()->back()->with('success', 'Event deleted successfully.');
}
}
