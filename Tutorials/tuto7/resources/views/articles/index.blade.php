@extends('layouts.app')

@section('content')
@if(session(key:'success'))
<div>
    {{session('success')}}
</div>
@endif
    <h1>Liste des Artic</h1>
    <a href="/articles/create">Créer un nouvel article</a>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href=""></a>
                <a href="{{Route('articles.edit',$article)}}">Modifier</a>
                <form action="{{Route('articles.destroy',$article)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection