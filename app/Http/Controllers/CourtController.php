<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function store(Request $request) {

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:indoor,outdoor',
            'description' => 'string|max:255',
            'location' =>  'required|string|max:255',
            'price_per_hour' =>  'required|numeric|min:0',
            'status' => 'required|in:active,inactive,maintenance',
            'complex_id' => 'required|integer',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image_path')) {   //=> Se l'immagine esiste viene salvata
            $imagePath = $request->file('image_path')->store('courts', 'public'); // salva in storage/app/public/courts
            $validate['image_path'] = $imagePath;
        }

        $validate['is_available'] = true;
        
        Court::create($validate);

        return redirect()->back()->with("success", "Court added");
    }

    public function showAll() {
        $query = Court::query();

        /** @var User $user */
        $user = Auth::user();   //=> Specifico il tipo di $user (VS non sa qual è il tipo ritornato generando)

        if(!($user && $user->hasRole('admin')))
            $query->where('status', 'active');
        
        $court = $query->get();

        return view('pages.court.viewCourt')->with('courts', $court);
    }

    public function selectCourt($number = 9) {  //=> Default = 9
        $courts = Court::take($number)->get();
        return view('homepage', compact('courts'));
    }

    public function edit($courtId = null) {
        $court = [];

        if($courtId == null){
            return ;
        }
        $court = Court::all()->findOrFail($courtId);
        return view('pages.court.editCourt')->with('court', $court);
    }

    public function delete() {

    }

    public function update() {   
       
    }
}
