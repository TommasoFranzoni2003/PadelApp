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
            <li><a class="dropdown-item" href="{{ route('court.show') }}">Visualizza Campi</a></li>

            @auth
              @if (Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route('court.store') }}">Inserisci Campo</a></li>
                {{-- Inserire rotte reali per modifica/rimozione se esistono --}}
                {{-- <li><a class="dropdown-item" href="{{ route('court.edit') }}">Modifica Campo</a></li> --}}
                {{-- <li><a class="dropdown-item" href="{{ route('court.delete') }}">Rimuovi Campo</a></li> --}}
              @endif
            @endauth
          </ul>
        </li>

        {{-- Dropdown Complessi --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="complessiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestione Complessi
          </a>
          <ul class="dropdown-menu" aria-labelledby="complessiDropdown">
            <li><a class="dropdown-item" href="{{ route('complex.showAll') }}">Visualizza Complessi</a></li>

            @auth
              @if (Auth::user()->hasRole('admin'))
                <li><a class="dropdown-item" href="{{ route('complex.create') }}">Inserisci Complesso</a></li>
                {{-- Puoi aggiungere rotte per modifica/rimozione se necessarie --}}
              @endif
            @endauth
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
                <li><a class="dropdown-item" href="#">Iscrizione</a></li>
                <li><a class="dropdown-item" href="#">Visualizza</a></li>
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
