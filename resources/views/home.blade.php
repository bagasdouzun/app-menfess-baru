@extends('master.layout')


@section('title')
Home
@endsection


@section('content')
<div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Auth::check())
            <h2>Selamat Datang {{ Auth::user()->name }}!</h2>
            @endif
        </div>
    </div>


    <div class="row mt-4">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if ($post->image)
                    <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="object-fit: cover;" width="350" height="200">
                @else
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Placeholder Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">To : {{ $post->to }}</h5>
                    <p class="card-text">"{{ Str::limit($post->body, 100) }}"</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
