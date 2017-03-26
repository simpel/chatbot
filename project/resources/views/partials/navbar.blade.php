
<nav class="navbar navbar-inverse navbar-toggleable-md bg-primary fixed-top">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Värderings<strong>kompassen</strong></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Hem <span class="sr-only">(current)</span></a>
        </li>
        @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Logga in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Skapa konto</a>
            </li>
        @else
              
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a  href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                          class="dropdown-item">
                      Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                  </div>
              </li>

              
          @endif
      </ul>
    </div>
  </div>
</nav>
