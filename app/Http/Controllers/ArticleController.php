<?php

namespace App\Http\Controllers;
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

        return view('article.index')->with('articles', $articlesList);
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

        return view('article.show')->with(
            ['article' => $article,
            'category' => $category]);
    }
}
