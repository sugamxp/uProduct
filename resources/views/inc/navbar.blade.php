{{-- 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"><i class="fas fa-parachute-box"></i> uProduct</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Top-10</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
     
    </div>
  </nav> --}}

  {{-- php artisan make:controller ProductsController --resource  --}}
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel ">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-parachute-box" style="color:black"></i> {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
                  <li><a class="p-2 text-dark" href="/">Index</a></li>
                  <li><a class="p-2 text-dark" href="/about">About</a></li>
                  <li><a class="p-2 text-dark" href="/services">Services</a></li>
                  <li><a class="p-2 text-dark" href="/posts">Posts</a></li>
                  <li><a href="/dashboard" class="p-2 text-dark">Dashboard</a></li>
              </ul>
          </div>
      </div>
  </nav>