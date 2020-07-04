@extends('public.layouts.base')
@section('title', 'Articles')

@section('content')
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
                <a href="{{ route('show', $article->id) }}"><h5 class="card-title">{{ $article->title }}</h5></a>
                <p class="card-text">{{ $article->description }}</p>
                <span>{{ $article->slug }}</span>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection

