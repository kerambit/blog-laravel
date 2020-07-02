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
                Date created: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-header">
                Date updated: {{ $article->updated_at->format('d.m.Y') }}
            </div>
            <div class="card-body">
                <a href="/articles/{{ $article->id }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
                <a class="btn btn-primary" href="/articles/{{ $article->id }}/edit" role="button">Edit</a>
                <form action="/articles/{{ $article->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
