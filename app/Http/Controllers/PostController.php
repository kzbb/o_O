<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create New Post
     */
    public function newPost(Request $request)
    {
        $validatedData = $request->validate([
            'post_schedule' => 'required',
            'content'       => 'required',
        ]);
    
        switch ($request->post_schedule) {
            case 'now':
                $post_datetime = now();
                break;
            case '1h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 hour"));
                break;
            case '3h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+3 hour"));
                break;
            case '6h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+6 hour"));
                break;
            case '12h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+12 hour"));
                break;
            case '1d':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 day"));
                break;
            case '3d':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+3 day"));
                break;
            case '1w':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 week"));
                break;
            default:
                $post_datetime = now();
                break;
        }
       
        $newpost = $request->user()->posts()->create([
            'post_datetime' => $post_datetime,
            'content'       => $request->content,
            ]);

        sleep(1);

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * View Post Editor
     */
    public function postEditor(Request $request)
    {
        $post = Post::where('id', $request->post_id)->first();
        
        if (!$post->user_id == $request->user()->id) {
            return redirect($_SERVER['HTTP_REFERER']);
        }

        return view('posteditor', compact('post'));
    }

    /**
     * Update Post
     */
    public function updatePost(Request $request)
    {
        $validatedData = $request->validate([
            'post_schedule' => 'required',
            'content'       => 'required',
        ]);
    
        switch ($request->post_schedule) {
            case 'now':
                $post_datetime = now();
                break;
            case '1h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 hour"));
                break;
            case '3h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+3 hour"));
                break;
            case '6h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+6 hour"));
                break;
            case '12h':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+12 hour"));
                break;
            case '1d':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 day"));
                break;
            case '3d':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+3 day"));
                break;
            case '1w':
                $post_datetime = date("Y-m-d H:i:s", strtotime("+1 week"));
                break;
            default:
                $post_datetime = now();
                break;
        }

        Post::where('id', $request->post_id)
        ->where('user_id', $request->user()->id)
        ->update([
            'post_datetime' => $post_datetime,
            'content'       => $request->content,
        ]);

        sleep(1);

        return redirect('home');
    }

    /**
     * Delete Post
     */
    public function deletePost(Request $request)
    {
        Post::where('id', $request->post_id)
        ->where('user_id', $request->user()->id)
        ->delete();
        
        return redirect('home');
    }
}
