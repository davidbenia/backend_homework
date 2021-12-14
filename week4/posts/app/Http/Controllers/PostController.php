<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find($request->userID);
        $posts = $user->posts;

        return view('pages.blog', ['user' => $user, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.post_create', ['name' => $request->name, 'userID' => $request->userID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'post' => 'required',
            'key_words' => 'nullable'
        ]);

        $slug = [
            'slug' => strtolower(
                str_replace(" ", "-", $request->input('title'))
            )
        ];

        Post::create($request->all() + $slug);

        return redirect()->route('users.index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        return view("pages.post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();

        return view("pages.post_edit", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->validate([
            'title' => 'required',
            'post' => 'required'
        ]);

        Post::where('slug', '=', $slug)->update($data);

        return redirect()->route('users.index')->with('success', 'Post edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::where('slug', '=', $request->slug)->firstOrFail();
        $post->delete();

        return redirect()->route('posts.index', ['userID' => $request->userID])->with('success', 'Post deleted');
    }
}
