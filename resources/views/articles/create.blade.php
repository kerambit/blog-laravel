@extends('layouts.base')
@section('title', 'Create new article')

@section('content')
    <form action="/" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="articleInputTitle">Article title</label>
            <input type="text" id="articleInputTitle" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="articleInputDescription">Article text</label>
            <input type="text" id="articleInputDescription" name="description" class="form-control" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="articleInputSlug">Article slug</label>
            <input type="text" id="articleInputSlug" name="slug" class="form-control" placeholder="Slug">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
