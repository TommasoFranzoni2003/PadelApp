@extends('layouts.app')

@section('title', 'Aggiungi Complesso')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/form.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
<div class="container py-5" style="margin-top: 75px">
    <h1 class="text-center mb-4 text-primary fw-bold">Aggiungi un nuovo complesso</h1>

    <form action="{{ route('complex.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 700px;">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome del complesso</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Città</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">CAP</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (opzionale)</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefono (opzionale)</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="opening_hours" class="form-label">Orari di apertura (JSON es: {"Lun": "9-21"})</label>
            <textarea class="form-control" id="opening_hours" name="opening_hours" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi Complesso</button>
    </form>
</div>
@endsection
