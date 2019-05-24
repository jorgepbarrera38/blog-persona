<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Post;
use App\CategoryPost;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostUpdateFormRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryPost::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {   
        $path_image="default.jpg";

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('/images', $request->file('image'));
            $path_image = explode('/', $path)[1];
        }

        auth()->user()->posts()->create([
            'title' => $request['title'],
            'excerpt' => $request['excerpt'],
            'body' => $request['body'],
            'category_post_id' => $request['category_post_id'],
            'status' => $request->input('status') ? 'PUBLISHED' : 'DRAFT',
            'image' => $path_image,
            'slug' => str_slug($request['title']),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = CategoryPost::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateFormRequest $request, Post $post)
    {
        $path_image="default.jpg";

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('/images', $request->file('image'));
            $path_image = explode('/', $path)[1];
            if ($post->image != 'default.jpg') {
                Storage::disk('public')->delete('images/' . $post->image);
            }
        }

        $post->update([
            'title' => $request['title'],
            'excerpt' => $request['excerpt'],
            'body' => $request['body'],
            'category_post_id' => $request['category_post_id'],
            'image' => $path_image,
            'slug' => str_slug($request['title']),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post actualizado exitosamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'El post se ha eliminado exitosamente');
    }

    public function publish (Post $post) {
        $post->update(['status' => 'PUBLISHED']);
        return redirect()->back()->with('success', 'El post se ha publicado');
    }

    public function unpublish (Post $post) {
        $post->update(['status' => 'DRAFT']);
        return redirect()->back()->with('success', 'El post se ha despublicado');
    }
}
