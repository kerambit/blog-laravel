<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articlesList = Article::paginate(5);

        return view('articles.index')->with('articles', $articlesList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('articles.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required|max:45|unique:App\Article,title',
            'description' => 'required',
            'slug' => 'required|max:45',
            'category_id' => 'required'
        ]);

        $article = Article::create($validData);

        return redirect()
            ->route('articles.index')
            ->with('status', 'Article created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $category = Category::find($article->category_id);

        return view('articles.show')->with(
            ['article' => $article,
            'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.edit')->with([
            'article' => $article,
            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validData = $request->validate([
            'title' => 'required|max:45',
            'description' => 'required',
            'slug' => 'required|max:45',
            'category_id' => 'required'
        ]);

        $article->update($validData);

        return redirect()
            ->route('articles.edit', $article)
            ->with('status', 'Article edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('status', 'Article deleted!');
    }
}
