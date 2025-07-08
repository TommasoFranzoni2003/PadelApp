<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function destroy(Request $request, DeletesUsers $deleter)
    {
        // Validazione password inserita
        $request->validate([
            'current_password' => ['required'],
        ]);

        $user = $request->user();

        // Controllo password
        if (! Hash::check($request->input('current_password'), $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => __('La password inserita non è corretta.'),
            ]);
        }

        // Disconnetti l'utente prima di eliminarlo
        Auth::logout();

        // Elimina utente con Jetstream
        $deleter->delete($user);

        // Invalida la sessione
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect alla home
        return redirect('/')->with('status', 'Account eliminato con successo.');
    }
}
