<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#151664',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap');
        * {
            font-family: 'Noto Serif', serif;
        }
    </style>
</head>

<body class="flex flex-col md:flex-row">
    <div id="sidebar" class="w-full md:w-1/5 bg-primary text-white md:fixed h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4">
            <h1 class="text-2xl mt-4 text-center">Admin</h1>
            <ul class="mt-12 pl-8 text-left space-y-8">
                <li><a href="{{Route('Admin.Dashboard')}}" class="hover:text-indigo-300 block">Dashboard</a></li>
                <li><a href="{{Route('Admin.Events')}}" class="hover:text-indigo-300 block">Manage Events</a></li>
                <li><a href="#" class="hover:text-indigo-300 block">Manage Users</a></li>
                <li><a href="#" class="hover:text-indigo-300 block">Notifications</a></li>
                <li><a href="#" class="hover:text-indigo-300 block">Feedback</a></li>
                <li><a href="#" class="hover:text-indigo-300 block">Reports</a></li>
                <li class="absolute bottom-8"><a href="#" class="hover:text-indigo-300 block">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="w-full md:ml-[20%] p-8">
  <div class="p-6 md:p-10  min-h-screen">
    <h1 class="text-3xl font-bold text-primary mb-8">Manage Events</h1>
     <!-- Events List -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class=" flex justify-between mb-2">
            <h2 class="text-2xl font-semibold mb-4">Event List</h2>
            <button popovertarget="event">Create Event</button>
            <!-- <a href="{{Route('Admin.Events.Create')}}" class="bg-primary text-white px-6 py-2  rounded hover:bg-blue-900 transition">Create Event</a> -->
        </div>
    <div id="event" popover class="bg-white p-6 rounded-lg shadow-md mb-10">
        <h2 class="text-2xl font-semibold mb-4">Create New Event</h2>
         @if (session('Success'))
            <div class="text-green-600">{{session('Success')}}</div>
        @endif
        <form action="{{Route('Admin.Events.Store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                    <input type="text" name="Name" class="w-full p-2 border rounded" >
                    @error('Name')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="Location" class="w-full p-2 border rounded" >
                    @error('Location')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="Date" class="w-full p-2 border rounded" >
                    @error('date')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                    <input type="text" name="Time" class="w-full p-2 border rounded" >
                    @error('Time')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <img id="img" style="max-width: 150px">
                    <input type="file" name="Image" onchange="img.src =window.URL.createObject(this.files[])"
                     class="w-full p-2 border rounded" >
                    @error('Image')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input list="category"  name="Category" class="w-full p-2 border rounded">
                    <datalist id="category">
                        <option value="Music"></option>
                        <option value="Movie"></option>
                        <option value="Football"></option>
                    </datalist>
                    @error('Category')
                       <p class=" text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <input type="text" name="Status" class="w-full p-2 border rounded" >
                    @error('Status')
                       <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <input type="submit" value="Upload" class="bg-primary text-white px-6 py-2 rounded hover:bg-blue-900 transition">
                <button popovertarget="event">Close</button>
                 
            </div>
        </form>
    </div>

        <table class="min-w-full border text-sm table-fixed">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="p-2 text-left">Image</th>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Location</th>
                    <th class="p-2 text-left">Date</th>
                    <th class="p-2 text-left">Time</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($Events as $event)
                    <tr>
                        <td class="p-2">
                           <img src="{{asset('picture/' . $event->Image)}}" alt="{{ $event->Name }}" width="40px" height="40px">
                        </td>
                        <td class="p-2">{{ $event->Name }}</td>
                        <td class="p-2">{{ $event->Location }}</td>
                        <td class="p-2">{{ $event->Date }}</td>
                        <td class="p-2">{{ $event->Time }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
 </div>

</body>

</html>