<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articlesList = Article::paginate(5);

        return view('public/index')->with('articles', $articlesList);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('public/show')->with('article', $article);
    }
}
