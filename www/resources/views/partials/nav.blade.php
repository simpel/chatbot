<nav class="navbar navbar-toggleable-sm navbar-light fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Visa/dölj menyn">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">
        Värderings<strong>kompassen</strong>
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ isActiveURL('/', 'active') }}">
        <a class="nav-link" href="/">Hem <span class="sr-only">(här är du)</span></a>
      </li>
      <li class="nav-item {{ isActiveURL('/om', 'active') }}">
        <a class="nav-link" href="/om">Om</a>
      </li>
      <li class="nav-item {{ isActiveURL('/kontakt', 'active') }}">
        <a class="nav-link" href="/kontakt">kontakt</a>
      </li>
      @if (Auth::check())

        <li class="nav-item {{ isActiveURL('/anvandare', 'active') }}">
          <a class="nav-link" href="/anvandare/{{ Auth::user()->id }}">Min Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/loggaut">Logga ut</a>
        </li>
      @else
        <li class="nav-item {{ isActiveURL('/loggain', 'active') }}">
          <a class="nav-link" href="/loggain">Logga in</a>
        </li>
        <li class="nav-item {{ isActiveURL('/skapakonto', 'active') }}">
          <a class="nav-link" href="/skapakonto">Skapa konto</a>
        </li>
      @endif
    </ul>
  </div>
</nav>
