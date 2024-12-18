<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Menyimpan komentar
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            'content' => $request->content,
            'post_id' => $postId,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('posts.show', $postId);  // Kembali ke halaman postingan
    }

    // Menampilkan komentar pada postingan
    public function show(Post $post)
    {
        $comments = $post->comments()->with('replies')->whereNull('parent_id')->get();  // Menampilkan komentar utama

        return view('posts.show', compact('post', 'comments'));
    }
}