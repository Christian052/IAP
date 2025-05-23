<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Home Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#3e1e1e] text-white min-h-screen">

<!-- Header -->
<header class="bg-[#875151] p-4">
  <div class="flex justify-between items-center">
    <div class="font-bold text-lg">Logo</div>
    <button id="menu-toggle" class="md:hidden text-xl">
      <i class="fas fa-bars"></i>
    </button>
    <nav class="hidden md:flex gap-6 items-center">
      <a href="{{ route('Home') }}" class="hover:underline">Events</a>
      <a href="#" class="hover:underline">My Tickets</a>
      <a href="#" class="hover:underline">Discover</a>
      <a href="#" class="hover:underline">Contact us</a>
      <button aria-label="Notifications"><i class="fas fa-bell"></i></button>
      <a href="{{Route('Profile')}}" class="hover:text-blue-400"><i class="fas fa-user"></i></a>
      <!-- <button class="bg-black text-white px-4 py-1 rounded-full">Sign in</button> -->
       <a href="{{ route('signIn') }}">signIn</a>
    </nav>
  </div>
  <div id="mobile-menu" class="md:hidden  mt-4 flex flex-col gap-4">
    <a href="{{ route('Home') }}" class="hover:underline">Events</a>
    <a href="#" class="hover:underline">My Tickets</a>
    <a href="#" class="hover:underline">Discover</a>
    <a href="#" class="hover:underline">Contact us</a>
    <div class="flex gap-4 items-center">
      <button aria-label="Notifications"><i class="fas fa-bell"></i></button>
      <a href="{{Route('Profile')}}" class="hover:text-blue-400"><i class="fas fa-user"></i></a>
      <button class="bg-black text-white px-4 py-1 rounded-full">Sign in</button>
    </div>
  </div>
  <script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>
</header>

<!-- Search & Filter -->
<section class="flex flex-wrap gap-4 justify-between items-center px-10 py-4">
  <form class="flex items-center w-full max-w-xl bg-[#875151] px-4 py-2 rounded-full">
    <i class="fas fa-search mr-2 text-white"></i>
    <input id="searchInput" type="text" placeholder="Search event..." class="bg-transparent w-full outline-none placeholder-white text-white" aria-label="Search Events">
  </form>
  <div class="flex items-center gap-2 bg-[#875151] px-4 py-2 rounded-full">
    <i class="fas fa-home"></i>
    <span>Venue</span>
    <i class="fas fa-chevron-down"></i>
  </div>
  <div class="bg-[#875151] p-2 rounded-full">
    <i class="fas fa-ellipsis-h"></i>
  </div>
</section>

<!-- Main Content -->
<div class="m-5 bg-[#875151] rounded-lg">
  <main class="p-10">
    <!-- Featured Event -->
    @php
      use Illuminate\Support\Carbon;
      $featuredEvent = collect($Events)->first(function ($event) {
        $status = trim(strtolower($event->Status));
        $eventDate = Carbon::parse($event->Date);
        return $status === 'active' && $eventDate->isSameDay(now()) || $eventDate->isFuture();
      });
    @endphp

    @if($featuredEvent)
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
      <div class="lg:col-span-2 bg-white text-black h-80 flex items-center justify-center rounded-lg overflow-hidden">
        <img loading="lazy" src="{{ asset('picture/' . $featuredEvent->Image) }}" alt="{{ $featuredEvent->Name }}" class="h-full w-full object-cover">
      </div>
      <div class="bg-white text-black p-4 rounded-lg">
        <div class="h-32 w-full overflow-hidden rounded mb-2">
          <img loading="lazy" src="{{ asset('picture/' . $featuredEvent->Image) }}" alt="{{ $featuredEvent->Name }}" class="h-full w-full object-cover">
        </div>
        <div class="text-sm mb-2 space-y-1">
          <p class="font-semibold">{{ $featuredEvent->Name }}</p>
          <p>Event Date: {{ $featuredEvent->Date }}</p>
          <p>Time: {{ $featuredEvent->Time }}</p>
          <p>Status: <span class="text-green-600">{{ ucfirst($featuredEvent->Status) }}</span></p>
        </div>
        <!-- <button class="bg-black text-white px-4 py-1 rounded-full">Book</button> -->
         <a href="{{ route('book') }}"class="bg-black text-white px-4 py-1 rounded-full">book</a>
      </div>
    </section>
    @else
      <p class="text-white mb-6 text-sm">No upcoming featured event available.</p>
    @endif

    <!-- All Events -->
    <section>
      <h2 class="text-lg mb-4">All Events</h2>
      <div id="eventGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3">
        @forelse($Events as $event)
        <div class="event-card bg-white text-black p-2 text-sm rounded-lg">
          <div class="h-32 w-full overflow-hidden rounded mb-2">
            <img src="{{ asset('picture/' . $event->Image) }}" alt="{{ $event->Name }}" class="h-full w-full object-cover">
          </div>
          <p class="event-name font-semibold">{{ $event->Name }}</p>
          <p>{{ $event->Date }}</p>
          <p>{{ $event->Time }}</p>
          <p>Status: <span class="text-green-600">{{ $event->Status }}</span></p>
          <button class="bg-black text-white px-2 py-1 text-xs rounded-full mt-2">Book</button>
        </div>
        @empty
        <p class="text-white col-span-full">No events available at this time.</p>
        @endforelse
      </div>
    </section>
  </main>
</div>

<!-- Footer -->
<footer class="bg-[#875151] text-white py-12 mt-16">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
    <div>
      <h2 class="text-2xl text-gray-900 font-bold mb-2">EMS</h2>
      <p class="text-sm text-black mb-4">Your trusted partner for discovering and managing events with ease.</p>
      <div class="flex space-x-4 mt-4">
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-x"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-blue-400 text-gray-900"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900">Company</h3>
      <ul class="space-y-2 text-sm text-black">
        <li><a href="#" class="hover:text-white">About Us</a></li>
        <li><a href="#" class="hover:text-white">Careers</a></li>
        <li><a href="#" class="hover:text-white">Press</a></li>
        <li><a href="#" class="hover:text-white">Blog</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900">Support</h3>
      <ul class="space-y-2 text-sm text-black">
        <li><a href="#" class="hover:text-white">Help Center</a></li>
        <li><a href="#" class="hover:text-white">Terms of Service</a></li>
        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
        <li><a href="#" class="hover:text-white">Accessibility</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-3 text-gray-900">Stay Updated</h3>
      <p class="text-sm text-black mb-4">Get event news and exclusive offers in your inbox.</p>
      <form class="flex flex-col space-y-2">
        <input type="email" placeholder="Your email" class="px-4 py-2 rounded bg-gray-800 text-white placeholder-gray-400 border border-gray-600 focus:outline-none focus:border-blue-500">
        <button class="bg-blue-600 hover:bg-blue-700 rounded py-2 text-sm font-semibold">Subscribe</button>
      </form>
    </div>
  </div>
  <div class="border-t border-gray-900 mt-12 pt-6 text-center text-sm text-black">
    &copy; {{ date('Y') }} EMS. All rights reserved.
  </div>
</footer>

<!-- JavaScript for Search -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const eventCards = document.querySelectorAll('.event-card');

    searchInput.addEventListener('input', () => {
      const query = searchInput.value.toLowerCase().trim();
      eventCards.forEach(card => {
        const name = card.querySelector('.event-name').textContent.toLowerCase();
        card.style.display = name.includes(query) ? 'block' : 'none';
      });
    });
  });
</script>

</body>
</html>
