<header>
    <nav class="navbar navbar-expand-md shadow-sm" id="navbarr">
            <div class="container">
                <a class="navbar-brand" style="font-size: 4rem;text-transform: uppercase;color: white;letter-spacing: 2px;font-family:'Monofett', cursive;" href="{{ url('/') }}">
                    Deliveboo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                    <div class="rightt">
                        <!-- Left Side Of Navbar -->
                        <ul class="log-reg">

                          <!-- Authentication Links (HEADER) -->
                            @guest
                              <li id="login">
                                <a href="{{ route('login') }}">{{ __('Accedi') }}</a>
                              </li>
                              @if (Route::has('register'))
                              <li id="register">
                                <a href="{{ route('register') }}">{{ __('Registrati') }}</a>
                              </li>
                              @endif
                            @else
  
                          </ul>
                          
                          <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto log-reg mob" >
                                        <a class="nav-link dropdown-toggle logoutt" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                          {{ Auth::user() -> name }}
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-right sub-logoutt" id="sub-logoutt" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                      </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                        </form>
                                    </div>                       
                            @endguest
                          </ul>
                  </div>

              </div>
          </nav>
  </header>              
