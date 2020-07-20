@extends('layouts.base')
@section('title')
    {{ $article->title }}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="card">
            <div class="card-header">
                Date created: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-header">
                Date updated: {{ $article->updated_at->format('d.m.Y') }}
            </div>
            <div class="card-header">
                Category: <a href="{{ route('admin.category.show', $article->category->id) }}">{{ $article->category->name }}</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
                <a class="btn btn-primary" href="{{ route('admin.articles.edit', $article->id) }}" role="button">Edit</a>
                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
