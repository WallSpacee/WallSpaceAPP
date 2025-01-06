<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Membuat slug dari title
        $slug = Str::slug($validated['title']);

        // Memastikan slug unik
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; // Menambahkan angka jika slug sudah ada
            $count++;
        }

        Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'author' => 'Anonim',
            'slug' => $slug, // Mengisi slug
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Membuat slug dari title
        $slug = Str::slug($validated['title']);

        // Memastikan slug unik
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $count; // Menambahkan angka jika slug sudah ada
            $count++;
        }

        $post->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'slug' => $slug, // Mengupdate slug
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $id)
    {
        // $post->delete();
        // return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus!');

        $data = $post->find($id);


        // User::destroy($user->id);
        $data->delete();

        return redirect()->route('posts.index')->with('succes', 'berhasil hapus postingan ');
    }
}
