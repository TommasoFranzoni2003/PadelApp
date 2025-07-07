@extends('layouts.app')

@section('title', 'Visualizza Prenotazioni') <!-- TITOLO -->

@push('styles') <!-- AGGIUNTA STILI -->
    <link rel="stylesheet" href="{{ asset('css/pages/menu-basic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/booking/tableBooking.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
@endpush

@section('header')
    @include('partials.navbar') <!-- MENU -->
@endsection

@section('content')
    <div class="container mt-100 mb-5">
        <h2 class="mb-5 text-center">Calendario delle Prenotazioni</h2>
        <div id="calendar" data-events-url="{{ route('booking.events') }}"></div>
    </div>
@endsection

@push('scripts')     <!-- SCRIPTS -->
    <script src="{{ asset('js/pages/successModal.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="{{ asset('js/pages/viewBooking.js') }}"></script> 
@endpush