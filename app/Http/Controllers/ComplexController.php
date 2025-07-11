<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $complex = [];

        try {
            $complex = Complex::findOrFail($complexId);
        }
        catch(ModelNotFoundException $e){   //=> Se l'id non esiste, ritorna alla pagina di visualizzazione e mostra l'errore
            return redirect()->route('complex.show')->with(['title' => 'Errore durante la ricerca', 'message' => 'Struttura non trovata']);
        }

        $decodedOpeningHours = $complex->opening_hours;

        $structuredOpeningHours = [];

        foreach (['monday','tuesday','wednesday','thursday','friday','saturday','sunday'] as $day) {
            $value = $decodedOpeningHours[$day] ?? 'closed';

            if ($value === 'closed') 
                $structuredOpeningHours[$day] = ['closed' => true];
            elseif (preg_match('/^([0-9]{2}:[0-9]{2})-([0-9]{2}:[0-9]{2})$/', $value, $matches)) {
                $structuredOpeningHours[$day] = [
                    'closed' => false,
                    'open' => $matches[1],
                    'close' => $matches[2],
                ];
            } 
            else
                $structuredOpeningHours[$day] = ['closed' => true];
        
        }

        $complex->opening_hours = $structuredOpeningHours;

        return view('pages.complex.editComplex')->with('complex', $complex);
    }

    public function update(Request $request, $complexId) {
        $complex = Complex::findOrFail($complexId);

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

        $complex->update($data);

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

