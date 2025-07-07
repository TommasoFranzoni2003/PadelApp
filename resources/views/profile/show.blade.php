<x-guest-layout>
    <!-- css specifico -->
    <link rel="stylesheet" href="{{ asset('css/auth/show.css') }}">

    <div class="max-w-3xl mx-auto py-12 px-8 bg-white rounded-lg shadow-md">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-10">
            {{ __('Profilo Utente') }}
        </h2>

        <div class="bg-white rounded-lg p-6">
            <!-- info del profilo -->
            <div class="profile-container">
                <div class="profile-row">
                    <div class="label">Nome:</div>
                    <div class="value">{{ Auth::user()->name }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Cognome:</div>
                    <div class="value">{{ Auth::user()->surname }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Email:</div>
                    <div class="value">{{ Auth::user()->email }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Data di nascita:</div>
                    <div class="value">{{ Auth::user()->birth_date->format('d/m/Y') }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Data creazione account:</div>
                    <div class="value">{{ Auth::user()->created_at->format('d/m/Y') }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Genere:</div>
                    <div class="value">{{ Auth::user()->gender == 'male' ? 'Maschio' : (Auth::user()->gender == 'female' ? 'Femmina' : 'Altro') }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Codice Fiscale:</div>
                    <div class="value">{{ Auth::user()->tax_code }}</div>
                </div>

                <div class="profile-row">
                    <div class="label">Telefono:</div>
                    <div class="value">{{ Auth::user()->phone }}</div>
                </div>
            </div>

           <!-- Contenitore Bottoni -->
            <div class="button-row">
                <!-- bottone per la modifica -->
                <a href="{{ route('profile.edit') }}"  style="text-decoration: none; color: inherit;">
                    <x-button class="btn-color btn-primary">
                        {{ __('Modifica account') }}
                    </x-button>
                </a>

                <x-button class="btn-color btn-secondary" onclick="window.history.back();">
                    {{ __('Torna indietro') }}
                </x-button>

                <!--elimina account-->
                <a href="{{ route('profile.delete') }}"  style="text-decoration: none; color: inherit;">
                    <x-button class="btn-color btn-primary red">
                        {{ __('Elimina account') }}
                    </x-button>
                </a>

                
            </div>

    </div>

</x-guest-layout>

