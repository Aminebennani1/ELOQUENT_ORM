@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center mb-4">Article {{$article['id']}}</h1>
            <form action="/articles/{{$article['id']}}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title">Titre :</label>
                    <input type="text" name="title" value="{{$article['title']}}" required>
                </div>
                <div class="mb-3">
                    <label for="content">Contenu :</label>
                    <textarea name="content" required>{{$article['content']}}</textarea>
                </div>
                <div class="mb-3">
                  <button type="submit">Edit</button>
                </div>
            </form>
        </div>
        <a href="/dashboard" class="btn btn-primary">Annuler</a>
    </div>
</div>
@endsection
