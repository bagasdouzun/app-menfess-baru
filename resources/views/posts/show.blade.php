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
        <h2 style="padding-top: 20px;">"{{ $post->body }}"</h2>
        @if ($post->image)
        <div style="padding-top: 20px;">
            <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 70%; border-radius: 10px;">
        </div>
        @else
        @endif

        <div style="display: flex; justify-content: center; align-items: center;">
            <!-- Copy Link Button -->
            <button id="copyLinkButton" class="btn btn-primary" style="margin-top: 20px;">Salin Link Menfess</button>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Comments</title>
    <style>
        /* Global style for the post and comments section */
        .post-container {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 1.1em;
            color: #666;
        }

        /* Styling for the comment section */
        .comment, .reply {
            background-color:rgb(240, 240, 240);
            padding: 30px;
            border-radius: 15px;
            margin-top: 20px;
        }

        .comment:last-child, .reply:last-child {
            border-bottom: none;
        }

        .comment p, .reply p {
            font-size: 1.1em;
            color: #333;
        }

        .comment strong, .reply strong {
            font-weight: bold;
        }

        /* Styling for the comment input form */
        form {
            margin-top: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Styling for replies */
        .reply {
            margin-left: 40px;
            border-radius: 10px;
            padding: 10px;
        }

        /* Styling for the comment form's 'Post Comment' button */
        .comment-form {
            display: flex;
            flex-direction: column;
        }

        .comment-form input[type="text"], .comment-form textarea {
            margin-bottom: 10px;
        }

        .comment-form button {
            align-self: flex-start;
            margin-top: 10px;
        }

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            .post-container {
                padding: 10px;
            }

            h1 {
                font-size: 2em;
            }

            .comment, .reply {
                padding: 10px;
            }

            textarea, input[type="text"] {
                font-size: 0.9em;
            }

            button {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h3>Komentar :</h3>
        <!-- Form untuk komentar baru -->
        <form action="{{ route('comments.store', $post->id) }}" method="POST" class="comment-form">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="content" required></textarea>
            <button type="submit">Post Comment</button>
        </form>
        @foreach($comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->name }}</strong> : {{ $comment->content }}</p>

                <!-- Menampilkan balasan (reply) -->
                @foreach($comment->replies as $reply)
                    <div class="reply">
                        <p>↪️ <strong>{{ $reply->name }}</strong> : {{ $reply->content }}</p>
                    </div>
                @endforeach

                <!-- Form reply -->
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <textarea name="content" required></textarea>
                    <button type="submit">Reply</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>

@endsection