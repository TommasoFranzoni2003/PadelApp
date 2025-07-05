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
        <h1 class="title">Vivi ogni punto, conquista la vittoria!</h1>
        <h4 class="subtitle">Sfida te stesso e i tuoi amici in partite indimenticabili</h4>
    </div>
    <div id="section2" class="section watch">
        <h2 class="title">Divertimento e sport a portata di mano!</h2> <br>
        <h4 class="subtitle">Scegli il campo perfetto e <br> prenota subito per un'esperienza indimenticabile</h4>
    </div>

    <div id="panel" class="panel">
    <div id="carouselCourts" class="carousel slide" data-bs-ride="carousel">

        {{-- Indicatori (pallini) --}}
        <div class="carousel-indicators">
            @foreach($courts->chunk(3) as $chunkIndex => $chunk)
                <button type="button" data-bs-target="#carouselCourts" data-bs-slide-to="{{ $chunkIndex }}" 
                    class="{{ $chunkIndex === 0 ? 'active' : '' }}" 
                    aria-current="{{ $chunkIndex === 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $chunkIndex + 1 }}">
                </button>
            @endforeach
        </div>

        <div class="carousel-inner">
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

        {{-- FRECCE RIMOSSE --}}
        {{-- 
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCourts" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCourts" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        --}}

    </div>
</div>


@endsection

@push('scripts')
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush
