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
        $auth = Auth::user();
        return view('posts.index',['posts'=>$posts,'auth'=>$auth]);
    }
}
