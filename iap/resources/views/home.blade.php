<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Home Page</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-[#5c2e2e] text-white min-h-screen">
    <!-- Header -->
    <header class="bg-[#875151] p-4 flex justify-between items-center">
        <div class="flex items-center gap-10">
            <span class="font-bold text-lg">Logo</span>
            <nav class="flex gap-6">
                <a href="#" class="hover:underline">Events</a>
                <a href="#" class="hover:underline">My Tickets</a>
                <a href="#" class="hover:underline">Discover</a>
                <a href="#" class="hover:underline">Contact us</a>
            </nav>
        </div>
        <div class="flex items-center gap-6">
            <button><i class="fas fa-bell"></i></button>
            <button><i class="fas fa-user"></i></button>
            <button class="bg-black text-white px-4 py-1 rounded-full">Sign in</button>
        </div>
    </header>

    <!-- Search & Filter -->
    <div class="flex justify-between items-center bg-[#3e1e1e] px-10 py-4">
        <div class="flex items-center w-full max-w-xl bg-[#875151] px-4 py-2 rounded-full">
            <i class="fas fa-search mr-2"></i>
            <input type="text" placeholder="Search event..." class="bg-transparent w-full outline-none placeholder-white text-white">
        </div>
        <div class="ml-4 flex items-center gap-2 bg-[#875151] px-4 py-2 rounded-full">
            <i class="fas fa-home"></i>
            <span>Venue</span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="ml-auto bg-[#875151] p-2 rounded-full">
            <i class="fas fa-ellipsis-h"></i>
        </div>
    </div>

    <!-- Main Content -->
    <div class="p-10">
        <!-- Featured and Next Event -->
        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="col-span-2 bg-white text-black h-64 flex items-center justify-center">
                <span class="text-2xl font-bold">Event Image</span>
            </div>
            <div class="bg-white text-black p-4">
                <div class="h-32 bg-gray-200 flex items-center justify-center mb-2">
                    <span>Event Image</span>
                </div>
                <div class="text-sm mb-2">
                    <p class="font-semibold">Event Name</p>
                    <p>Event Date</p>
                    <p>Time: 12:00 PM</p>
                    <p>Status: <span class="text-green-600">Active</span></p>
                </div>
                <button class="bg-black text-white px-4 py-1 rounded-full">Book</button>
            </div>
        </div>

        <!-- All Events -->
        <h2 class="text-lg mb-4">All Event</h2>
        <div class="grid grid-cols-6 gap-4">
            @for ($i = 0; $i < 12; $i++)
                <div class="bg-white text-black p-2 text-sm">
                    <div class="h-20 bg-gray-200 mb-2 flex items-center justify-center">
                        <span>Event Image</span>
                    </div>
                    <p>Event name</p>
                    <p>Event Date</p>
                    <p>12:00 PM</p>
                    <p>Status: <span class="text-green-600">Active</span></p>
                    <button class="bg-black text-white px-2 py-1 text-xs rounded-full mt-1">Book</button>
                </div>
            @endfor
        </div>
    </div>
</div>
</body>
</html>
