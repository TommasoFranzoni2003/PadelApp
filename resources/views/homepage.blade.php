@extends('layouts.app')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    <video class="video-bg" src="{{ asset('video/videoPadel3.mov') }}" autoplay muted loop></video>

    <div id="section1" class="section watch">
        <h1 class="title">Vivi ogni punto, conquista la vittoria!</h1>
        <h4 class="subtitle">Sfida te stesso e i tuoi amici in partite indimenticabili</h4>
    </div>
    <div id="section2" class="section watch">
        <h2 class="title">Divertimento e sport a portata di mano!</h2> <br>
        <h4 class="subtitle">Scegli il campo perfetto e <br> prenota subito per un'esperienza indimenticabile</h4>
    </div>

    <div id="panel" class="panel">
        <h2>Ingegneria Estrema</h2>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush
