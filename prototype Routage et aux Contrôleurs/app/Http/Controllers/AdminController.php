<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article ;

class AdminController extends Controller
{
    
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index' , compact('articles'));
    }

    public function create(){
        return view('admin.articles.create');
    }
    public function store(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required'
            ]
            );
        Article::create($validated);
        return redirect()->route('articles.index')->with('sucess' , 'Article créé avec succé .');  
    }

    
    public function show(Article $article)
    {
        // Afficher un article
        return view('admin.articles.show' , compact('article') );

    }

    public function edit(Article $article){
        return view('admin.articles.edit' , compact('article'));
    }

    public function update(Request $request , Article $article){
        $validated = $request->validate(
            [
                'title' => 'required|max:255' ,
                'content' => 'required'
            ]
            );
        $article->update($validated);
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succés' );
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');

    }
}
