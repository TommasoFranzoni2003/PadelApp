<x-guest-layout>
    <!-- CSS specifico -->
    <link rel="stylesheet" href="{{ asset('css/auth/update.css') }}">
    <script src="{{ asset('js/auth/password_validation.js') }}"></script>

    @if ($errors->any())
        <div class="status-message status-error mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('status'))
        <div class="status-message mb-4">
            {{ __('Password aggiornata con successo!') }}
        </div>
    @endif

    <h1 class="text-center mb-4">{{ __('Modifica della password') }}</h1>

    <form id="password-update-form" method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <!-- Password corrente -->
        <div class="mb-3">
            <x-label for="current_password" value="{{ __('Password corrente') }}" class="form-label" />
            <x-input id="current_password" type="password" name="current_password"
                     class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                     required autocomplete="current-password" />
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nuova password -->
        <div class="mb-3">
            <x-label for="password" value="{{ __('Nuova password') }}" class="form-label" />
            <x-input id="password" type="password" name="password"
                     class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                     required autocomplete="new-password" />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Conferma nuova password -->
        <div class="mb-3">
            <x-label for="password_confirmation" value="{{ __('Conferma nuova password') }}" class="form-label" />
            <x-input id="password_confirmation" type="password" name="password_confirmation"
                     class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                     required autocomplete="new-password" />
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Pulsanti -->
        <div class="d-flex mt-4 gap-3 w-100 justify-content-end">
            <x-button class="btn-color btn-primary flex-grow-1 text-center">
                {{ __('Salva') }}
            </x-button>

            <x-button class="btn-color btn-secondary flex-grow-1 text-center" type="button"
                onclick="window.location='{{ route('profile.show') }}'">
                {{ __('Torna indietro') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>

