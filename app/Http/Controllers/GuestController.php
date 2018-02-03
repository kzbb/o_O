<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    /**
     * Show the welcome page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('post_datetime', '<', now())
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        ->select('posts.*', 'users.name as user_name', 'users.email as user_email', 'user_profiles.url as user_url', 'user_profiles.timezone as user_timezone')
        ->orderBy('posts.post_datetime', 'desc')
        ->paginate(10);
        
        return view('welcome', compact('posts'));
    }
}
