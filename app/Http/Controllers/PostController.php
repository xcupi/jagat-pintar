<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // with() is for n+1 problem so we can pull the database include the category and author table
            // 'posts' => Post::latest()->with('category', 'author')->get()
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    
}
