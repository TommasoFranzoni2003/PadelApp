@extends('layouts.app')

@section('title', 'Add Court')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/addCourt.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    <div class="container pt-5 mt-5 mb-4">
        <form method="POST" action="">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                    <label class="my-1 mr-2" for="selectType">Tipo</label> <br>
                    <select class="custom-select my-1 mr-sm-2" id="selectType">
                        <option selected>Seleziona una voce</option>
                        <option value="indoor">Indoor</option>
                        <option value="outdoor">Outdoor</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDescription">Descrizione</label>
                     <input type="text" class="form-control" id="inputDescription" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLocation">Location</label>
                     <input type="text" class="form-control" id="inputLocation" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPrice">Prezzo € / h</label>
                    <input type="number" class="form-control" id="inputPrice" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label class="my-1 mr-2" for="selectType">Status</label> <br>
                    <select class="custom-select my-1 mr-sm-2" id="selectType">
                        <option selected>Seleziona una voce</option>
                        <option value="active">Attivo</option>
                        <option value="maintenance">In Manutenzione</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-color">Add</button>
        </form>
    </div>
@endsection