<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Session;

class PostsController extends Controller
{
    //function for listing all posts
    public function index()
    {   //return Post::all();  this code is for dev purpose
        //$posts = Post::all();                 //this will show all the post in default order
        $posts = Post::orderBy('updated_at', 'desc')->take(1)->paginate(5);           //show post in desc order according to the date of updation
        return view('posts.index')->with('posts', $posts);
    }

    //calls create view
    public function create()
    {
        return view('posts.create');
    }

    //Creates new post and add it to the database
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //File upload
        if ($request->hasFile('cover_image')) {

            $FilenameWithExtension = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($FilenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $filenameInStorage = $filename.'_'.time().'_'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameInStorage);

        } else {

            $filenameInStorage = 'noimage.jpg';

        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameInStorage;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    //Show a perticular post
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {

            return view('posts.show')->with('post', $post);

        }
        else{
            abort(404);

        }

    }

    //Calls edit view
    public function edit($id)
    {

        $post = Post::where('id', $id)->firstOrFail();
        if (Auth::id() == $post->user_id) {
            return view('posts.edit')->with('post', $post);
        }
        else{
            return redirect('/posts')->with('error', 'Unauthorized Access');
        }
    }

    //Update post
    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'title' => 'required',
          'body' => 'required'
      ]);
      $post = Post::find($id);
      if (Auth::id() != $post->user_id){
        return redirect('/posts')->with('error', 'Unauthorized Access');
      }
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->save();

      return redirect('/dashboard')->with('success', 'Post Updated');
    }

    // Delete a post
    public function destroy($id)
    {
      $post = Post::find($id);
      if (Auth::id() != $post->user_id){
        return redirect('/posts')->with('error', 'Unauthorized Access');
      }
      $post->delete();
      return redirect('/posts')->with('success', 'Post Deleted');

    }
}
