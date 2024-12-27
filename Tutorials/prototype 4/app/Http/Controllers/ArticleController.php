<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the related category, tags, and user
        $articles = Article::with(['category', 'tags', 'user'])->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Fetch categories for dropdown
        $tags = Tag::all(); // Fetch tags for multi-select
        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userId = auth()->id();
        // Debugging
        if (!$userId) {
            throw new \Exception('User ID is null');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->input('category_id');
        $article->user_id = $userId; // Assuming the user is authenticated
        $article->save();

        if ($request->has('tags')) {
            $article->tags()->attach($request->tags); // Save tags
        }

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function home()
    {
        $articles = Article::with('category')->get();

        return view('home', ['articles' => $articles]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
