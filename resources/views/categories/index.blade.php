@extends('article.layouts.base')
@section('title', 'Categories')

@section('content')
    {{ $categories->links() }}

    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">{{ $category->name }}</li>
        @endforeach
    </ul>

    {{ $categories->links() }}
@endsection
