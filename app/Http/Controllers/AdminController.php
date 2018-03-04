<?php

namespace App\Http\Controllers;

use Validator;
use Session;
use Illuminate\Http\Request;
use App\Post;

class AdminController extends Controller
{
    // show the posts
    public function index(){
        $posts = Post::orderBy('id', 'DESC')->paginate(config('blog.posts_per_page'));
        return view('admin.index', compact('posts'));
    }

    // show the create post view
    public function create(){
        return view('admin.create');
    }

    // add a post
    public function store(Request $request){
        $validator = Validator::make($request->all(), array(
            'title' => 'required',
            'content' => 'required',
        ));

        // check fields
        if($validator->fails()){
            
            return redirect('/admin/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $blog = new Post;
            $blog->title = $request->get('title');
            $blog->content = $request->get('content');
            $blog->save();

            // redirect
            Session::flash('message', 'Post added');
            return redirect('/admin');
        }
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
        $post = Post::find($id);

        return view('admin.edit')->with('post', $post);
    }
}
