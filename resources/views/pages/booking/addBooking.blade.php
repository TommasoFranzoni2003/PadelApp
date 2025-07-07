@extends('layouts.app')

@section('title', 'Visualizza Prenotazioni') <!-- TITOLO -->

@push('styles') <!-- AGGIUNTA STILI -->
    <!-- CSS di flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="{{ asset('css/pages/menu-basic.css') }}">
@endpush

@section('header')
    @include('partials.navbar') <!-- MENU -->
@endsection

@section('content')
    <h1 class="text-center mb-2 mt-5 pt-5 fw-bold text-primary">Aggiungi un nuovo campo da padel</h1>
    <h4 class="fst-italic text-center text-muted"> 
        Inserisci nome, descrizione, location, stato operativo e dati di pricing.<br>
        Carica un’immagine e assegna il campo al complesso corretto prima di salvare. 
    </h4>

    <div class="container mb-4">
        <!-- FORM -->
        <form method="POST" action="{{ route('booking.store', ['court' => $court]) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group py-2">   
                <label for="inputDay">Giorno</label>
                <input type="date" class="form-control" name="day" id="inputDay" placeholder="Inserisci il giorno" required>
            </div>
            <div class="form-group py-2">   
                <label for="selectStartTime">Orario</label>
                <select name="startTime" id="selectStartTime" class="form-control" required>
                    <option value="">Seleziona un orario</option>
                </select>
            </div>  
        <!--    <div class="form-group py-2">   
                <label for="selectNumberOfPlayer">Orario</label>
                <select name="numberOfPlayer" id="selectNumberOfPlayer" class="form-control" required>
                    <option value="">Seleziona il numero di giocatori</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                </select>
            </div>  -->

            <div class="row text-center p-5">
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-color">Prenota</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <!-- JS di flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @php
        $openingHoursJson = json_encode(optional($court->complex)->opening_hours ?? []);
        $bookingSlotsJson = json_encode($bookings->map(function ($b) {  /* Collection di oggetti Booking */
            return [
                'start' => $b->start_time->format('Y-m-d H:i'), /* Conversione da Carbon a stringhe per JS */
                'end' => $b->end_time->format('Y-m-d H:i')
            ];
        }));
    @endphp

    <script>
        const openingHours = JSON.parse('{!! $openingHoursJson !!}');
        const bookings = JSON.parse('{!! $bookingSlotsJson !!}');
    </script>
    
    <script src="{{ asset('js/pages/addBooking.js') }}"></script>
@endpush
