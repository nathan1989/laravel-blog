<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{
    // show the posts
    public function index(){
        $posts = Post::orderBy('published_at', 'asc')->paginate(config('blog.posts_per_page'));
        return view('admin.index', compact('posts'));
    }

    // show the create post view
    public function create(){
        return view('admin.create');
    }

    // add a post
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        // check fields
        if($validator->fails()){
            
            return redirect('/admin/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $post = new Post;
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->save();

            // redirect
            Session::flash('message', 'Post added');
            return redirect('/admin');
        }
    }

    // update a post
    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->update();

        // redirect
        Session::flash('message', 'Post updated');
        return redirect('/admin');
    }

    // show a post
    public function show($id){
        $post = Post::find($id);
        return view('blog.single', compact('post'));
    }

    // remove a post
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        // redirect
        Session::flash('message', 'Post deleted');
        return redirect('/admin');
    }

    // edit a post
    public function edit($id){
        $post= Post::find($id);
        return view('admin.edit',compact('post'));
    }
}
