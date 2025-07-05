<?php

namespace App\Http\Controllers;

use App\Models\Court;
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
            'status' => 'required|in:active,maintenance',
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

    public function delete() {

    }

    public function update() {

    }
}
