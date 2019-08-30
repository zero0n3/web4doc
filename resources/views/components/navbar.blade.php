  <nav class="light-blue lighten-1" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Web4Doc</a>
          @if (Auth::guest())
              <ul class="right hide-on-med-and-down">
                  <li><a class="navbar-item " href="{{ route('login') }}">Login</a></li>
                  
              </ul>
          @else

              <ul class="right hide-on-med-and-down">
                  <li><a class="navbar-link" href="#">{{ Auth::user()->name }}</a></li>
                  <li><a href="/athlete">Atleti</a></li>
                  <li><a href="/team">Team</a></li>
                  <li><a href="/sport">Sport</a></li>
                  <li><a href="/checkup">Visite</a></li>
                  <li><a class="navbar-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          Logout
                      </a></li>
                  <li><form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                          {{ csrf_field() }}
                      </form></li>
              </ul>

              <ul id="nav-mobile" class="sidenav">
                  <li><a class="navbar-link" href="#">{{ Auth::user()->name }}</a></li>
                  <li><a href="/athlete">Atleti</a></li>
                  <li><a href="/team">Team</a></li>
                  <li><a href="/sport">Sport</a></li>
                  <li><a href="/checkup">Visite</a></li>
                  <li><a class="navbar-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          Logout
                      </a></li>
                  <li><form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                          {{ csrf_field() }}
                      </form></li>
              </ul>
              <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @endif
      </div>
  </nav>
