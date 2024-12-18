@extends('master.layout')


@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px;">
    <div class="content" style="text-align: center;">
        <div style="display: flex; justify-content: center; align-items: center;">
            <p style="margin-right: 20px;">From : {{ $post->from }}</p>
            <p>To : {{ $post->to }}</p>
        </div>
        <div style="display: flex; justify-content: center; align-items: center;">
            <p style="margin-right: 20px;">Kategori : {{ $post->category->name }}</p>
            <p>{{ $post->created_at }}</p>
        </div>
        <h2 style="padding-top: 20px;">{{ $post->body }}</h2>
        @if ($post->image)
        <div style="display: flex; justify-content: center; align-items: center;">
            <!-- Gambar dengan ukuran sedang dan link ke modal -->
            <a href="#imageModal" data-bs-toggle="modal">
                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 50%; cursor: pointer;">
            </a>
        </div>

            <!-- Modal untuk melihat detail gambar -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">{{ $post->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif

        <div style="display: flex; justify-content: center; align-items: center;">
            <!-- Copy Link Button -->
            <button id="copyLinkButton" class="btn btn-primary" style="margin-top: 20px;">Salin Link</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('copyLinkButton').addEventListener('click', function() {
        // Get the current page URL
        var url = window.location.href;
        
        // Create a temporary input to copy the URL
        var tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = url;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        
        // Optionally, show a message indicating the link was copied
        alert('Link telah disalin!');
    });
</script>

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<h3>Comments:</h3>
@foreach($comments as $comment)
    <div class="comment">
        <p>{{ $comment->content }}</p>

        <!-- Menampilkan balasan (reply) -->
        @foreach($comment->replies as $reply)
            <div class="reply" style="margin-left: 20px;">
                <p>{{ $reply->content }}</p>
            </div>
        @endforeach

        <!-- Form reply -->
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <textarea name="content" required></textarea>
            <button type="submit">Reply</button>
        </form>
    </div>
@endforeach

<!-- Form untuk komentar baru -->
<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf
    <textarea name="content" required></textarea>
    <button type="submit">Post Comment</button>
</form>

@endsection