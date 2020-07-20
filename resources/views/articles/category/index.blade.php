@extends('layouts.base')
@section('title', 'Categories')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach($categories as $category)
            <div class="card w-75">
                <div class="card-body">
                    <a href="{{ route('admin.category.show', $category->id) }}">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </a>
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </ul>

@endsection
