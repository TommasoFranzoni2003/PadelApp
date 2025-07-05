<x-guest-layout>
    <!-- Includo il CSS specifico per login/register -->
    <link rel="stylesheet" href="{{ asset('css/auth/registration.css') }}">

    <x-authentication-card>
        <!-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> -->

        <x-validation-errors class="mb-4 text-danger" />

        <h1 class="text-center mb-4">{{ __('Registrazione') }}</h1>
        <form method="POST" action="{{ route('register') }}" class="auth-content">
            @csrf

           <h3 class="align-left mt-4 pt-2 mb-4 border-top">{{ __('Dati anagrafici') }}</h3>
            <!-- Nome -->
            <div class="mb-3">
                <x-label for="name" value="{{ __('Nome') }}" class="form-label" />
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autocomplete="name" />
            </div>

            <!-- Cognome -->
            <div class="mb-3">
                <x-label for="surname" value="{{ __('Cognome') }}" class="form-label" />
                <x-input id="surname" class="form-control" type="text" name="surname" :value="old('surname')" required autocomplete="surname" />
            </div>

            <!-- Data di nascita -->
            <div class="mb-3">
                <x-label for="birth_date" value="{{ __('Data di nascita') }}" class="form-label" />
                <x-input id="birth_date" class="form-control" type="date" name="birth_date" :value="old('birth_date')" required/>
            </div>

            <!-- Genere -->
            <div class="mb-3">
                <x-label for="gender" value="{{ __('Genere') }}" class="form-label" />
                <select id="gender" name="gender" class="form-select" required>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Maschio</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femmina</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Altro</option>
                </select>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <x-label for="phone" value="{{ __('Telefono') }}" class="form-label" />
                <x-input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')" required/>
            </div>

            <!-- Codice fiscale -->
            <div class="mb-3">
                <x-label for="tax_code" value="{{ __('Codice Fiscale') }}" class="form-label" />
                <x-input id="tax_code" class="form-control" type="text" name="tax_code" :value="old('tax_code')" maxlength="16" required/>
            </div>

           <h3 class="align-left mt-5 pt-2 mb-4 border-top">{{ __('Dati di accesso') }}</h3>
            <!-- Email -->
            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" class="form-label" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email"/>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" value="{{ __('Password') }}" class="form-label" />
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Conferma Password -->
            <div class="mb-3">
                <x-label for="password_confirmation" value="{{ __('Conferma Password') }}" class="form-label" />
                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

           
            <div class="form-check mb-3 mt-4">
                 <x-checkbox id="terms" name="terms" class="form-check-input" required />
                <label for="terms" class="form-check-label">
                    {!! __('Accetto i :terms_of_service e l\' :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-primary text-decoration-underline">Termini di Servizio</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-primary text-decoration-underline">Informativa sulla Privacy</a>',
                    ]) !!}
                    </label>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <a href="{{ route('login') }}" class="text-primary text-decoration-underline small mb-2 mb-sm-0">
                    {{ __('Già Registrato?') }}
                </a>

                <x-button class="btn btn-primary ms-3">
                    {{ __('Registrati') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>