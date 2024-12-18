@extends('layouts.app')

@section('content')
    <h1> un Article</h1>
    <form action="{{Route('articles.update',$article)}}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{$article->title}}" required>
        <label for="content">Contenu :</label>
        <textarea name="content" required>{{$article->content}}</textarea>
        <button type="submit"></button>
    </form>
@endsection