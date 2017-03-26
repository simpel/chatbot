<nav class="nav has-shadow is-sticky">
  <div class="container">
    <div class="nav-left">
      <a href='/' class="nav-item is-brand {{ isActiveURL('/', 'is-active') }}">
        Värderings<strong>kompassen</strong>
      </a>
      <a href='/om' class="nav-item is-tab is-hidden-mobile {{ isActiveURL('/om', 'is-active') }}">Om</a>
      <a href='/kontakt' class="nav-item is-tab is-hidden-mobile {{ isActiveURL('/kontakt', 'is-active') }}">Kontakt</a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a href='/om' class="nav-item is-tab is-hidden-tablet {{ isActiveURL('/om', 'is-active') }}">Om</a>
      <a href='/kontakt' class="nav-item is-tab is-hidden-tablet {{ isActiveURL('/om', 'is-active') }}">Kontakt</a>
      
      @if (Auth::check())
        <a href='/anvandare/{{ Auth::user()->id }}' class="nav-item is-tab {{ isActiveURL('/om', 'is-active') }}">
        <figure class="image is-16x16" style="margin-right: 8px;">
          <img src="/content/users/{{ Auth::user()->id }}_avatar.png">
        </figure>
        Min Profil
      </a>
      <a href="/loggaut" class="nav-item is-tab">Logga ut</a>
      @else
        <a href="{{ url('/loggain') }}" class="nav-item is-tab">Logga in</a>
        <span class="nav-item"><a href="{{ url('/skapakonto') }}" class="button is-primary">Skapa konto</a></span>
      @endif


      
    </div>
  </div>
</nav>