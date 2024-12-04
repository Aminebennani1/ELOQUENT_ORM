@extends('layouts.app')

@section('content')
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center mb-4"> un Article</h1>
            <form action="/articles" method="POST" class="form">
            
                @csrf
                @if(isset($article))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="title" class="form-label">Titre :</label>
                    <input type="text" name="title" value="" required  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu :</label>
                    <textarea name="content" required  class="form-control"></textarea>
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
                </div>
            </form>
            <a href="/dashboard" class="btn btn-primary">Annuler</a>
        </div>
    </div>
</div>

@endsection