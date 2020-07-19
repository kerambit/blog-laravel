@extends('article.layouts.base')
@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        Date created: {{ $article->created_at->format('d.m.Y') }}
                    </div>
                    <div class="card-header">
                        Date updated: {{ $article->updated_at->format('d.m.Y') }}
                    </div>
                    <div class="card-header">
                        Category: <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <span>{{ $article->slug }}</span>
                    </div>
                </div>
        </div>
    </div>
@endsection
