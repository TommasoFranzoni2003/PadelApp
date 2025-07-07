@extends('layouts.app')

@section('title', 'View Complex') <!-- TITOLO -->

@push('styles') <!-- STILI SPECIFICI -->
    <link rel="stylesheet" href="{{ asset('css/pages/menu-basic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/complex/viewComplex.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')

    @if(session('success'))
        <x-modals.message-modal :title="session('title')" :message="session('message')" />
    @endif

    <div class="container py-5" style="margin-top: 75px">
        <h1 class="text-center mb-2 fw-bold text-primary">I nostri complessi sportivi</h1>
        <h4 class="fst-italic mb-5 text-center text-muted">Scopri le strutture dove puoi prenotare i tuoi campi preferiti.</h4>
        
        <div class="row">
            @forelse ($complexes as $complex)
                <div class="col-md-4 mb-4 mt-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $complex->name }}</h5>
                            <p class="card-text text-center">{{ $complex->description }}</p>
                            <p class="card-text"><strong>Indirizzo:</strong> {{ $complex->address }}, {{ $complex->city }} ({{ $complex->postal_code }})</p>
                            <p class="card-text"><strong>Email:</strong> {{ $complex->email }}</p>
                            <p class="card-text"><strong>Telefono:</strong> {{ $complex->phone }}</p>
                            <p class="card-text"><strong>Orari di apertura:</strong></p>

                            @php
                                $openingHours = is_string($complex->opening_hours)
                                    ? json_decode($complex->opening_hours, true)
                                    : $complex->opening_hours;
                            @endphp

                            @if(is_array($openingHours))
                                <ul>
                                    @foreach ($openingHours as $day => $hours)
                                      <x-modals.delete-modal :id="$complex->id" :name="is_array($complex->name) ? implode(' ', $complex->name) : $complex->name" />
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted fst-italic">Orari non disponibili.</p>
                            @endif
                        </div>

                        @if(Auth::user() && Auth::user()->hasRole('admin'))
                            <div class="card-footer text-center">
                                <a href="{{ route('complex.edit', ['complexId' => $complex->id ?? null]) }}" class="btn btn-primary mt-2">
                                    Modifica
                                </a>

                                <a href="{{ route('complex.delete', ['complexId' => $complex->id ?? null]) }}" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{$complex->id}}">
                                    Elimina
                                </a>

                                <x-modals.delete-modal :id="$complex->id" :name="$complex->name" />
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nessun complesso disponibile.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/successModal.js') }}"></script>
@endpush
