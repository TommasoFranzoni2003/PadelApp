@extends('layouts.app')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    <video class="video-bg" src="{{ asset('video/videoPadel3.mov') }}" autoplay muted loop></video>

    <div id="section1" class="section watch">
        <h2 class="title">Divertimento e sport a portata di mano!</h2> <br>
        <h4 class="subtitle">Scegli il campo perfetto e <br> prenota subito per un'esperienza indimenticabile</h4>
    </div>

    <div id="panel" class="panel">

        <div class="panel-header text-center mb-4">
            <h2>Il tuo prossimo campo da padel ti aspetta!</h2> <br>
            <h4>Sfoglia le nostre strutture e trova il campo ideale per allenarti o divertirti con gli amici.</h4>
        </div>

        <div id="carouselCourts" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner text-center">
            @foreach($courts->chunk(3) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row">
                            @foreach($chunk as $court)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <img src="{{ asset('storage/' . $court->image_path) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $court->name }}</h5>
                                            <p class="card-text">{{ $court->description }}</p>
                                            <p class="card-text"><small class="text-muted">{{ $court->type }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="carousel-indicators">
            @foreach($courts->chunk(3) as $chunkIndex => $chunk)
                <button type="button" data-bs-target="#carouselCourts" data-bs-slide-to="{{ $chunkIndex }}" 
                    class="{{ $chunkIndex === 0 ? 'active' : '' }}" 
                    aria-current="{{ $chunkIndex === 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $chunkIndex + 1 }}">
                </button>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="" class="btn btn-primary btn-lg mt-4 text-center" role="button">
                Prenota
            </a>
        </div>

    </div>

   
    <div class="container-fluid py-5 bg-image">
        <div class="container text-center">
        
            <div class="row g-4 h-100">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Titolo 1</h5>
                            <span class="d-block my-2 border-top border-primary w-25 mx-auto"></span>
                            <p class="card-text">Questo è un esempio di testo descrittivo per la prima card.</p>
                        </div>
                    </div>
                </div>
            
        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Titolo 2</h5>
                <span class="d-block my-2 border-top border-primary w-25 mx-auto"></span>
                <p class="card-text">Testo descrittivo per la seconda card, che può essere personalizzato.</p>
            </div>
            </div>
        </div>
        
        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Titolo 3</h5>
                <span class="d-block my-2 border-top border-primary w-25 mx-auto"></span>
                <p class="card-text">Qui puoi aggiungere altro testo informativo per la terza card.</p>
            </div>
            </div>
        </div>
        </div>

    </div>
    </div>

    <div class="panel">
        <div class="container py-5">
        <!-- Sezione titolo e sottotitolo -->
        <div class="text-center mb-5">
        <h1>Titolo Principale</h1>
        <p class="lead text-muted">Questo è il sottotitolo della sezione, descrizione breve e accattivante.</p>
        </div>

        <!-- Sezione 4 colonne con icone e testo -->
        <div class="row text-center">
        <div class="col-md-3 mb-4">
            <i class="bi bi-speedometer2 icon"></i>
            <h5>Velocità</h5>
            <p>Descrizione breve sull'icona della velocità.</p>
        </div>
        <div class="col-md-3 mb-4">
            <i class="bi bi-shield-lock icon"></i>
            <h5>Sicurezza</h5>
            <p>Testo che spiega il concetto di sicurezza.</p>
        </div>
        <div class="col-md-3 mb-4">
            <i class="bi bi-phone icon"></i>
            <h5>Accessibilità</h5>
            <p>Informazioni sull'accessibilità tramite dispositivi mobili.</p>
        </div>
        <div class="col-md-3 mb-4">
            <i class="bi bi-gear icon"></i>
            <h5>Configurabilità</h5>
            <p>Dettagli sulle opzioni di configurazione disponibili.</p>
        </div>
        </div>
    </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush
