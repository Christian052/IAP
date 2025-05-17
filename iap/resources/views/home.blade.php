<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
  <style>
    :root {
      --main-bg: #4b2c2c;
      --accent: #6b4444;
      --soft: #f8eaea;
      --text-light: #fff;
      --btn-color: #3c1e1e;
    }

    body {
      background-color: var(--soft);
    }

    .navbar {
      background-color: var(--main-bg);
    }

    .navbar .nav-link,
    .navbar-brand {
      color: var(--text-light) !important;
    }

    .navbar .btn {
      background-color: var(--btn-color);
      color: white;
      border: none;
    }

    .navbar .btn:hover {
      background-color: #2a1212;
    }

    .search-box input,
    .search-box select {
      background-color: var(--accent);
      border: none;
      color: white;
    }

    .search-box input::placeholder {
      color: #ddd;
    }

    .card {
      background-color: var(--accent);
      color: white;
      border: none;
    }

    .card img {
      object-fit: cover;
    }

    .btn-dark {
      background-color: var(--btn-color);
      border: none;
    }

    .btn-dark:hover {
      background-color: #2a1212;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg px-4"><!-- logo here in image -->
    <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="logo" height="40"></a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#">My Tickets</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Discover</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <a href="#" class="text-white me-3"><i class="fas fa-bell"></i></a>
        <a href="#" class="text-white me-3"><i class="fas fa-user-circle"></i></a>
        <a class="btn" href="#">Sign In</a>
      </div>
    </div>
  </nav>

  <!-- Search Section -->
  <div class="container mt-4">
    <div class="row g-2 search-box">
      <div class="col-md-8">
        <input type="text" class="form-control" placeholder="Search event...">
      </div>
      <div class="col-md-4">
        <select class="form-select">
          <option selected>Venue</option>
          <option value="1">Online</option>
          <option value="2">In-Person</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Next Event Section -->
  <div class="container mt-5">
    <h2 class="mb-3 text-dark">Next Event</h2>
    <div class="card mb-4">
      <img src="https://via.placeholder.com/800x300?text=Event+Image" class="card-img-top" alt="Event Image">
      <div class="card-body">
        <h5 class="card-title">Event Name</h5>
        <p class="card-text">Event Date: 12th June, 2025</p>
        <a href="#" class="btn btn-dark">Book</a>
      </div>
    </div>
  </div>

  <!-- All Events -->
  <div class="container mb-5">
    <h3 class="mb-3 text-dark">All Events</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <div class="col">
        <div class="card">
          <img src="https://via.placeholder.com/150?text=Event+Image" class="card-img-top" alt="Event image">
          <div class="card-body text-center">
            <a href="#" class="btn btn-sm btn-dark">Book</a>
          </div>
        </div>
      </div>
      <!-- Repeat for other events -->
      <div class="col">
        <div class="card">
          <img src="https://via.placeholder.com/150?text=Event+Image" class="card-img-top" alt="event image">
          <div class="card-body text-center">
            <a href="#" class="btn btn-sm btn-dark">Book</a>
          </div>
        </div>
      </div>
      <!-- You can copy more cards as needed -->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
