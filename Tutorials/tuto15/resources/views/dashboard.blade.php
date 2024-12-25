@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <p>Bienvenue, {{ Auth::user()->name }}!</p>
    @else
        <p>Utilisateur non connecté</p>
    @endif
@endsection
