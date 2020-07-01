@extends('layouts.base')
@section('title', 'Список статей')

@section('content')
    @foreach($articles as $article)
        <div class="card">
            <div class="card-header">
                Дата создания: {{ $article->created_at->format('d.m.Y') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <p class="btn btn-primary">{{ $article->slug }}</p>
            </div>
        </div>
    @endforeach
@endsection
