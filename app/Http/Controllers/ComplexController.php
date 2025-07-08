<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ComplexController extends Controller
{
    public function store(Request $request) {

        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => ['required', 'digits:5'],
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'opening_hours' => 'required|array',
        ]);

        if($validate->fails())
            return redirect()->back()->withErrors($validate);

        $opening_hours = [];
        foreach($request->input('opening_hours') as  $day => $data) {
            if(isset($data['closed']) && $data['closed'])
                $opening_hours[$day] = 'closed';
            elseif(!empty($data['open']) && !empty($data['close']))
                $opening_hours[$day] = "{$data['open']}-{$data['close']}";
            else
                $opening_hours[$day] = 'closed';
        }

        $data = $validate->validated();
        $data['opening_hours'] = $opening_hours;

        Complex::create($data);

        return redirect()->back()->with(['title' => 'Inserimento Effettuato', 'message' => 'Complesso inserito con successo']);
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

    public function update(Request $request, $complexId) {
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

        return redirect()->route('complex.showAll')->with(['title' => 'Modifica Effettuata', 'message' => 'Complesso aggiornato con successo']);
    }

    public function delete(Request $request, $complexId) {
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

