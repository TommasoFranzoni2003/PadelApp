@extends('layouts.app')

@section('title', 'View Court')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/menuOtherPages.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container py-5" style="margin-top: 75px">
        <h1 class="text-center mb-5">Tutti i campi disponibili</h1>
        <div class="row">
            @forelse ($courts as $court)
                <div class="col-md-4 mb-4 mt-3">
                    <div class="card h-100 shadow-sm">
                        @if($court->image_path)
                            <img src="{{ asset('storage/' . $court->image_path) }}" class="card-img-top" alt="{{ $court->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $court->name }}</h5>
                            <p class="card-text text-center">{{ $court->description }}</p>
                            <p class="card-text"><strong>Tipo:</strong> {{ ucfirst($court->type) }}</p>
                            <p class="card-text"><strong>Prezzo/Ora:</strong> €{{ number_format($court->price_per_hour, 2) }}</p>
                            <p class="card-text"><strong>Stato:</strong> {{ ucfirst($court->status) }}</p>
                            <p class="card-text"><strong>Località:</strong> {{ $court->location }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Nessun campo disponibile.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection