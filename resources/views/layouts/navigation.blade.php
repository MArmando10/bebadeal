<nav class="navbar navbar-expand-lg navbar-light bg-dark navigation-bar-style" >
  <div class="navbar-brand logoClass" >
  <img class="img-fluid img-height rounded-circle" src="{{ asset('storage/bebadeal.jpeg')}}" alt="" style="height: 47px;">
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse logoClass " id="navbarSupportedContent" >
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item active">
          <a class="nav-link navigation-font" href=" {{ route('home') }} ">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link navigation-font" href=" {{ url('product') }} ">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navigation-font" href="{{ route('product.create') }}">Agregar-producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navigation-font" href="{{ route('subasta.index') }}">Mis-Subastas</a>
        </li>
      @endauth
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        <li class="nav-item">
          <a class="nav-link navigation-font" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link navigation-font" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @endif
        @else
          <li class="nav-item dropdown a:active">
            <a id="navbarDropdown" class="nav-link dropdown-toggle navigation-font" href="#" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
      @endguest
    </ul>
  </div>
</nav>
