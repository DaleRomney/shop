<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'asc')->paginate(2);
        return view('shop.index', ['posts' => $posts]);
    }

    public function getAdminIndex() {
        $posts = Post::orderBy('name', 'asc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getPost($id) {
        $post = Post::where('id','=',$id)->first();
        return view('shop.post', ['post' => $post]);
    }

    public function getAdminCreate() {
        return view('admin.create');
    }

    public function getAdminEdit($id) {
        $post = Post::find($id);
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminCreate( Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5',
            'price' => 'required|min:3',
            'description' =>'required|min:10'
        ]);
        $user = Auth::user();
        $post = new Post([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);
        $user->post()->save($post);
        return redirect()->route('admin.index')->with('info', 'Item created, name is: ' . $request->input('name'));
    }

    public function postAdminUpdate(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5',
            'price' => 'required|min:3',
            'description' => 'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
        $post->name = $request->input('name');
        $post->price = $request->input('price');
        $post->description = $request->input('description');
        $post->save();
        return redirect()->route('admin.index')->with('info', 'Item edited, new Name is: ' . $request->input('name'));
    }

    public function getAdminDelete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.index')->with('info','Post Deleted');
    }
}
