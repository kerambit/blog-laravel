@extends('layouts.base')
@section('title', 'Articles')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{ $articles->links() }}
    @foreach($articles as $article)
        <div class="card">
            <div class="card-header">
                Date created: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-header">
                Date updated: {{ $article->updated_at->format('d.m.Y') }}
            </div>
            <div class="card-body">
                <a href="{{ route('articles.show', $article->id) }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
                <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}" role="button">Edit</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
