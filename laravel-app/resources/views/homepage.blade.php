@extends('layouts.guest')
@section('title')
    Welcome to Life Structure!
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset("/css/homepage.css")}}">
@endsection
@section('content')
    <button class="login" onclick="
        @if(auth()->check())location.href='{{ route('life') }}'; @else Livewire.emit('openModal','sign-in-sign-up')  @endif
    " type="button">
        Organise my life!
    </button>
    @livewire('livewire-ui-modal')
@endsection


