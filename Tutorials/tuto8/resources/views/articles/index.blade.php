@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <h2>Liste des Articles</h2>
    <ul>
        @foreach ($articles as $article)
        <x-article-card :article="$article" />
        @endfor each
    </ul>
@endsection