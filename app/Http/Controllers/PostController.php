<?php


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'from' => 'required|unique:posts,from',
            'to' => 'required|unique:posts,to',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validasi gambar
        ]);


        // Handle upload gambar
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        } else {
            $imageName = null;
        }


        Post::create([
            'category_id' => $request->category_id,
            'from' => $request->from,
            'to' => $request->to,
            'slug' => Str::slug($request->from),
            'body' => $request->body,
            'image' => $imageName, // Simpan nama file gambar
        ]);


        return redirect()->route('home')->with('success', 'Postingan berhasil ditambahkan.');
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'from' => 'required|unique:posts,from,' . $post->id,
            'to' => 'required|unique:posts,to,' . $post->id,
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);


        // Handle upload gambar (jika ada gambar baru)
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                $oldImagePath = public_path('images/posts/' . $post->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }


            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/posts'), $imageName);
        } else {
            $imageName = $post->image; // Gunakan nama file gambar lama
        }


        $post->update([
            'category_id' => $request->category_id,
            'from' => $request->from,
            'to' => $request->to,
            'slug' => Str::slug($request->from),
            'body' => $request->body,
            'image' => $imageName, // Simpan nama file gambar
        ]);


        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diupdate.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus.');
    }
}
