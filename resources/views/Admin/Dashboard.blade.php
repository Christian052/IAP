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

<body class="overflow-x-hidden flex flex-col md:flex-row">
    <!-- Sidebar -->
    <div id="sidebar" class="w-full md:w-1/5 bg-primary text-white md:fixed h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40">
        <div class="p-4 flex flex-col justify-between h-full">
            <div>
                <h1 class="text-2xl mt-4 text-center">Admin</h1>
                <ul class="mt-12 pl-8 text-left space-y-8">
                    <li><a href="{{ Route('Admin.Dashboard') }}" class="hover:text-indigo-300 block">Dashboard</a></li>
                    <li><a href="{{ Route('Admin.Events') }}" class="hover:text-indigo-300 block">Manage Events</a></li>
                    <li><a href="#" class="hover:text-indigo-300 block">Manage Users</a></li>
                    <li><a href="#" class="hover:text-indigo-300 block">Notifications</a></li>
                    <li><a href="#" class="hover:text-indigo-300 block">Feedback</a></li>
                    <li><a href="#" class="hover:text-indigo-300 block">Reports</a></li>
                </ul>
            </div>
            <div>
                <a href="#" class="hover:text-indigo-300 block">Logout</a>
            </div>
        </div>
    </div>

    <!-- Mobile Hamburger Button -->
    <button onclick="toggleSidebar()" class="md:hidden p-4 text-primary z-50">
        ☰
    </button>

    <!-- Main Content -->
    <div class="w-full md:ml-[20%] p-8">
        <h1 class="text-2xl mb-6">Welcome to Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                <p class="text-3xl text-primary">1,234</p>
            </div>
            <a href="{{Route('Admin.Events')}}">
            <div class="bg-white p-6 rounded-lg shadow hover:bg-blue-100">
                <h2 class="text-xl font-semibold mb-2">Upcoming Events</h2>
                <!-- Display the upcoming events count dynamically -->
                <p class="text-3xl text-primary">{{ $upcomingEventsCount }}</p>
            </div>
            </a>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-2">New Messages</h2>
                <p class="text-3xl text-primary">23</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-2">Make Reports</h2>
                <p class="text-3xl text-primary">23</p>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>

</html>
