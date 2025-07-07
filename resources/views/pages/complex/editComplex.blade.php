@extends('layouts.app')

@section('title', 'Modifica Complesso')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/form.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
<div class="container py-5" style="margin-top: 75px">
    <h1 class="text-center mb-4 text-primary fw-bold">Modifica complesso</h1>

    <form action="{{ route('complex.update', ['complexId' => $complex->id]) }}" method="POST" class="mx-auto" style="max-width: 700px;">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $complex->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $complex->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $complex->address }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Città</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $complex->city }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">CAP</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $complex->postal_code }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $complex->email }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $complex->phone }}">
        </div>

        <div class="mb-3">
            <label for="opening_hours" class="form-label">Orari di apertura (JSON)</label>
            <textarea class="form-control" id="opening_hours" name="opening_hours" rows="2">{{ $complex->opening_hours }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salva modifiche</button>
    </form>
</div>
@endsection
