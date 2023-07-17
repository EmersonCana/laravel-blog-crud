<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;

class BlogsController extends Controller
{
    function index() {
        $blogs = Blog::all();
        return view('blogs.index', compact(['blogs']));
    }

    function create(Request $request) {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->category = 1;
        $blog->user_id = Auth::user()->id;
        $blog->thumbnail_url = $request->thumbnail_url;
        if($blog->save()) {
            return redirect('/blogs');
        }
    }

    function viewCreate() {
        return view('blogs.create');
    }

    function read($id) {
        $blog = Blog::find($id);
        $user_id = Auth::user()->id;
        return view('blogs.read', compact(['blog', 'user_id']));
    }

    function viewEdit($id) {
        $blog = Blog::find($id);
        return view('blogs.edit', compact(['blog']));
    }

    function update(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->thumbnail_url = $request->thumbnail_url;
        if($blog->update()) {
            return redirect('/blogs/'.$blog->id);
        }
    }

    function delete($id) {
        $blog = Blog::find($id);
        if($blog->delete()) {
            return redirect('/blogs');
        }
    }
}
