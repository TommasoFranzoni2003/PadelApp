@extends('layouts.app')

@section('title', 'Edit Court') <!-- TITOLO -->

@push('styles') <!-- AGGIUNTA STILI -->
    <link rel="stylesheet" href="{{ asset('css/formCourt.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuOtherPages.css') }}">
@endpush

@section('header')  
    @include('partials.navbar') <!-- MENU -->
@endsection

@section('content') <!-- CONTENT -->

    <div class="container pt-5 mt-5 mb-4">

        <!-- FORM -->
        <form method="POST" action="{{ route('court.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6"> <!-- NOME CAMPO -->
                    <label for="inputName">Nome</label>
                    <input type="text" class="form-control" name="name" id="inputName" value="{{ $court->name }}" required>
                </div>
                <div class="form-group col-md-6">   <!-- TIPO CAMPO -->
                    <label class="my-1 mr-2" for="selectType">Tipo</label> <br>
                    <select class="custom-select my-1 mr-sm-2" name="type" id="selectType">
                        <option value="" disabled selected>Seleziona una voce</option>
                        <option value="indoor">Indoor</option>
                        <option value="outdoor">Outdoor</option>
                    </select>
                </div>
                <div class="form-group col-md-6">   <!-- DESCRIZIONE CAMPO -->
                    <label for="inputDescription">Descrizione</label>
                     <input type="text" class="form-control" name="description" id="inputDescription" placeholder="">
                </div>
                <div class="form-group col-md-6">   <!-- LOCATION CAMPO -->
                    <label for="inputLocation">Location</label>
                    <input type="text" class="form-control" name="location" id="inputLocation" placeholder="">
                </div>
                <div class="form-group col-md-6"> <!-- PREZZO CAMPO -->
                    <label for="inputPrice">Prezzo € / h</label>
                    <input type="number" step="0.01" class="form-control" name="price_per_hour" id="inputPrice" placeholder="">
                </div>
                <div class="form-group col-md-6">   <!-- STATO DEL CAMPO -->
                    <label class="my-1 mr-2" for="selectType">Status</label> <br>
                    <select class="custom-select my-1 mr-sm-2" name="status" id="selectType">
                        <option selected>Seleziona una voce</option>
                        <option value="active">Attivo</option>
                        <option value="inactive">Inattivo</option>
                        <option value="maintenance">In Manutenzione</option>
                    </select>
                </div>
                <div class="form-group col-md-6"> <!-- ID DEL COMPLESSO IN CUI SI TROVA -->
                    <label for="inputComplexId">Id Complesso</label>
                    <input type="number" class="form-control" name="complex_id" id="inputComplexId" placeholder="">
                </div>
                <div class="form-group col-md-6">  <!-- CARICAMENTO IMMAGINE DEL CAMPO -->
                    <label for="image">Immagine del campo</label>
                    <input type="file" class="form-control" name="image_path" id="image">
                </div>
            </div>
            
            <button type="submit" class="btn btn-color">Add</button>
        </form>
    </div>
@endsection