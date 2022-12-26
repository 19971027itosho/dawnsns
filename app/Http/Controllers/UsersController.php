<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(){
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        $users =DB::table('users')
        ->where('id','!=',Auth::id())
        ->get();
        return view('users.search',compact('auth','follow_count','follower_count','users'));
    }

    public function result(Request $request){
        $auth = Auth::user();
        $follow_count =DB::table('follows')
        ->where('follower',Auth::id())
        ->count();
        $follower_count =DB::table('follows')
        ->where('follow',Auth::id())
        ->count();
        $key = $request->input('word');
        $users =DB::table('users')
        ->where('id','!=',Auth::id())
        ->where('username','LIKE',"%".$key."%")
        ->get();
        return view('users.search',compact('auth','follow_count','follower_count','users'));//ほぼ同じ画面に出るので同じにしている
    }
}
