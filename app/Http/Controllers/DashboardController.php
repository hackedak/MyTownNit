<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->get() ;
        return view('dashboard')->with('posts', $posts) ;

    }
}
