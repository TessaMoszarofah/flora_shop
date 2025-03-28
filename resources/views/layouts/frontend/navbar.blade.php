<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container" id="navbar-container">
      <a class="navbar-brand" href="{{url('/')}}" id="navbar-brand">Flora Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" id="navbar-toggler">
          <span class="oi oi-menu" id="navbar-toggler-icon"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto" id="navbar-nav">
              <li class="nav-item active" id="nav-home"><a href="{{url('/')}}" class="nav-link" id="nav-link-home">Home</a></li>
              <li class="nav-item dropdown" id="nav-shop">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="nav-link-shop">Shop</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04" id="dropdown-shop">
                      <a class="dropdown-item" href="{{url('/shop')}}" id="nav-link-shop-all">Shop</a>
                      {{-- <a class="dropdown-item" href="{{url('/wishlist')}}">Wishlist</a> --}}
                      {{-- <a class="dropdown-item" href="product-single.html">Single Product</a> --}}
                      <a class="dropdown-item" href="{{url('/cart')}}" id="nav-link-cart">Cart</a>
                      <a class="dropdown-item" href="{{url('/checkout')}}" id="nav-link-checkout">Checkout</a>
                  </div>
              </li>
              <li class="nav-item" id="nav-about"><a href="{{url('/about')}}" class="nav-link" id="nav-link-about">About</a></li>
              <li class="nav-item" id="nav-contact"><a href="{{url('/kontak')}}" class="nav-link" id="nav-link-contact">Contact</a></li>
              
              @if(Route::has('login'))
              @auth
              <li class="nav-item" id="nav-logout">
                  <a href="{{route('logout')}}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" id="nav-link-logout">Logout</a>
                  <form action="{{route('logout')}}" method="post" id="logout-form">
                      @csrf
                  </form>
                  <li class="nav-item">
                    <a href="{{ url('/profile') }}" class="nav-link">
                        <span class="icon-user"></span> Profile
                    </a>
                </li>                                           
              </li>
              @else
              <li class="nav-item" id="nav-login"><a href="{{ route('login') }}" class="nav-link" id="nav-link-login">Login</a></li>
              @endauth
              @endif

              {{-- <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li> --}}
          </ul>
      </div>
  </div>
</nav>
