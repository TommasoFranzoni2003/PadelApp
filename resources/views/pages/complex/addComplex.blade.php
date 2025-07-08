@extends('layouts.app')

@section('title', 'Aggiungi Complesso')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/complex/addComplex.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/menu-basic.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    <h1 class="text-center mb-4 text-primary fw-bold">Aggiungi un nuovo complesso</h1>
    <h4 class="fst-italic text-center text-muted"> 
        Inserisci nome, descrizione, location, stato operativo e dati di pricing.<br>
        Carica un’immagine e assegna il campo al complesso corretto prima di salvare. 
    </h4>

    <div class="container mb-4">

        <form action="{{ route('complex.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto">
            @csrf

            <div class="row"> <!-- 1° RIGA -->
                <div class="col-md-6 p-5"> <!-- COLONNA DI SINISTRA --> 
                    <div class="form-group py-2"> <!-- NOME -->
                        <label for="name" class="form-label">Nome del complesso</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group py-2">  <!-- DESCRIZIONE -->
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group py-2"> <!-- EMAIL -->
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group py-2"> <!-- TELEFONO -->
                        <label for="phone" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="col-md-6 p-5 d-flex flex-column align-items-start justify-content-center bg-column"> <!-- COLONNA DI DESTRA -->
                    <div class="form-group py-2">  <!-- CITTA -->
                        <label for="city" class="form-label">Città</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group py-2"> <!-- INDIRIZZO -->
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group py-2">  <!-- CAP -->
                        <label for="postal_code" class="form-label">CAP</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center align-items-center mt-5"> <!-- CREAZIONE DELLA RIGA -->
                @php 
                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                @endphp   

                <div class="col-1 text-end">    <!-- 1° COLONNA (SINISTRA) -->
                    <div class="swiper-button-prev position-static"></div> <!-- FRECCIA SINISTRA (PRECEDENTE)-->
                </div>

                <div class="col-10"> <!-- COLONNA CENTRALE - SWIPER -->
                    <div class="swiper mySwiper">   <!-- SWIPER -->
                        <div class="swiper-wrapper">
                            @foreach($days as $day)
                                @php
                                    $value = old("opening_hours.$day", $complex->opening_hours[$day] ?? '');
                                    $isClosed = $value === 'closed';
                                    [$open, $close] = !$isClosed && str_contains($value, '-') ? explode('-', $value) : [null, null];
                                @endphp

                                <div class="swiper-slide">  <!-- SINGOLA SLIDE -->
                                    <div class="card">  <!-- CARD -->
                                        <div class="card-header d-flex justify-content-between align-items-center"> <!-- CARD HEADER-->
                                            <strong>{{ ucfirst($day) }}</strong>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input toggle-closed" id="closed_{{$day}}"
                                                    name="opening_hours[{{ $day }}][closed]" value="1" {{ $isClosed ? 'checked' : '' }}>
                                                <label for="closed_{{ $day }}" class="form-check-label">Chiuso</label>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex gap-2 align-items-center"> <!-- CARD BODY -->
                                            <label class="form-label mb-0">Dalle</label>
                                            <input type="time" name="opening_hours[{{ $day }}][open]" class="form-control open-time"
                                                value="{{ $open }}" {{ $isClosed ? 'disabled' : '' }}>

                                            <label class="form-label mb-0">Alle</label>
                                            <input type="time" name="opening_hours[{{ $day }}][close]" class="form-control close-time"
                                                value="{{ $close }}" {{ $isClosed ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> 

                <div class="col-1 text-start"> <!-- 3° COLONNA (DESTRA) -->
                    <div class="swiper-button-next position-static"></div> <!-- FRECCIA DESTRA (SUCCESSIVO)-->
                </div>
            </div>

            <div class="row tex-center p-5">   <!-- 2° RIGA -->
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-color">Aggiungi Complesso</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/pages/complex/addComplex.js') }}"></script>
    <script src="{{ asset('js/pages/complex/swiper-addComplex.js') }}"></script>
@endpush