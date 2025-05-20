<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="{{'css/style.css'}}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-[#5c2e2e]">

  <!-- HEADER -->
  <header class="bg-[#875151] p-4 flex justify-between items-center text-white">
    <div class="flex items-center gap-10">
      <span class="font-bold text-lg">Logo</span>
      <nav class="flex gap-6">
        <a href="{{ route('Home') }}" class="hover:underline">Events</a>
        <a href="#" class="hover:underline">My Tickets</a>
        <a href="#" class="hover:underline">Discover</a>
        <a href="#" class="hover:underline">Contact us</a>
      </nav>
    </div>
    <div class="flex items-center gap-6">
      <button aria-label="Notifications"><i class="fas fa-bell"></i></button>
    <a href="{{Route('Profile')}}" class="hover:text-blue-400"><i class="fas fa-user"></i></a>
      <button class="bg-black text-white px-4 py-1 rounded-full">Sign in</button>
    </div>
  </header>

  <!-- PROFILE CARD -->
  <div class="max-w-4xl mx-auto mt-12 p-6 bg-[#875151] rounded-xl shadow-lg">
    <!-- Profile Header -->
    <div class="flex items-center justify-between">
      <div class="flex items-center space-x-6">
        <img class="w-24 h-24 rounded-full object-cover border" src="https://i.pravatar.cc/100?img=3" alt="User" />
        <div>
          <h2 class="text-2xl font-bold text-black">{{ Auth::user()->name ?? 'Doctor Wi Shavu' }}</h2>
          <p class="text-sm text-black ">{{ Auth::user()->email ?? 'doctorshavu@gmail.com' }}</p>
          <p class="text-sm text-black">Rwanda</p>
        </div>
      </div>
      <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Edit Profile</button>
    </div>

    <!-- User Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8 text-center">
      <div class="bg-[#5c2e2e] p-4 rounded-xl">
        <p class="text-2xl font-bold text-blue-600">15</p>
        <p class="text-sm text-black">Tickets Booked</p>
      </div>
      <div class="bg-[#5c2e2e] p-4 rounded-xl">
        <p class="text-2xl font-bold text-green-600">4</p>
        <p class="text-sm text-black">Upcoming Events</p>
      </div>
      <div class="bg-[#5c2e2e] p-4 rounded-xl">
        <p class="text-2xl font-bold text-red-600">1</p>
        <p class="text-sm text-black">Canceled</p>
      </div>
    </div>

    <!-- Detailed Info -->
    <div class="mt-10">
      <h3 class="text-xl font-semibold text-black mb-4">Profile Information</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="text-sm text-black">Full Name</label>
          <p class="text-black">{{ Auth::user()->name ?? 'Doctor Wi Shavu' }}</p>
        </div>
        <div>
          <label class="text-sm text-black">Email</label>
          <p class="text-black">{{ Auth::user()->email ?? 'doctorshavu@gmail.com' }}</p>
        </div>
        <div>
          <label class="text-sm text-black">Phone</label>
          <p class="text-black">{{ Auth::user()->phone ?? '+250 798 516 187' }}</p>
        </div>
        <div>
          <label class="text-sm text-black">Date of Birth</label>
          <p class="text-black">{{ Auth::user()->dob ?? '1998-07-12' }}</p>
        </div>
      </div>
    </div>

    <!-- Actions -->
    <div class="mt-8 flex justify-end space-x-4">
      <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Change Password</button>
      <form method="#" action="">
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Logout</button>
      </form>
    </div>
  </div>
  
  
  <footer class="bg-[#875151] text-white py-12 mt-16">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
    
    <!-- Logo & Description -->
    <div>
      <h2 class="text-2xl text-gray-900 font-bold mb-2">EMS</h2>
      <p class="text-sm text-black mb-4">Your trusted partner for discovering and managing events with ease.</p>
      <div class="flex space-x-4 mt-4">
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <!-- Navigation -->
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900">Company</h3>
      <ul class="space-y-2 text-sm text-black">
        <li><a href="#" class="hover:text-white">About Us</a></li>
        <li><a href="#" class="hover:text-white">Careers</a></li>
        <li><a href="#" class="hover:text-white">Press</a></li>
        <li><a href="#" class="hover:text-white">Blog</a></li>
      </ul>
    </div>

    <!-- Support -->
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900">Support</h3>
      <ul class="space-y-2 text-sm text-black">
        <li><a href="#" class="hover:text-white">Help Center</a></li>
        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
        <li><a href="#" class="hover:text-white">Accessibility</a></li>
      </ul>
    </div>

    <!-- Newsletter -->
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900 ">Stay Updated</h3>
      <p class="text-sm text-black mb-4">Get event news and exclusive offers in your inbox.</p>
      <form class="flex flex-col space-y-2">
        <input type="email" placeholder="Your email" class="px-4 py-2 rounded bg-gray-800 text-white placeholder-gray-400 border border-gray-600 focus:outline-none focus:border-blue-500">
        <button class="bg-blue-600 hover:bg-blue-700 rounded py-2 text-sm font-semibold">Subscribe</button>
      </form>
    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="border-t border-gray-900 mt-12 pt-6 text-center text-sm text-black">
    &copy; {{ date('Y') }} EMS. All rights reserved.
  </div>
</footer>



</body>
</html>
