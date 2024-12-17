<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //
    public function index()
{
    $posts = Post::latest()->take(5)->get(); // Get the latest 5 posts
    return view('home', compact('posts'));
}
}

