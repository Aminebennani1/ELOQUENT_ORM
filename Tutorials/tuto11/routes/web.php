<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/Article', function () {
    $article = Article::find(1);
$tag1 = Tag::create(['name' => 'PHP']);
$tag2 = Tag::create(['name' => 'Laravel']);
$article->tags()->attach([$tag1->id, $tag2->id]);
  dd($article);
});
