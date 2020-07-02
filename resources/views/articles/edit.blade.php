@extends('layouts.base')
@section('title', 'Edit article')

@section('content')
    <form action="/articles/{{ $article->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="articleInputTitle">Article title</label>
            <input type="text" id="articleInputTitle" name="title" class="form-control" placeholder="Title" value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="articleInputDescription">Article description</label>
            <input type="text" id="articleInputDescription" name="description" class="form-control" placeholder="Description" value="{{ $article->description }}">
        </div>
        <div class="form-group">
            <label for="articleInputSlug">Article slug</label>
            <input type="text" id="articleInputSlug" name="slug" class="form-control" placeholder="Slug" value="{{ $article->slug }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit article</button>
    </form>
@endsection
