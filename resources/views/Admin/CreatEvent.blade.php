<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Event</title>
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
   <div class="p-6 md:p-10 bg-gray-100 min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md mb-10">
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
                    <input type="text" name="Category" class="w-full p-2 border rounded">
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
            <div class="mt-6">
                <input type="submit" value="Upload" class="bg-primary text-white px-6 py-2 rounded hover:bg-blue-900 transition">
                 
            </div>
        </form>
    </div>
</div>
</div>

</body>

</html>