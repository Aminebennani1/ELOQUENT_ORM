@extends('layouts.app')

@section('content')

    <h1>
        {{$article['title']}}
    </h1>
    <p>{{$article['content']}}</p>
   
    <a href="/dashboard" class="btn btn-primary">Retour à la liste</a>
@endsection