@extends('master.layout')


@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px;">
    <h1>Edit Postingan</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="from" class="form-label">From</label>
                <input type="text" class="form-control" id="from" name="from" value="{{ $post->from }}">
            </div>
            <div class="col-md-6">
                <label for="to" class="form-label">To</label>
                <input type="text" class="form-control" id="to" name="to" value="{{ $post->to }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Isi</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($post->image)
                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-thumbnail mt-2" width="200">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
