@extends('layouts.base')
@section('title')
    Category - {{ $category }}
@endsection

@section('content')
    {{ $articles->links() }}
    <h2>Articles with {{ $category }} category:</h2>
    @foreach($articles as $article)
        <div class="card">
            <div class="card-header">
                Date created: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-header">
                Date updated: {{ $article->updated_at->format('d.m.Y') }}
            </div>
            <div class="card-body">
                <a href="{{ route('admin.articles.show', $article->id) }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
                <a class="btn btn-primary" href="{{ route('admin.articles.edit', $article->id) }}" role="button">Edit</a>
                <form action="{{ route('admin.category.destroy', $article->id) }}" method="POST">
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
