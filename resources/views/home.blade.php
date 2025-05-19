<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Home Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#5c2e2e] text-white min-h-screen">

  <!-- Header -->
  <header class="bg-[#875151] p-4 flex justify-between items-center">
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
      <button aria-label="User Profile"><i class="fas fa-user"></i></button>
      <button class="bg-black text-white px-4 py-1 rounded-full">Sign in</button>
    </div>
  </header>

  <!-- Search & Filter -->
  <section class="flex flex-wrap gap-4 justify-between items-center bg-[#3e1e1e] px-10 py-4">
    <div class="flex items-center w-full max-w-xl bg-[#875151] px-4 py-2 rounded-full">
      <i class="fas fa-search mr-2"></i>
      <input type="text" placeholder="Search event..." class="bg-transparent w-full outline-none placeholder-white text-white" aria-label="Search Events">
    </div>
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
  <main class="p-10">

    <!-- Featured Event -->
    @php
      $featuredEvent = collect($Events)->first(function ($event) {
        return $event->Status === 'Active' && $event->Date >= now()->toDateString();
      });
    @endphp

    @if($featuredEvent)
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
      <div class="lg:col-span-2 bg-white text-black h-64 flex items-center justify-center rounded-lg overflow-hidden">
        <img src="{{ asset('picture/' . $featuredEvent->Image) }}" alt="{{ $featuredEvent->Name }}" class="h-full w-full object-cover">
      </div>
      <div class="bg-white text-black p-4 rounded-lg">
        <div class="h-32 w-full overflow-hidden rounded mb-2">
          <img src="{{ asset('picture/' . $featuredEvent->Image) }}" alt="{{ $featuredEvent->Name }}" class="h-full w-full object-cover">
        </div>
        <div class="text-sm mb-2 space-y-1">
          <p class="font-semibold">{{ $featuredEvent->Name }}</p>
          <p>Event Date: {{ $featuredEvent->Date }}</p>
          <p>Time: {{ $featuredEvent->Time }}</p>
          <p>Status: <span class="text-green-600">{{ $featuredEvent->Status }}</span></p>
        </div>
        <button class="bg-black text-white px-4 py-1 rounded-full">Book</button>
      </div>
    </section>
    @else
      <p class="text-white mb-6 text-sm">No upcoming featured event available.</p>
    @endif

    <!-- All Events -->
    <section>
      <h2 class="text-lg mb-4">All Events</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3">
        @forelse($Events as $event)
          <div class="bg-white text-black p-2 text-sm rounded-lg">
            <div class="h-32 w-full overflow-hidden rounded mb-2">
              <img src="{{ asset('picture/' . $event->Image) }}" alt="{{ $event->Name }}" class="h-full w-full object-cover">
            </div>
            <p class="font-semibold">{{ $event->Name }}</p>
            <p>{{ $event->Date }}</p>
            <p>{{ $event->Time }}</p>
            <p>Status: 
              <span class="{{ $event->Status == 'Active' ? 'text-green-600' : 'text-red-500' }}">
                {{ $event->Status }}
              </span>
            </p>
            <button class="bg-black text-white px-2 py-1 text-xs rounded-full mt-2">Book</button>
          </div>
        @empty
          <p class="text-white col-span-full">No events available at this time.</p>
        @endforelse
      </div>
    </section>

  </main>
</body>
</html>
