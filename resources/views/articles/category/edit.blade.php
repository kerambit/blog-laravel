@extends('layouts.base')
@section('title')
    Edit {{ $category->name }} category
@endsection

@section('content')
    @include('includes.errors')
    @include('includes.category_form', ['route' => route('category.update', $category->id)])
@endsection
