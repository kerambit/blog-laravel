@extends('layouts.base')
@section('title', 'Create new article')

@section('content')
    @include('includes.errors')
    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="articleInputTitle">Article title</label>
            <input type="text" id="articleInputTitle" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="articleInputDescription">Article description</label>
            <input type="text" id="articleInputDescription" name="description" class="form-control" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="articleInputSlug">Article slug</label>
            <input type="text" id="articleInputSlug" name="slug" class="form-control" placeholder="Slug">
        </div>
        <div class="form-group">
            <label for="categorySelect">Select category</label>
            <select class="form-control" id="categorySelect" name="category_id">
                <option disabled selected>Choose category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create new article</button>
    </form>
@endsection
