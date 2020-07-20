@extends('layouts.base')
@section('title', 'Edit article')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('includes.errors')
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PATCH')
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
        <div class="form-group">
            <label for="categorySelect">Select category</label>
            <select class="form-control" id="categorySelect" name="category_id">
                <option disabled>Choose category</option>
                @foreach($categories as $category)
                    @if ($category->id == $article->category_id)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit article</button>
    </form>
@endsection
