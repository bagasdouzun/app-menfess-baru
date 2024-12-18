<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'post_id', 'parent_id'];

    // Relasi ke Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi reply ke Comment
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Relasi komentar induk
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}


