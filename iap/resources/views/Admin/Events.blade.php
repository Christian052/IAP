<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

<div class="p-6 md:p-10 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-primary mb-8">Manage Events</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-10">
        <h2 class="text-2xl font-semibold mb-4">Create New Event</h2>
        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Event Title</label>
                    <input type="text" name="title" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                    <input type="text" name="location" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                    <input type="date" name="start_date" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                    <input type="date" name="end_date" class="w-full p-2 border rounded" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full p-2 border rounded" required></textarea>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded hover:bg-blue-900 transition">
                    Save Event
                </button>
            </div>
        </form>
    </div>

    {{-- Events List --}}
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Event List</h2>
        <table class="min-w-full border text-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="p-2 text-left">Title</th>
                    <th class="p-2 text-left">Location</th>
                    <th class="p-2 text-left">Dates</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                    <tr>
                        <td class="p-2">{{ $event->title }}</td>
                        <td class="p-2">{{ $event->location }}</td>
                        <td class="p-2">{{ $event->start_date }} → {{ $event->end_date }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-4 text-center text-gray-500">No events available.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

</body>

</html>