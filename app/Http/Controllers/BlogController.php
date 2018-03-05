<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function allBlogPosts(){
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'asc')
            ->paginate(config('blog.posts_per_page'));
        
            return view('blog.index', compact('posts'));
    }

    public function singleBlogPost($slug){
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.single')->withPost($post);
    }
}
