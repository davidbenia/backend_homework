<?php

namespace App\Http\Controllers;

use \App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $paginator = Blog::paginate(5);

        $content = [
            "data" => $paginator->items(),
            "first" => $paginator->url(1),
            "prev" => $paginator->previousPageUrl(),
            "next" => $paginator->nextPageUrl(),
            "last" => $paginator->url($paginator->lastPage()),
        ];

        return view('pages.blog', ['content' => $content]);
    }

    public function showPost(Request $request)
    {
        $slug = $request->slug;
        $post = Blog::where("slug", "=", $slug)->get();

        return view('pages.post', ["content" => $post]);
    }
}
