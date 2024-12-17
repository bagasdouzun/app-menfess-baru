@extends('master.layout')


@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px;">
    <h1>From : {{ $post->from }}</h1>
    <h1>To : {{ $post->to }}</h1>
    <p>Kategori : {{ $post->category->name }}</p>
    <p>{{ $post->body }}</p>
    @if ($post->image)
        <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
    @else
        <p>No image available</p>
    @endif
</div>
@endsection
