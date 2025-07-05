<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-transparent custom-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        {{-- Dropdown Campi --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="campiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestione Campi
          </a>
          <ul class="dropdown-menu" aria-labelledby="campiDropdown">
            <li><a class="dropdown-item" href="">Visualizza Campi</a></li>
            
            @auth
              @if (Auth::user()->role === 'admin')
                <li><a class="dropdown-item" href="">Inserisci Campo</a></li>
                <li><a class="dropdown-item" href="">Modifica Campo</a></li>
                <li><a class="dropdown-item" href="">Rimuovi Campo</a></li>
              @endif
            @endauth
          </ul>
        </li>

        {{-- Dropdown Prenotazioni (solo per admin e user) --}}
        @auth
          @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="prenotazioniDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Prenotazioni
              </a>
              <ul class="dropdown-menu" aria-labelledby="prenotazioniDropdown">
                <li><a class="dropdown-item" href="">Iscrizione</a></li>
                <li><a class="dropdown-item" href="">Visualizza</a></li>
              </ul>
            </li>
          @endif
        @endauth

        {{-- Link Login e Registrati per ospiti --}}
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
          </li>
        @endguest

        {{-- Dropdown Utente loggato --}}
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="">Profilo</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
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
