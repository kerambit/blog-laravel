@extends('layouts.base')
@section('title', 'Articles')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @foreach($articles as $article)
        <div class="card">
            <div class="card-header">
                Дата создания: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
                <a class="btn btn-primary" href="#" role="button">Edit article</a>
                <a class="btn btn-danger" href="#" role="button">Delete article</a>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
