<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td>
                    @if($article->tags->isNotEmpty())
                    {{ $article->tags->pluck('name')->implode(', ') }}
                    @else
                    No Tags
                    @endif
                </td>
                <td>{{ $article->category->name ?? 'No Category' }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection