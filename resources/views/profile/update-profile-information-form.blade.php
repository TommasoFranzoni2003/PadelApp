<x-guest-layout>
    <!-- css specifico -->
    <link rel="stylesheet" href="{{ asset('css/auth/update.css') }}">
    <x-validation-errors class="mb-4 text-danger" />

    @if (session('status'))
       <div class="mb-4 font-medium text-sm text-success">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="text-center mb-4">{{ __('Modifica del profilo') }}</h1>
    
    <form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto Profilo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3">
                <x-label for="photo" value="{{ __('Foto Profilo') }}" class="form-label" />

                <!-- Preview attuale -->
                <div class="mb-2">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="rounded-circle object-cover" style="width: 80px; height: 80px;">
                </div>

                <!-- Input file -->
                <input type="file" name="photo" id="photo"
                    class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endif

        <!-- Nome -->
        <div class="mb-3">
            <x-label for="name" value="{{ __('Nome') }}" class="form-label" />
            <x-input id="name"
                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    type="text"
                    name="name"
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                    autocomplete="name" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Cognome -->
        <div class="mb-3">
            <x-label for="surname" value="{{ __('Cognome') }}" class="form-label" />
            <x-input id="surname"
                    class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}"
                    type="text"
                    name="surname"
                    value="{{ old('surname', auth()->user()->surname ?? '') }}"
                    required
                    autocomplete="family-name" />
            @error('surname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Data di nascita -->
        @php
            $birthDate = old('birth_date', optional(auth()->user())->birth_date ? auth()->user()->birth_date->format('Y-m-d') : '');
        @endphp

        <div class="mb-3">
            <x-label for="birth_date" value="{{ __('Data di nascita') }}" class="form-label" />
            <x-input id="birth_date"
                    class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                    type="date"
                    name="birth_date"
                    value="{{ $birthDate }}"
                    required />
            @error('birth_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Codice fiscale -->
        <div class="mb-3">
            <x-label for="fiscal_code" value="{{ __('Codice Fiscale') }}" class="form-label" />
            <x-input id="fiscal_code"
                    class="form-control {{ $errors->has('tax_code') ? 'is-invalid' : '' }}"
                    type="text"
                    name="tax_code"
                    value="{{ old('tax_code', auth()->user()->tax_code ?? '') }}"
                    required />
            @error('fiscal_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Numero di telefono -->
        <div class="mb-3">
            <x-label for="phone" value="{{ __('Numero di telefono') }}" class="form-label" />
            <x-input id="phone"
                    class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                    type="tel"
                    name="phone"
                    value="{{ old('phone', auth()->user()->phone ?? '') }}"
                    required
                    autocomplete="tel" />
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Pulsante Salva -->
        <div class="d-flex justify-content-end mt-4">
            <x-button class="btn-color btn-primary me-2">
                {{ __('Aggiorna') }}
            </x-button>

            <x-button class="btn-color btn-secondary" onclick="window.location='{{ route('homepage') }}'">
              {{ __('Torna indietro') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>


