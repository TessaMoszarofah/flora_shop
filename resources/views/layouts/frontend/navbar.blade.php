<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Flora Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="{{url('/shop')}}">Shop</a>
              <a class="dropdown-item" href="{{url('/wishlist')}}">Wishlist</a>
            {{-- <a class="dropdown-item" href="product-single.html">Single Product</a> --}}
            <a class="dropdown-item" href="{{url('/cart')}}">Cart</a>
            <a class="dropdown-item" href="{{url('/checkout')}}">Checkout</a>
          </div>
        </li>
          <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
          <li class="nav-item"><a href="{{url('/kontak')}}" class="nav-link">Contact</a></li>
          @if(Route::has('login'))
          @auth
          <li class="nav-item">
            <a href="{{route('logout')}}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
        <form action="{{route('logout')}}" method="post" id="logout-form">
            @csrf
        </form>
          </li>

          @else
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          @endauth
          @endif
          {{-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li> --}}

        </ul>
      </div>
    </div>
  </nav>