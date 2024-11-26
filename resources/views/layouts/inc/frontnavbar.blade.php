<style>
  /* Fresh, Modern Styling */
  .navbar {
    background: linear-gradient(45deg, #1d2b64, #f8cdda); /* Gradient background */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
  }

  .navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #fff !important;
  }

  .navbar-toggler {
    border: none; /* Clean up the toggle button */
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%2855, 255, 255, 0.7%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }

  .nav-link {
    font-size: 1.1rem;
    color: #f4f4f9 !important;
    padding: 0.8rem;
    transition: all 0.3s ease; /* Smooth hover transition */
  }

  .nav-link.active,
  .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px; /* Add rounded corners */
    color: #fff !important;
  }

  /* Dropdown Styles */
  .dropdown-menu {
    background-color: #1d2b64; /* Dark, fresh background for dropdown */
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px; /* Smooth rounded corners */
    padding: 0.5rem 0;
    animation: fadeIn 0.3s ease; /* Subtle fade-in effect */
  }

  .dropdown-menu .dropdown-item {
    color: #f4f4f9;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .dropdown-menu .dropdown-item:hover {
    background-color: #495057;
    color: #fff;
  }

  /* Custom dropdown icon (caret) */
  .nav-item.dropdown .nav-link::after {
    content: "\25BC"; /* Unicode for downward arrow (caret) */
    margin-left: 0.5rem;
    font-size: 0.8rem;
    color: #f4f4f9;
  }

  /* Remove default Bootstrap caret if it exists */
  .dropdown-toggle::after {
    display: none !important; /* Ensure no default caret shows */
  }

  /* Smooth hover effect for underline */
  .navbar .ms-auto .nav-item .nav-link {
    position: relative;
  }

  .navbar .ms-auto .nav-item .nav-link::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background-color: #fff;
    transform: scaleX(0);
    transition: transform 0.3s ease;
  }

  .navbar .ms-auto .nav-item .nav-link:hover::before {
    transform: scaleX(1);
  }

  /* Keyframe for dropdown fade-in animation */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">E-shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/')? 'active':'' }}" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('category')? 'active':'' }}" href="/category">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart')? 'active':'' }}" href="/cart">Cart</a>
        </li>

        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login')}}">{{ __('Login')}}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="/register">{{ __('Register') }}</a>
        </li>
        @endif

        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item"  href="/my-order">My Order</a>
            </li>
            <li>
              <a class="dropdown-item"  href="/user-order-history">Order History</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>

            </li>
          </ul>
        </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>