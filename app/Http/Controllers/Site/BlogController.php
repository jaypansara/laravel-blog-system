<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // $blogs = Post::where('status', Post::PUBLISHED)->paginate(2);->use this code when you open only published or draft
        $blogs = Post::paginate(2);
         return view('site.index', compact('blogs'));
    }
    public function openSingleBlog($id)
    {
        $blog = Post::find($id);

        if (!$blog) {
            abort(404);
        }
        $comments = Comment::where('post_id', $blog->id)->paginate(1);
        $latestPosts = Post::where('id', '!=', $blog->id)->latest()->limit(5)->get();
        $tags = $blog->Tags;

        return view('site.single', compact('blog', 'comments', 'latestPosts', 'tags'));
    }
}