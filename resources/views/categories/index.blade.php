@extends('article.layouts.base')
@section('title', 'Categories')

@section('content')

    <ul class="list-group">
        @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->id) }}"><li class="list-group-item">{{ $category->name }}</li></a>
        @endforeach
    </ul>

@endsection
