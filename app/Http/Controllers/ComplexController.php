<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Http\Request;

class ComplexController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable|array',
        ]);

        Complex::create($validate);

        return redirect()->back()->with(['title' => 'Inserimento Effettuato', 'success' => 'Complesso inserito con successo']);
    }

    public function showAll()
    {
        $complexes = Complex::all();
        return view('pages.complex.viewComplex')->with('complexes', $complexes);
    }

    public function edit($complexId = null)
    {
        if ($complexId === null) {
            return abort(404);
        }

        $complex = Complex::findOrFail($complexId);
        return view('pages.complex.editComplex')->with('complex', $complex);
    }

    public function update(Request $request, $complexId)
    {
        $complex = Complex::findOrFail($complexId);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'opening_hours' => 'nullable|array',
        ]);

        $complex->update($validate);

        return redirect()->route('complex.showAll')->with(['title' => 'Modifica Effettuata', 'success' => 'Complesso aggiornato con successo']);
    }

    public function delete(Request $request, $complexId)
    {
        try {
            $complex = Complex::findOrFail($complexId);
            $complex->delete();
        } catch (\Exception $e) {
            return redirect()->route('complex.showAll')->withErrors('Errore durante l\'eliminazione');
        }

        return redirect()->route('complex.showAll')->with('success', 'Complesso eliminato con successo');
 
    }

    public function selectComplex($number = 9) {
    $complexes = \App\Models\Complex::take($number)->get(); 
    return view('pages.complex.viewComplex', compact('complexes'));
    }
}

