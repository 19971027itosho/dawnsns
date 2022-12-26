<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = DB::table('posts')->get();
        // dd($posts);
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        return view('posts.index',['posts'=>$posts,'auth'=>$auth,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);
    }

    public function create(Request $request)
    {
        $id = Auth::id();
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post
        ]);
        return redirect('top');
    }

    public function updateForm($id)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return redirect('top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );

        return redirect('top');
    }

    public function delete($id)
    {
        // dd($id);
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

}
