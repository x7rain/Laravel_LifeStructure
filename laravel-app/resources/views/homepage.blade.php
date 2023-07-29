@extends('layouts.app')
@section('title')
    Welcome to Life Structure!
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset("/css/homepage.css")}}">
@endsection
@section('content')
    <button class="login" onclick='Livewire.emit("openModal","sign-in-sign-up")'
            type="button">
        Organise my life!
    </button>
    @livewire('livewire-ui-modal')
@endsection


