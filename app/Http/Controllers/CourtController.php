<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function store(Request $request) {

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:indoor,outdoor',
            'description' => 'string|max:255',
            'location' =>  'required|string|max:255',
            'price_per_hour' =>  'required|float|min:0',
            'status' => 'required|in:active,maintenance',
            'complex_id' => 'required'
        ]);
    }

    public function delete() {

    }

    public function update() {

    }
}
