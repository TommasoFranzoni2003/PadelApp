<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-transparent custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        {{-- Dropdown Campi --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="campiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Campi </a>
          <ul class="dropdown-menu" aria-labelledby="campiDropdown">
            @auth
              @if (Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route('court.store') }}">Inserisci Campo</a></li>
              @endif
            @endauth
            <li><a class="dropdown-item" href="{{ route('court.show') }}">Visualizza Campi</a></li>
          </ul>
        </li>

        {{-- Dropdown Strutture --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="struttureDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Strutture </a>
          <ul class="dropdown-menu" aria-labelledby="struttureDropdown">
            
            @auth
              @if (Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="">Inserisci Struttura</a></li>
              @endif
            @endauth

            <li><a class="dropdown-item" href="">Visualizza Struttura</a></li>
          </ul>
        </li>

        {{-- Dropdown Prenotazioni --}}
        @auth
          @if (Auth::user()->hasAnyRole(['admin', 'user']))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="prenotazioniDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Prenotazioni
              </a>
              <ul class="dropdown-menu" aria-labelledby="prenotazioniDropdown">
                <li><a class="dropdown-item" href="{{ route('booking.add') }}">Iscrizione</a></li>
                <li><a class="dropdown-item" href="{{ route('booking.show') }}">Visualizza</a></li>
              </ul>
            </li>
          @endif
        @endauth

        {{-- Link per ospiti --}}
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
          </li>
        @endguest

        {{-- Dropdown utente loggato --}}
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#">Profilo</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
